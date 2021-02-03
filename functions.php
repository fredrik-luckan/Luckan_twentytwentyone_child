<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style','tt1-dark-mode' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function tec_register_block_patterns() {

  // Let's check if block patterns are even supported
  if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
    
    // Start the pattern
    register_block_pattern(
      // The registered name of the pattern
      'tec/hero',
      array(
        // The pattern name (required)
        'title'       => __( 'hero', 'textdomain' ),
        // The pattern description (optional)
        'description' => _x( 'Displays two buttons on the same line.', 'Block pattern description', 'textdomain' ),
        // The escaped pattern code (required)
        'content'     => "<!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaId\":48,\"mediaLink\":\"http://luckansdevshop.local/create-your-website-with-blocks/image-2/\",\"mediaType\":\"image\",\"mediaWidth\":60,\"mediaSizeSlug\":\"large\",\"verticalAlignment\":\"center\",\"imageFill\":true,\"className\":\"tw-mb-0 tw-mt-0 is-style-default\",\"twStackedMd\":true,\"twMediaBottom\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center is-image-fill tw-mb-0 tw-mt-0 is-style-default tw-stack-md tw-media-bottom\" style=\"grid-template-columns:auto 60%\"><figure class=\"wp-block-media-text__media\" style=\"background-image:url(http://luckansdevshop.local/wp-content/uploads/2021/01/image-1024x662.jpg);background-position:50% 50%\"><img src=\"http://luckansdevshop.local/wp-content/uploads/2021/01/image-1024x662.jpg\" alt=\"\" class=\"wp-image-48 size-large\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":1,\"className\":\"tw-mt-0\",\"fontSize\":\"h2\"} -->\n<h1 class=\"tw-mt-0 has-h-2-font-size\">Barnkultur på<br>svenska i Finland</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\">Luckan är ett finlandssvenskt informations \&amp; kulturcentrum. I Finland finns elva luckan och alla arbetar på barnkultur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"tw-mb-0\"} -->\n<div class=\"wp-block-buttons tw-mb-0\"><!-- wp:button {\"borderRadius\":0,\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link no-border-radius\" href=\"http://luckansdevshop.local/about/\">Läs mer om oss</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text -->",
        // Pattern categories (optional)
        'categories'  => array( 'Luckan' ),
      )
    );
  }
}

// Register the pattern on init
add_action( 'init', 'tec_register_block_patterns' );

function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');


// filter out Kategory stuff
    add_filter( 'get_the_archive_title', function ($title) {    
        if ( is_category() ) {    
                $title = single_cat_title( '', false );    
            } elseif ( is_tag() ) {    
                $title = single_tag_title( '', false );    
            } elseif ( is_author() ) {    
                $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
            } elseif ( is_tax() ) { //for custom post types
                $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title( '', false );
            }
        return $title;    
    });

add_image_size( 'homepage-thumb size', 768, 497 );
add_image_size( 'post-thumbnail', 622, 280 );

