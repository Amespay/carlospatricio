import"./../css/admin.scss";var Insights=require("./components/insights/insights.js"),FaqGroups=require("./components/faq/faq_groups.js"),StyleSettings=require("./settings/styles.js");import popupModal from"./components/Modal";import FaqGroupSettingsApp from"./svelte/faq-group-settings.svelte";var Admin={init:function(){this.nonce=helpie_faq_object.nonce,this.eventhandlers(),Insights.init(),FaqGroups.init(),popupModal.init(),StyleSettings.init(),this.initFaqGroupSettingsApp()},eventhandlers:function(){var e=this,t=document.getElementById("helpie_faq_delete");null!==t&&(t.onclick=function(){confirm("Are you sure you want to reset all Insights?")&&e.resetInsights()}),jQuery(".helpie-faq__settings").on("click",".helpie-disabled",(function(){e.showFAQPurchaseModalNotice()})),jQuery(".csf--switcher").on("click",(function(t){return!jQuery(this).closest(".csf-field-switcher").hasClass("helpie-disabled")||(t.stopImmediatePropagation(),e.showFAQPurchaseModalNotice(),!1)})),this.updateSubmenuLinks()},updateSubmenuLinks:function(){let e=jQuery("#menu-posts-helpie_faq").find('a[href="edit.php?post_type=helpie_faq&page=helpie-docs-page"]');e.attr("href","https://helpiewp.com/helpie-docs/"),e.attr("target","_blank")},resetInsights:function(){var e={action:"helpie_faq_reset_insights",nonce:this.nonce};jQuery.post(helpie_faq_object.ajax_url,e,(function(e){location.reload()}))},showFAQPurchaseModalNotice:function(){popupModal.load()},initFaqGroupSettingsApp:function(){let e=document.getElementById("svelte-faqs-group-settings");const t=window.helpie_faq;if(!e||void 0===t)return;const i=t.faq_group.page_action,s=t.faq_group.products,n=t.faq_group.tag_ID,o=t.faq_group.settings,a=t.faq_group.product_categories;jQuery("#svelte-faqs-group-settings").remove();const r="create"==i?jQuery("#addtag"):jQuery("#edittag");r.wrapAll("<div class='helpiefaq__groupContainer'></div>"),jQuery("<div id='svelte-faqs-group-settings'></div>").insertBefore(r),e=document.getElementById("svelte-faqs-group-settings"),new FaqGroupSettingsApp({target:e,props:{products:s,tagID:n,settings:o,pageAction:i,productCategories:a}})}};jQuery(document).ready((function(){Admin.init()}));