<?php 
/**
 * Show the list of attached media in an activity
 * Should we add a link to view gallery too?
 * 
 * @return type
 */


// Disable Admin Bar for everyone but administrators
if (!function_exists('df_disable_admin_bar')) {

	function df_disable_admin_bar() {
		
		if (!current_user_can('manage_options')) {
		
			// for the admin page
			remove_action('admin_footer', 'wp_admin_bar_render', 1000);
			// for the front-end
			remove_action('wp_footer', 'wp_admin_bar_render', 1000);
			
			// css override for the admin page
			function remove_admin_bar_style_backend() { 
				echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
			}	  
			add_filter('admin_head','remove_admin_bar_style_backend');
			
			// css override for the frontend
			function remove_admin_bar_style_frontend() {
				echo '<style type="text/css" media="screen">
				html { margin-top: 0px !important; }
				* html body { margin-top: 0px !important; }
				</style>';
			}
			add_filter('wp_head','remove_admin_bar_style_frontend', 99);
			
		}
  	}
}
add_action('init','df_disable_admin_bar');


/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} if ( in_array( 'author', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return home_url().'/activity';
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );



// /**
//  * Login Redirect
//  * @since 0.1
//  * @version 1.0
//  */
// add_filter( 'login_redirect', 'mycred_pro_login_redirect', 10, 3 );
// function mycred_pro_login_redirect( $redirect_to, $request, $user = NULL )
// {
// 	// Make sure myCRED is enabled
// 	if ( ! function_exists( 'mycred_get_users_cred' ) ) return $redirect_to;

// 	if ( is_object( $user ) )
// 		$user_id = $user->ID;
// 	else
// 		$user_id = get_current_user_id();

// 	// Page ID to redirect users to
// 	$redirect_to_page = 99;

// 	// Check for negative balances
// 	if ( mycred_get_users_cred( $user_id ) <= 0 ) {
// 		return get_permalink( $redirect_to_page );
// 	}
	
// 	return $redirect_to;
// }
?>

<?php // CONTENT WIDTH & feedlinks 
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	add_theme_support( 'automatic-feed-links' );

?>
<?php // REPLY comment script 

	function fullby_enqueue_comments_reply() {
		if( get_option( 'thread_comments' ) )  {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'comment_form_before', 'fullby_enqueue_comments_reply' );
	
?>
<?php // MENU 

	add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() { 
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
            register_nav_menu( 'secondary', __( 'Secondary navigation', 'wptuts' ) );
    } endif;
?>
<?php // BOOTSTRAP MENU - Custom navigation walker (Required)

    require_once('wp_bootstrap_navwalker.php');
    
?>
<?php // CUSTOM THUMBNAIL 

	add_theme_support('post-thumbnails');
	
	if ( function_exists('add_theme_support') ) {
		add_theme_support('post-thumbnails');
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'quad', 400, 400, true ); //(cropped)
		add_image_size( 'single', 800, 494, true ); //(cropped)
		add_image_size( 'video', 800, 450, true ); //(cropped)
		add_image_size( 'smallvideo', 400, 225, true ); //(cropped)
	}

?>
<?php // WIDGET SIDEBAR 

	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Primary Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',	
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array('name'=>'Secondary Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',	
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

?>
<?php // METABOX POST (Video,[...])

add_action( 'add_meta_boxes', 'meta_box_post' );

	function meta_box_post( $post ) {
	
	    add_meta_box(
	            'meta-box-post', // ID, should be a string
	            'YouTube Video', // Meta Box Title
	            'meta_box_post_content', // Your call back function, this is where your form field will go
	            'post', // The post type you want this to show up on, can be post, page, or custom post type
	            'normal', // The placement of your meta box, can be normal or side
	            'high' // The priority in which this will be displayed
	        );
	        
	}
	
	// Content for the custom meta box
	function meta_box_post_content() {
	
		// info current post
	    global $post;
	    
	    //metabox value if is saved
	    $fullby_video = get_post_meta($post->ID, 'fullby_video', true);
	    // ADD here more custom field 	    
	    
	    // security check
	    wp_nonce_field(__FILE__, 'fullby_nonce');
	    ?>
	    <p>To show a video in the article paste the id of a YouTube video in the box below. <br/><input name="fullby_video" id="fullby_video" value="<?php echo $fullby_video; ?>" style="border: 1px solid #ccc; margin: 10px 10px 0 0"/> <small>If the url is http://www.youtube.com/watch?v=<strong>UWHeEI7aOvc</strong>, the ID is <strong>UWHeEI7aOvc</strong>.</small></p>
	    <!-- *** ADD here more custom field  *** -->	    
	    
	    <?php
		
	}

// save function only when save
add_action('save_post', 'save_resource_meta');

	function save_resource_meta(){
    // post info
	    global $post;
	    // don't autosave metabox
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	        return;
	    }
	    
	    // security check:
	    // chek if hidden field wp_nonce_field()
	    // is correct, if isn't don't save the field
	    if ($_POST && wp_verify_nonce($_POST['fullby_nonce'], __FILE__) ) {
	        // check if the value is in the form
	        if ( isset($_POST['fullby_video']) ) {
	            // save info metabox
	            update_post_meta($post->ID, 'fullby_video', $_POST['fullby_video']);
	            //ADD here more custom field 
	        }
	    }  
	}
?>
<?php // POPULAR POST 

if ( !function_exists('wpb_set_post_views') ) {

	function wpb_set_post_views($postID) {
	    $count_key = 'wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* add post views to single page */
if ( !function_exists('wpb_track_post_views') ) {

	function wpb_track_post_views ($post_id) {
	    if ( !is_single() ) return;
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;    
	    }
	    wpb_set_post_views($post_id);
	}
}
add_action( 'wp_head', 'wpb_track_post_views');

?>
<?php // THEME OPTIONS

add_action('admin_menu', 'fullby_theme_page');
function fullby_theme_page ()
{
	if ( count($_POST) > 0 && isset($_POST['fullby_settings']) )
	{
		$options = array ('description','analytics');
		
		foreach ( $options as $opt )
		{
			delete_option ( 'fullby_'.$opt, $_POST[$opt] );
			add_option ( 'fullby_'.$opt, $_POST[$opt] );	
		}			
		 
	}
	add_theme_page('Theme Options', 'Theme Options', 'edit_themes', basename(__FILE__), 'fullby_settings');
	
}
function fullby_settings()
{?>
<div class="wrap">
<h2>SEO Options</h2>
	
<form method="post" action="">
 
    <fieldset style="border:1px solid #ddd; padding:20px; margin-top:20px;">
	<legend style="margin-left:5px; color:#2481C6;text-transform:uppercase;"><strong>SEO</strong></legend>
		<table class="form-table">
        
        <tr>
			<th><label for="description">Meta Description</label></th>
			<td>
				<textarea name="description" id="description" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('fullby_description'); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="ads">Google Analytics code:</label></th>
			<td>
				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('fullby_analytics')); ?></textarea>
			</td>
		</tr>
        
	</table>
	</fieldset>
    
    <p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
		<input type="hidden" name="fullby_settings" value="save" style="display:none;" />
		</p>

</form>
</div>
<?php }?>
<?php // CUSTOM PAGE - Premium Version
add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
    add_menu_page( 'Fullby Premium', 'FULLBY Premium', 'manage_options', 'custompage', 'my_custom_menu_page', get_template_directory_uri() . '/img/icon-backend.png', 100); 
}

function my_custom_menu_page(){ ?>
<div style="float:left; padding:3% 5% 5% 5%; width:90%; ">

   <h1>Why update to FULLBY Premium ?</h1>
   <h2>A lot of new features for awesome site with easy customization..</h2>
   
   <img src="<?php echo get_template_directory_uri(); ?>/img/features.png" style="width:80%; height:auto; float:left;margin-right:20%"/>
   
   <a href="http://www.marchettidesign.net/fullby/demo.php" target="_blank" style="float:left; display:block; padding: 15px 40px; margin-right:20px; border-radius: 4px;color:#fff; background:#333; font-weight:700; text-decoration:none">LIVE DEMO</a>

   <a href="http://www.marchettidesign.net/shop/cart/?add-to-cart=12" target="_blank" style="float:left; display:block; padding: 15px 40px; margin-right:20px; border-radius: 4px;color:#000; background:#00ecbd; font-weight:700; text-decoration:none">BUY PREMIUM 29$</a>
   
</div>
     
<?php } 



// woo - Remove Main Product Image & Display Thumbnails	
add_filter('add_to_cart_redirect', 'imageSlashVid');
function imageSlashVid() {
	// if (!wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->id)) {
	// 	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	// }
 	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
}
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_thumbnails', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

 ?>