<?php
define('WP_AUTO_UPDATE_CORE', 'minor');
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'cedrotra_carlospatricio' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'cedrotra_cp' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'marcelo306090' );

/** Nome do host do MySQL */
define( 'DB_HOST', '162.215.1.177' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

// Habilita modo de debug
define('WP_DEBUG', true);

// Guarda os logs em /wp-content/debug.log
define('WP_DEBUG_LOG', true);

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pg)45u0Na,<^mdiwQ%qJEwc6~9tEN*:GS%-xp1Vb/MkM2} PcdYn]fgS}>t0P:**' );
define( 'SECURE_AUTH_KEY',  'VoO-e[coi2Ey^U#vhB+7kcC>9N7bQ7UU:`1+bjm[Na.-9OLENBL Sx!3uH+I0I/.' );
define( 'LOGGED_IN_KEY',    'n@DPNt8Z=!@aDfTt~|(CO5*v,gx5gg@GFU[!OBI^5Aa8Zkh$eX8%V37{$<R1!*8e' );
define( 'NONCE_KEY',        'tsQIHPLlvlViSG8+-)nTY;6bgitLoUJ=iM/IQi}?B6W+=`#QBm0T1 ,HTv)<PfbW' );
define( 'AUTH_SALT',        'Uai;:5qm$(H&k]Onu`EK};Gu3@4;1Q>)ZrF3CUq{.[{kU>JlAyTOAxdY#Psp:3/T' );
define( 'SECURE_AUTH_SALT', 'Tak]=txRElVA$&{@(9*=_YG@V<9hYWH/uD-nIo%~-/7<.+[O7vvcX)aoG+(@9#u?' );
define( 'LOGGED_IN_SALT',   '~E1Ub]*.PN=77G%)99TUp.gx{,x+bY06rsDRfrYNMb.y.IvY;#O`FS#~^duW|sj/' );
define( 'NONCE_SALT',       'PCmBN[hZ?CqW__>`Eo d^tp=`rLcW{tDaRV+mn )%s E>iCl@~DBgHy3o.3tM@m.' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

define('WP_HOME', 'https://carlospatricio.com.br');
define('WP_SITEURL', 'https://carlospatricio.com.br');

define('ENABLE_CACHE', true); // habilita o cache
define('CACHE_EXPIRATION_TIME', 3600); // em segundos

define('FS_CHMOD_FILE', 0755);
define('FS_CHMOD_DIR', 0755);

define('WP_POST_REVISIONS', 3);
define('AUTOSAVE_INTERVAL', 160); // em segundos
define('WP_MEMORY_LIMIT', '512M');
define('ALLOW_UNFILTERED_UPLOADS', true);

@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'memory_limit', '256M' );

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
