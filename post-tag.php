<?php
/*
Plugin Name: Post Tags and Categories for Pages
Plugin URI: http://wpthemetutorial.com/plugins/post-tags-and-categories-for-pages/
Description: Simply adds the stock Categories and Post Tags to your Pages.
Version: 1.0
Author: WP Theme Tutorial
Author URI: http://wpthemetutotial.com/about/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 *  todo give user the option to add categories and tags - on by default
 *  todo give user option to display tags and categories on archive pages - on by default
 *  TODO add categories to the end of pages
 *  TODO add the tags to the end of pages
 */

    /**
     * Registers the taxonomy terms for the post type
     *
     * @since 1.0
     *
     * @uses register_taxonomy_for_object_type
     */
    function ptcfp_taxonomies_for_pages() {
        register_taxonomy_for_object_type( 'post_tag', 'page' );
        register_taxonomy_for_object_type( 'category', 'page' );
    }
    add_action( 'init', 'ptcfp_taxonomies_for_pages' );

    /**
     * Includes the tags in archive pages
     *
     * Modifies the query object to include pages
     * as well as posts in the items to be returned
     * on archive pages
     *
     * @since 1.0
     */
    /**
     * Includes the categories in archive pages
     *
     * Modifies the query object to include pages
     * as well as posts in the items to be returned
     * on archive pages
     *
     * @since 1.0
     */

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
