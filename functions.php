<?php
/**
 * Boutique engine room
 *
 * @package boutique
 */

/**
 * Set the theme version number as a global variable
 */
$theme				= wp_get_theme( 'boutique' );
$boutique_version	= $theme['Version'];

$theme				= wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

/**
 * Load the individual classes required by this theme
 */
require_once( 'inc/class-boutique.php' );
require_once( 'inc/class-boutique-customizer.php' );
require_once( 'inc/class-boutique-template.php' );
require_once( 'inc/class-boutique-integrations.php' );

/**
 * Do not add custom code / snippets here.
 * While Child Themes are generally recommended for customisations, in this case it is not
 * wise. Modifying this file means that your changes will be lost when an automatic update
 * of this theme is performed. Instead, add your customisations to a plugin such as
 * https://github.com/woothemes/theme-customisations
 */

 if ( !is_admin() ) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
      wp_enqueue_script('jquery');
   }

   remove_action('wp_head', 'wp_generator');
   remove_action('wp_head', 'feed_links', 2);
   remove_action('wp_head', 'index_rel_link');
   remove_action('wp_head', 'wlwmanifest_link');
   remove_action('wp_head', 'feed_links_extra', 3);
   remove_action('wp_head', 'start_post_rel_link', 10, 0);
   remove_action('wp_head', 'parent_post_rel_link', 10, 0);
   remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

   function admin_favicon() {
       echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
   }
   add_action('admin_head', 'admin_favicon');

 function mytheme_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function add_google_analytics() {
    echo "
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-106179217-1', 'auto');
      ga('send', 'pageview');

    </script>";
}
add_action('wp_footer', 'add_google_analytics');
