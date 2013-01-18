<?php
/*
Plugin Name: Post Tags and Categories for Pages
Plugin URI: http://wpthemetutorial.com/plugins/post-tags-and-categories-for-pages/
Description: Simply adds the stock Categories and Post Tags to your Pages.
Version: 1.1
Author: WP Theme Tutorial
Author URI: http://wpthemetutotial.com/about/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class PTCFP{

  function __construct(){

    add_action( 'init', array( $this, 'taxonomies_for_pages' ) );

    /**
     * Want to make sure that these query modifications don't
     * show on the admin side or we're going to get pages and
     * posts mixed in together when we click on a term
     * in the admin
     *
     * @since 1.0
     */
    if ( ! is_admin() ) {
      add_action( 'pre_get_posts', array( $this, 'category_archives' ) );
      add_action( 'pre_get_posts', array( $this, 'tags_archives' ) );
    } // ! is_admin

  } // __construct

  /**
   * Registers the taxonomy terms for the post type
   *
   * @since 1.0
   *
   * @uses register_taxonomy_for_object_type
   */
  function taxonomies_for_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
  } // taxonomies_for_pages

  /**
   * Includes the tags in archive pages
   *
   * Modifies the query object to include pages
   * as well as posts in the items to be returned
   * on archive pages
   *
   * @since 1.0
   */
  function tags_archives( $wp_query ) {

    if ( $wp_query->get( 'tag' ) )
      $wp_query->set( 'post_type', 'any' );

  } // tags_archives

  /**
   * Includes the categories in archive pages
   *
   * Modifies the query object to include pages
   * as well as posts in the items to be returned
   * on archive pages
   *
   * @since 1.0
   */
  function category_archives( $wp_query ) {

    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
      $wp_query->set( 'post_type', 'any' );

  } // category_archives

} // PTCFP

$ptcfp = new PTCFP();
