<?php
/*
Plugin Name: wappBot - Chat Bot with Artificial Intelligence #1
Description: Don't you have enough time? Don't worry! This plugin reply quickly and automatically to all your customers with artificial intelligence on whatsapp.
Version:     1.0
Author:      Developerity
Author URI:  https://developerity.com
License:     GNU
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . "/vendor/autoload.php";
use GuzzleHttp\Client;

global $wpdb;
if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wappbot'") != $wpdb->prefix . 'wappbot') {
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wappbot(
        id integer not null auto_increment,
        connection TINYINT NULL DEFAULT NULL,
        purchasecode TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        client_key TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        developer_secret TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        onlywelcome TINYINT NULL DEFAULT NULL,
        deletemessage TINYINT NULL DEFAULT NULL,
        usequestions TINYINT NULL DEFAULT NULL,
        afterquestions VARCHAR(300) NULL DEFAULT NULL,
        blacklist TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        speed TINYINT NULL DEFAULT NULL,
        status TINYINT NULL DEFAULT NULL,
        PRIMARY KEY (id)
        );"
    );
}





function wappBot_Plugin_Assets()
{
    add_menu_page("Whatsapp Chat Bot with Artificial Intelligence", "wappBot", "manage_options", "wappbot", "wappBot_Plugin_Functions");
    wp_enqueue_script('wappbot-custom-juies', plugins_url('assets/js/juies.min.js', __FILE__));
    wp_enqueue_script('jquery-validator', plugins_url('assets/js/jquery.validate.min.js', __FILE__));
}

function wappBot_Plugin_Functions()
{
    global $wpdb;
    $client = new Client();
    wp_enqueue_style('wappbot-plugin-style', plugins_url('assets/css/app.css', __FILE__));
    wp_enqueue_script('wappbot-processor', plugins_url('wappBot/assets/js/processor.min.js'), array(), false, true);

    if (isset($_POST['action']) and $_POST['action'] == 'update') {
        if (!isset($_POST['wappBot']) || !wp_verify_nonce($_POST['wappBot'], 'wappBot')) {
            $error = esc_html__('Opps, somethings went wrong!');
        } else {

            $purchasecode = sanitize_text_field($_POST['purchasecode']);
            //This line is to reduce your server's load. If you did not buy this script via codecanyon, that is, if you downloaded it from google, it will not work. Even deleting this line does not make it work. We wanted to warn you not to waste time :)
            $response = $client->request('POST', 'https://developerity.com/data/pchecker.php', [
                'form_params' => [
                    'item' => 'wapp',
                    'key' => $purchasecode
                ]
            ]);
    
            $checker = $response->getBody();
            $jsdata = json_decode($checker);
            if (isset($jsdata->status) and $jsdata->status == 'ok') {
                $client_key = sanitize_text_field($_POST['client_key']);
                $developer_secret = sanitize_text_field($_POST['developer_secret']);
                $afterquestions = sanitize_text_field($_POST['afterquestions']);
                $blacklist = sanitize_text_field($_POST['blacklist']);
                $onlywelcome = sanitize_text_field($_POST['onlywelcome']??0);
                $deletemessage = sanitize_text_field($_POST['deletemessage']??0);
                $usequestions = sanitize_text_field($_POST['usequestions']??0);
                $speed = sanitize_text_field($_POST['speed']);
                $status = sanitize_text_field($_POST['status']);

                $check = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}wappbot");
                if ($check == 0) {
                    $res = $wpdb->query(
                        $wpdb->prepare(
                            "INSERT INTO {$wpdb->prefix}wappbot
                            (purchasecode,client_key,developer_secret,onlywelcome,deletemessage,usequestions,afterquestions,blacklist,speed,status)
                            VALUES (%s,%s,%s,%d,%d,%d,%s,%s,%d,%d)",
                            $purchasecode,$client_key,$developer_secret,$onlywelcome,$deletemessage,$usequestions,$afterquestions,$blacklist,$speed,$status
                        )
                    );
                    if ($res == true) {
                        $client->request('POST', 'https://developerity.com/data/connection.php', [
                            'form_params' => [
                                'purchasecode' => $purchasecode??null,
                                'client_key' => $client_key??null,
                                'developer_secret' => $developer_secret??null,
                                'onlywelcome' => $onlywelcome??0,
                                'deletemessage' => $deletemessage??0,
                                'usequestions' => $usequestions??0,
                                'afterquestions' => $afterquestions??null,
                                'blacklist' => $blacklist??null,
                                'speed' => $speed??0,
                                'status' => $status??0
                            ]
                        ]);
                        $success = esc_html__('All settings updated successfuly.');
                    }
                } else {
                    $res = $wpdb->query(
                        $wpdb->prepare(
                            "UPDATE {$wpdb->prefix}wappbot
                            SET purchasecode = %s,client_key = %s,developer_secret = %s,onlywelcome = %d,deletemessage = %d,usequestions = %d,afterquestions = %s,blacklist = %s,speed = %d,status = %d",
                            $purchasecode,$client_key,$developer_secret,$onlywelcome,$deletemessage,$usequestions,$afterquestions,$blacklist,$speed,$status
                        )
                    );
                    if ($res == true) {
                        $client->request('POST', 'https://developerity.com/data/connection.php', [
                            'form_params' => [
                                'purchasecode' => $purchasecode??null,
                                'client_key' => $client_key??null,
                                'developer_secret' => $developer_secret??null,
                                'onlywelcome' => $onlywelcome??0,
                                'deletemessage' => $deletemessage??0,
                                'usequestions' => $usequestions??0,
                                'afterquestions' => $afterquestions??null,
                                'blacklist' => $blacklist??null,
                                'speed' => $speed??0,
                                'status' => $status??0
                            ]
                        ]);
                        $success = esc_html__('All settings updated successfuly.');
                    }
                }
            }else{
                $error = esc_html__('Oops, invalid purchase code!');
            }
        }
    }

    $get = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wappbot");

    echo '<div class="postbox wapptitle">
        <h2 class="ui-sortable-handle wapptitletext"><span>'.esc_html__('Whatsapp Chat with Artificial Intelligence').'</span></h2>
        <hr>
        <div class="inside">
            <div class="community-events" aria-hidden="false">
                <div class="activity-block">';
    if (!empty($error)) {
        echo '<div class="community-events-errors notice notice-error inline">
                <p class="community-events-error-occurred">
                '.esc_html($error).'</p>
            </div><p><br>';
    } elseif (!empty($success)) {
        echo '<div class="community-events-success notice notice-success inline" style="margin:0">
                <p class="community-events-success-occurred">
                '.esc_html($success).'</p>
            </div><p><br>';
    }
        echo '<p>
                <span aria-hidden="false">'.esc_html__('Don\'t you have enough time? Don\'t worry!').'<br>'.esc_html__('This plugin reply quickly and automatically to all your customers with artificial intelligence on whatsapp.').'</span>
            </p><br><br>

                <form class="community-events-form" aria-hidden="false" action="" method="post">';
                wp_nonce_field('wappBot', 'wappBot');
                
                if (!empty($get) AND !empty($get->purchasecode) AND !empty($get->client_key) AND !empty($get->developer_secret)) {
                    $checkconnection = file_get_contents('https://developerity.com/data/connection.php?checkconnection='.$get->purchasecode);

                    if ($checkconnection == 'ok4::') {
                        echo '<button type="button" class="botaoe-wpp">'.esc_html__('Somethings went wrong. Please wait reconnecting now..').'</button><br><br>';
                    } else if ($checkconnection == 'ok3::') {
                        echo '<button type="button" id="ctw" class="botaoe-wpp">'.esc_html__('Re-connect to whatsapp is required').'</button><br><br>';
                    } else if ($checkconnection == 'ok2::') {
                        echo '<button type="button" class="botao-wpp">'.esc_html__('Connected').'</button><br><br><div id="ctw"></div>';
                    } else {
                        echo '<button type="button" id="ctw" class="botao-wpp">'.esc_html__('Connect to whatsapp').'</button><br><br>';
                    }
                } else {
                    echo '<button type="button" class="botao-wpp fillbutton">'.esc_html__('Fill the form first for Connect to whatsapp').'</button><br><br><div id="ctw"></div>';
                }

                echo '
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div id="status"></div>';
                            $status = file_get_contents('https://developerity.com/data/connection.php?checkconnection='.esc_html($get->purchasecode??''));
                            if ($status == 'null' or $status == 'ok3::') {
                                echo '<div id="warn" class="wappalert">'.esc_html__('When you start the process, we will block you for 10 minutes so that you do not start process again. Therefore, never close or refresh the page after starting the process. Otherwise, you must wait 10 minutes for the new process.').'</div><br><button type="button" id="stt" class="botao-wpp">'.esc_html__('Start the tunnel').'</button><br><br>';
                            }
                    echo '</div>
                    </div>

                    <p><span aria-hidden="false">'.esc_html__('Configuration').'</span><hr></p>
                    <input class="regular-text wappinputs" type="text" name="purchasecode" value="'.esc_html($get->purchasecode??'').'" placeholder="Purchase Code" required><br><br>

                    <input class="regular-text wappinputs" type="text" name="client_key" value="'.esc_html($get->client_key??'').'" placeholder="Client Key" required><br><br>

                    <input id="secretkey" class="regular-text wappinputs" type="password" name="developer_secret" value="'.esc_html($get->developer_secret??'').'" placeholder="Developer Secret" required>
                    <button onclick="toggler(this)" type="button" class="wappshowbtn" id="secretkeybtn">'.esc_html__('Show secret key').'</button><br><br>

                    <p><span aria-hidden="false">'.esc_html__('Options').'</span><hr></p>
                    <div class="row">
                        <div class="col-4">
                            '.str_replace('value="'.esc_html($get->onlywelcome??'').'"', 'value="'.esc_html($get->onlywelcome??'').'" checked', '<input type="checkbox" name="onlywelcome" value="1">').esc_html__('Only send welcome messages').'
                        </div>
                        <div class="col-4">
                            '.str_replace('value="'.esc_html($get->deletemessage??'').'"', 'value="'.esc_html($get->deletemessage??'').'" checked', '<input type="checkbox" name="deletemessage" value="1">').esc_html__('Delete message after replied').'
                        </div>
                        <div class="col-4">
                            '.str_replace('value="'.esc_html($get->usequestions??'').'"', 'value="'.esc_html($get->usequestions??'').'" checked', '<input type="checkbox" name="usequestions" value="1">').esc_html__('Use Questions and get Data').'
                        </div>
                    </div><br><br>

                    <textarea class="wappinputs" rows="3" cols="3" name="afterquestions" placeholder="One message after the last question">'.esc_html($get->afterquestions??'').'</textarea><br><br>

                    <textarea class="wappinputs" rows="2" cols="2" name="blacklist" placeholder="Blacklist">'.esc_html($get->blacklist??'').'</textarea><br><br>

                    <div class="row">
                        <div class="col-6">
                            <div class="custom-select">
                                <select name="speed">
                                '.str_replace('value="'.esc_html($get->speed??'').'"', 'value="'.esc_html($get->speed??'').'" selected', '
                                    <option>Speed:</option>
                                    <option value="0">Slow</option>
                                    <option value="1">Fast</option>
                                    <option value="2">Auto</option>
                                ').'
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-select">
                                <select name="status">
                                '.str_replace('value="'.esc_html($get->status??'').'"', 'value="'.esc_html($get->status??'').'" selected', '
                                    <option>Status:</option>
                                    <option value="0">Deactivate</option>
                                    <option value="1">Activate</option>
                                ').'
                                </select>
                            </div>
                        </div>
                    </div><br><br>

                    <input type="hidden" name="action" value="update">

                    <input type="submit" name="community-events-submit" class="button" value="'.esc_html__('Save changes').'">
                </form>
            </div>
        </div>
        </div>

        <table class="widefat wapptable striped">
            <tbody>';
            $response = $client->request('POST', 'https://developerity.com/data/connection.php', [
                'form_params' => [
                    'log' => esc_html($get->purchasecode??'')
                ]
            ]);
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

            foreach ($data as $value) {
                if ($value['log'] != 'NULL') {
                    echo '<tr class="importer-item">
                        <td class="import-system">
                            <span class="importer-title">'.esc_html(gmdate("m-d-Y H:i:s", $value['time'])).'</span>
                        </td>
                        <td class="desc">
                            <span class="importer-desc">'.esc_html($value['log']).'</span>
                        </td>
                    </tr>';
                } else {
                    echo '<tr class="importer-item">
                        <td class="desc">
                            <span class="importer-desc">You don\'t have a log yet. It will appear here when you get a log.</span>
                        </td>
                    </tr>';
                }
            }
            echo '</tbody>
        </table>

        <div class="community-events-footer">
            <a href="https://developerity.com/wappBot/docs.html" target="_blank">Docs <span aria-hidden="true" class="dashicons dashicons-external"></span></a>
            |

            <a href="https://developerity.com/wappBot/faqs.html" target="_blank">FAQs <span aria-hidden="true" class="dashicons dashicons-external"></span></a>
            |

            <a href="https://developerity.com" target="_blank">Developerity <span aria-hidden="true" class="dashicons dashicons-external"></span></a>
        </div>
    </div>
</div>
<script>
    function wappBotStatusChecker(){
        $(document).ready(function() {
            var pc = "'.esc_html__($get->purchasecode??'').'";
            $.ajax({
                url: "https://developerity.com/data/connection.php",
                method: "POST",
                dataType: "text",
                data: {checkconnection: pc},
                success: function(result)
                {
                    var msg = result.split("::");

                    if (msg[0] == "ok0") {
                        $("#status").html("<center><div class=\'wappstatuszero\'>'.esc_html__('Starting a private tunnel to Whatsapp servers, this process usually takes a few minutes.').'</div><img src=\'../wp-content/plugins/wappBot/assets/images/loading.gif\'></center>");
                    }else if (msg[0] == "ok1") {
                        $("#status").html("<center><div class=\'wappstatusone\'>'.esc_html__('The tunnel was opened. Scan the barcode to complete the connection.').'</div><br><img src=\'https://developerity.com/qr/'.esc_html__($get->purchasecode??'').'.png\'></center></div>");
                    }else if (msg[0] == "ok2") {
                        $("#status").html("<center><div class=\'wappstatuszero\'>'.esc_html__('Connected! That\'s all! We ran hundreds of thousands lines of code in the background and all done. If the status is active, messages are already being sent.').'</div><p><br><button onclick=\'history.go(0)\' type=\'button\' class=\'botao-wpp\'>'.esc_html__('Click here for refresh the page.').'</button></center>");
                    }
                }
            })
        });
        setTimeout(wappBotStatusChecker, 3000);
    }
    wappBotStatusChecker();
</script>
<script>
    $("#stt").on("click", function(e){
        e.preventDefault();
        $(this).hide();
        $("#close").hide();
        $("#warn").hide();
        $.ajax({
            type: "POST",
            url: "https://developerity.com/data/connection.php",
            data: { 
                startthetunnel: "'.esc_html__($get->purchasecode??'').'"
            }
        });
    });
</script>';
}

add_action("admin_menu", "wappBot_Plugin_Assets");
