<?php
/*
Plugin Name: Post Tags and Categories for Pages
Plugin URI: 
Description: Simply adds the stock Categories and Post Tags to your Pages..
Version: 0.1
Author: Curtis McHale
Author URI: http://curtismchale.ca
License: GPLv2 or later
*/
?>
<?php

/*
 *  todo give user the option to add categories and tags - on by default
 *  todo give user option to display tags and categories on archive pages - on by default
 *  todo README.txt file
 *  todo add plugin URI
*/

    // Make the metabox appear on the page editing screen
    function ptcfp_taxonomies_for_pages() {
        register_taxonomy_for_object_type('post_tag', 'page');
        register_taxonomy_for_object_type('category', 'page');
    }
    add_action('init', 'ptcfp_taxonomies_for_pages');

    // When displaying a tag archive, also show pages
    function ptcfp_tags_archives($wp_query) {
        if ( $wp_query->get('tag') )
            $wp_query->set('post_type', 'any');
    }
    add_action('pre_get_posts', 'ptcfp_tags_archives');

    // When displaying a category archive, also show pages
    function ptcfp_category_archives($wp_query) {
        if ( $wp_query->get('category_name') )
            $wp_query->set('post_type', 'any');
    }
    add_action('pre_get_posts', 'ptcfp_category_archives');

?>
