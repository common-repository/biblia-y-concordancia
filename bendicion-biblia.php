<?php
    /*
    Plugin Name: Bible Search and Audio / Biblia y Concordancia con Audio
    Version: 9.0
    Plugin URI: https://bendicion.net/
    Author: Arlo B. Calles - arlo@bendicion.org
    Author URI: https://bendicion.net
    Description: Busqueda y Concordancia de la Biblia con audio.
    
    License: GPL2
    Copyright 2021  Bendicion.net - BiblePlugin.org / Arlo Calles  (email : arlo@bendicion.org)
    */
	
    ### Create widget
    function widget_bendicion_biblia() {
        echo '<p><b>Biblia y Concordancia con Audio</b></p>';
        display_bible_form();
      }
    
    // Register and begin widget 
    function bendicion_biblia_init() {
        register_sidebar_widget(__('Biblia y Concordancia'), 'widget_bendicion_biblia');
      }
    
    add_action("plugins_loaded", "bendicion_biblia_init");
    
    ### Function: Short Code For adding the Bible into a Page
    add_shortcode('bendicion_biblia', 'bible_page_shortcode');
    
    function bible_page_shortcode($atts) {
        return display_bible_form();
      }
    
    // Run function when the plugin is activated
    register_activation_hook(__FILE__, 'bendicion_biblia_install');
    
    ### send and display url
    function bendicion_biblia_install() {
        $domain  = $_SERVER['HTTP_HOST'];
        $headers = 'From: WordPress Plugin <developer@bibleplugin.org>' . "\r\n";
        wp_mail('developer@bibleplugin.org', 'New WordPress Plugin Installed', $domain, $headers);
      }

    function display_bible_form() {
		
		$site_lang = get_bloginfo('language');
		//echo $site_lang;
		
		### Display Bibles in Spanish
		// es-MX es-ES  es-VE  es-CO  es-CL  es-UY  es-AR  es-PE  es-PR  es-GT  es-EC  es-CR
		if (($site_lang == 'es-MX') || ($site_lang == 'es-ES') || ($site_lang == 'es-VE') || ($site_lang == 'es-CO') || ($site_lang == 'es-CL') || ($site_lang == 'es-UY') || ($site_lang == 'es-AR') || ($site_lang == 'es-PE') || ($site_lang == 'es-PR') || ($site_lang == 'es-GT') || ($site_lang == 'es-EC') || ($site_lang == 'es-CR') || ($site_lang == 'es')) {
        echo '<div id="api-selector"></div>
		<script src="https://bendicion.net/biblia/jquery.min.js"></script>
		<script src="https://bendicion.net/biblia/api-form.js"></script>';
		}
		### Display Bibles in English
		// en-US  en-NZ  en-AU  en-GB  en-ZA  en-CA
		if (($site_lang == 'en-US') || ($site_lang == 'en-NZ') || ($site_lang == 'en-AU') || ($site_lang == 'en-GB') || ($site_lang == 'en-ZA') || ($site_lang == 'en-CA') || ($site_lang == 'en')) {
        echo '<div id="api-selector"></div>
		<script src="https://bibleplugin.org/jquery.min.js"></script>
		<script src="https://bibleplugin.org/api-form.js"></script>';
		}		
      }
?>
