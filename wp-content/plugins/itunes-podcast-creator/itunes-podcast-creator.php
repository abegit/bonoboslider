<?php /*
Plugin Name: iTunes Podcast Creator (RSS Generator)
Plugin URI: http://dev.unscene.us/plugins/
Description: Turn your WordPress Blog into the Podcast Engine it was meant to be! Follow the steps to setup your blog to be compatible with Apple iTunes Podcast RSS Guidelines to allow for easily-synced downloads.
Author: Abraham Perez
Version: 1.0
Author URI: http://unscene.us/who-is-unscene
*/


// Derive the current path and load up Sanity
$plugin_path = plugin_dir_path(__FILE__).'/';
if(class_exists('SanityPluginFramework') != true)
    include($plugin_path.'framework/sanity.php');

/*
*		Define your plugin class which extends the SanityPluginFramework
*		Make sure you skip down to the end of this file, as there are a few
*		lines of code that are very important.
*/ 
class iTunesRSS extends SanityPluginFramework {
	
	/*
	*	Some required plugin information
	*/
	var $version = '1.0';
	
	/*
	*		Required __construct() function that initalizes the Sanity Framework
	*/
	function __construct() {
      parent::__construct(__FILE__);

      // create 'unscene_rss_feed' page
      add_action( 'admin_menu', 'iTunesCreatePage' );
		function iTunesCreatePage(){
			add_menu_page( 'iTunes Podcast Creator', 'iTunes Podcast Creator', 'manage_options', 'unscene_rss_feed', 'iTunesConfigContent', $plugin_path . 'img/icon-backend.png', 99);
			// find icon url for this abedit
		}
		function iTunesConfigContent(){
			require_once($plugin_path.'templates/admin/page.php');
		}

	if ( get_option('iTunesFeedSync') == '1') { 
			add_action( 'after_setup_theme', 'addCustomPodcastRSS' );
			function addCustomPodcastRSS() {
				add_feed( 'listen', 'iTunesPodcast' );
			}
			function iTunesPodcast() {
				require_once($plugin_path.'templates/podcast/iTunes.php');
			} 
	}
	if ( get_option('UnsceneMusicPlayer') == '1') { 
			//add my_print to query vars
			function add_print_query_vars($vars) {
			    // add my_print to the valid list of variables
			    $new_vars = array('embed');
			    $vars = $new_vars + $vars;
			    return $vars;
			}

			add_filter('query_vars', 'add_print_query_vars');
			add_action("template_redirect", 'PlayerTemplateInit');

			// Template selection
			function PlayerTemplateInit() {
			    global $wp;
			    global $wp_query;
			    if (isset($wp->query_vars["embed"])) {
			        require_once($plugin_path.'templates/podcast/single-player.php');
			        die();
			    }
			}


			function pg_enc() {

				foreach ( (array) get_post_custom() as $key => $val) {
					if ($key == 'enclosure') {
						foreach ( (array) $val as $enc ) {
							$enclosure = explode("\n", $enc);

							// only get the first element, e.g. audio/mpeg from 'audio/mpeg mpga mp2 mp3'
							$t = preg_split('/[ \t]/', trim($enclosure[2]) );
							$type = $t[0];

							/**
							 * Filter the RSS enclosure HTML link tag for the current post.
							 *
							 * @since 2.2.0
							 *
							 * @param string $html_link_tag The HTML link tag with a URI and other attributes.
							 */
							echo apply_filters( 'pg_enc', $enclosure[0] );
						}
					}
				}
			 } // end pg_enc

	} // end if option UnsceneMusicPlayer = 1 aka yes
}
	/*
	*		Run during the activation of the plugin
	*/
	function activated() {
		$iTunesleader = get_option('admin_email');
		add_option("iTunesFeedSync", '1', '', 'yes');
		add_option("iTunesAuthorName", 'Mr. Unscene', '', 'yes');
		add_option("iTunesAuthorEmail", $iTunesleader, '', 'yes');
		add_option("iTunesPodcastSummary", $iTunesleader, '', 'yes');
		add_option("iTunesPodcastImage", '', '', 'yes');
		add_option("iTunesExplicit", '1', '', 'yes');
		add_option("iTunesCategories", 'Design', '', 'yes');
		add_option("UnsceneMusicPlayer", '1', '', 'yes');	
	}
	/*
	*		Run during the initialization of Wordpress
	*/
	function initialized() {
		register_setting( 'iTunesFeedStart', 'iTunesFeedSync', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesAuthorName', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesAuthorEmail', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesPodcastSummary', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesPodcastImage', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesExplicit', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'iTunesCategories', 'iTuney' );
		register_setting( 'iTunesFeedStart', 'UnsceneMusicPlayer', 'iTuney' );
	}
	
	// abedit
    var $admin_js = array('script');
    var $admin_css = array('style' , 'fonts');

}


// Initalize the your plugin
$iTunesRSS = new iTunesRSS();

// Add an activation hook
register_activation_hook(__FILE__, array(&$iTunesRSS, 'activated'));

// Run the plugins initialization method
add_action('admin_init', 'initialized'); ?>