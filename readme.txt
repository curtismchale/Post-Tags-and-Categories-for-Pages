=== Post Tags and Categories for Pages ===

Contributors: Curtis McHale
Tags: wp, tags, categories, pages
Requires at least: 3.0
Tested up to: 4.5.2
Stable tag: 1.4.1

Adds the built in WordPress categories and tags to your pages.

== Description ==

Post Tags and Categories for Pages adds the stock WordPress categories
for all of your pages. Pages will show up in the stock WordPress archive
queries.

This WILL NOT add any display of categories or tags to your template files. There are simply to
many ways that things could be displayed in a theme so we don't do it. If you need to add this
then look at using WordPress functions like <a href="http://codex.wordpress.org/Function_Reference/the_category">the_category()</a>
and other category or tag function supplied in WordPress.

== Installation ==

1. Extract post-tags-categories-pages/ to your wp-content/plugins/
folder.

2. Activate the plugin.

== Changelog ==

= 1.4 =

- prevented it from setting `post_type` on archive/search pages and if `post_type` was already set thanks macbookandrew

= 1.3 =

- making the README more clear for end users

= 1.1 =

- made it a class based plugin
- cleaned up TODO notes that I have no reference for now
- brought it in to line better with WordPress coding standards

= 1.0 =

- released on WordPress repository
