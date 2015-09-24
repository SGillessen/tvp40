<?php
/**
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    tvp40
 * @subpackage Functions
 * @author     Sven Gillessen <sven.gillessen@thevenusproject.com>
 * @copyright  Copyright (c) 2015, Sven Gillessen
 * @link       https://thevenusproject.com
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Get the template directory and make sure it has a trailing slash. */
$tvp40_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and theme files. */
require_once( $tvp40_dir . 'libs/hybrid-core/hybrid.php'        );
//require_once( $tvp40_dir . 'inc/custom-background.php' ); // todo: check content and move to theme dir
//require_once( $tvp40_dir . 'inc/custom-header.php'     ); // todo: check content and move to theme dir
//require_once( $tvp40_dir . 'inc/custom-colors.php'     ); // todo: check content and move to theme dir
//require_once( $tvp40_dir . 'inc/theme.php'             ); // todo: check content and move to theme dir
//require_once( $tvp40_dir . 'inc/customize.php'         ); // todo: check content and move to theme dir

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Set up the theme early. */
add_action( 'after_setup_theme', 'tvp40_theme_setup', 5 );

/**
 * The theme setup function.  This function sets up support for various WordPress and framework functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function tvp40_theme_setup() { // todo: check docs and enable required extensions

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Pagination. */
	add_theme_support( 'loop-pagination' );

	/* Nicer [gallery] shortcode implementation. */
	add_theme_support( 'cleaner-gallery' );

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/* Post formats. */
	add_theme_support( 
		'post-formats', 
		array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) 
	);

	/* Editor styles. */
	add_editor_style( tvp40_get_editor_styles() );

	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 1100 ); //todo:change to fit
}
