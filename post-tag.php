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

    // Make the metabox appear on the page editing screen
    function ptcfp_taxonomies_for_pages() {
        register_taxonomy_for_object_type('post_tag', 'page');
        register_taxonomy_for_object_type('category', 'page');
    }
    add_action('init', 'ptcfp_taxonomies_for_pages');

    // When displaying a tag archive, also show pages
    function tags_archives($wp_query) {
        if ( $wp_query->get('tag') )
            $wp_query->set('post_type', 'any');
    }
    add_action('pre_get_posts', 'tags_archives');

?>
