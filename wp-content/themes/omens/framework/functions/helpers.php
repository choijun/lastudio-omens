<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Return theme settings
 */

if ( ! function_exists( 'omens_get_theme_mod' ) ) {

	function omens_get_theme_mod( $key = '', $default = '' ) {
		$mods = get_theme_mods();

		if ( empty( $mods ) || $key == '' ) {
			$value = $default;
		} else {
			$value = ! empty( $mods[ $key ] ) ? $mods[ $key ] : $default;
		}

		return apply_filters( 'omens/filter/omens_get_theme_mode', $value, $key, $default, $mods );
	}

}

if ( ! function_exists( 'omens_get_option' ) ) {

	function omens_get_option( $key = '', $default = '' ) {
		$theme_options = get_option( 'omens_options', array() );

		if ( empty( $theme_options ) || $key == '' ) {
			$value = $default;
		} else {
			$value = ! empty( $theme_options[ $key ] ) ? $theme_options[ $key ] : $default;
		}

		return apply_filters( 'omens/filter/get_option', $value, $key, $default, $theme_options );
	}

}

/**
 * Sanitize HTML output
 * @since 1.0.0
 */

if ( ! function_exists( 'omens_render_variable' ) ) {
	function omens_render_variable( $variable ) {
		return $variable;
	}
}

/**
 * @param $content
 * @param bool $autop
 *
 * @return string
 */

if ( ! function_exists( 'omens_transfer_text_to_format' ) ) {
	function omens_transfer_text_to_format( $content, $autop = false ) {
		if ( $autop ) {
			$content = preg_replace( '/<\/?p\>/', "\n", $content );
			$content = preg_replace( '/<p[^>]*><\\/p[^>]*>/', "", $content );
			$content = wpautop( $content . "\n" );
		}

		return do_shortcode( shortcode_unautop( $content ) );
	}
}

/**
 * Comments and pingbacks
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'omens_comment' ) ) {

	function omens_comment( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				// Display trackbacks differently than normal comments.
				?>

                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

                <div id="comment-<?php comment_ID(); ?>" class="comment-container">
                    <p><?php esc_html_e( 'Pingback:', 'omens' ); ?>
                        <span><span><?php comment_author_link(); ?></span></span> <?php edit_comment_link( esc_html__( '(Edit)', 'omens' ), '<span class="edit-link">', '</span>' ); ?>
                    </p>
                </div>

				<?php
				break;
			default :
				// Proceed with normal comments.
				global $post;
				?>

            <div id="comment-<?php comment_ID(); ?>" class="comment-container">

                <div <?php comment_class( 'comment-body' ); ?>>

					<?php echo get_avatar( $comment, apply_filters( 'omens_comment_avatar_size', 150 ) ); ?>

                    <div class="comment-content-outer">

                        <div class="comment-author">
                            <h3
                              class="comment-link"><?php printf( esc_html__( '%s ', 'omens' ), sprintf( '%s', get_comment_author_link() ) ); ?></h3>
                            <span class="comment-meta commentmetadata">
		                    	<span class="comment-date"><?php comment_date( 'j M Y' ); ?></span>
		                    </span>
                        </div>

                        <div class="comment-entry">
							<?php if ( '0' == $comment->comment_approved ) : ?>
                                <p
                                  class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'omens' ); ?></p>
							<?php endif; ?>

                            <div class="comment-content">
								<?php comment_text(); ?>
                            </div>

                        </div>
                        <span class="comment-meta commentmetadata">
                            <?php comment_reply_link( array_merge( $args, array( 'depth'     => $depth,
                                                                                 'max_depth' => $args['max_depth']
                            ) ) ); ?>
                            <?php edit_comment_link( __( 'edit', 'omens' ) ); ?>
                        </span>
                    </div>

                </div><!-- #comment-## -->

				<?php
				break;
		endswitch; // end comment_type check
	}

}

/**
 * Comment fields
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'omens_modify_comment_form_fields' ) ) {

	function omens_modify_comment_form_fields( $fields ) {

		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );

		$fields['author'] = '<div class="comment-form-author"><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Name (required)', 'omens' ) . '" size="22" tabindex="101"' . ( $req ? ' aria-required="true"' : '' ) . ' class="input-name" /></div>';

		$fields['email'] = '<div class="comment-form-email"><input type="text" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Email', 'omens' ) . '" size="22" tabindex="102"' . ( $req ? ' aria-required="true"' : '' ) . ' class="input-email" /></div>';

		$fields['url'] = '<div class="comment-form-url"><input type="text" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'omens' ) . '" size="22" tabindex="103" class="input-website" /></div>';

		return $fields;

	}

	add_filter( 'comment_form_default_fields', 'omens_modify_comment_form_fields' );

}

/**
 * String to boolean
 */
if ( ! function_exists( 'omens_string_to_bool' ) ) {
	function omens_string_to_bool( $string ) {
		return is_bool( $string ) ? $string : ( 'yes' === $string || 'on' === $string || 1 === $string || 'true' === $string || '1' === $string );
	}
}

/**
 * @param string $thumbnail_size
 * @param bool $post_link
 */
if ( ! function_exists( 'omens_get_post_thumbnail_format' ) ) {
	function omens_get_post_thumbnail_format( $thumbnail_size = 'full', $post_link = true ) {
		if ( post_password_required() || is_attachment() ) {
			return '';
		}
		$output              = '';
		$format_output       = '';
		$flag_format_content = false;
		$post_format         = get_post_format() ? get_post_format() : 'standard';
		$post_id             = get_the_ID();

		if(empty($thumbnail_size)){
			$thumbnail_size = 'full';
        }

		switch ( $post_format ) {
			case 'link':
				$_link        = get_post_meta( $post_id, '_la_link', true );
				$_link_text   = get_post_meta( $post_id, '_la_link_text', true );
				$_link_target = get_post_meta( $post_id, '_la_link_target', true );
				if ( empty( $_link_target ) ) {
					$_link_target = '_blank';
				}
				if ( empty( $_link_text ) ) {
					$_link_text = get_the_title();
				}
				if ( ! empty( $_link ) ) {
					$format_output       = sprintf( '<div class="postformat-content postformat-content--link"><a href="%1$s" target="%2$s">%3$s</a></div>', esc_url( $_link ), esc_attr( $_link_target ), esc_html( $_link_text ) );
					$flag_format_content = true;
				}
				break;

			case 'quote':
				$_quote_text  = get_post_meta( $post_id, '_la_quote_text', true );
				$_quote_cite  = get_post_meta( $post_id, '_la_quote_cite', true );
				$_quote_color = get_post_meta( $post_id, '_la_quote_color', true );
				$_quote_bg    = get_post_meta( $post_id, '_la_quote_bg', true );
				if ( ! empty( $_quote_text ) ) {
					if ( ! empty( $_quote_cite ) ) {
						$_quote_cite = sprintf( '<div class="postformat-content-cite">%1$s</div>', $_quote_cite );
					}
					$_quote_style = '';
					if ( empty( $_quote_color ) ) {
						$_quote_style .= '--postformat-quote-color:' . $_quote_color . ';';
					}
					if ( empty( $_quote_bg ) ) {
						$_quote_style .= '--postformat-quote-bg:' . $_quote_bg . ';';
					}

					if(has_post_thumbnail()){
						$format_output = sprintf('<div class="postformat-content postformat-content--standard postformat-content--quote" style="%3$s"><div class="postformat-content--inner">%4$s</div><div class="postformat-content--quote-inner"><div class="postformat-content-text">%1$s</div>%2$s</div></div>', esc_html( $_quote_text ), $_quote_cite, $_quote_style, get_the_post_thumbnail( $post_id, $thumbnail_size ) );
                    }
					else{
						$format_output = sprintf( '<div class="postformat-content postformat-content--quote" style="%3$s"><div class="postformat-content--quote-inner"><div class="postformat-content-text">%1$s</div>%2$s</div></div>', esc_html( $_quote_text ), $_quote_cite, $_quote_style );
                    }

					$flag_format_content = true;
				}
				break;

			case 'gallery':
				$_galleries      = get_post_meta( $post_id, '_la_gallery_images', true );
				$_galleries      = explode( ',', $_galleries );
				$_gallery_output = '';
				if ( has_post_thumbnail() ) {
					$_gallery_output .= sprintf( '<div class="postformat--gallery swiper-slide"><span>%1$s</span></div>', get_the_post_thumbnail( $post_id, $thumbnail_size ) );
				}
				foreach ( $_galleries as $gallery_id ) {
					if ( wp_attachment_is_image( $gallery_id ) ) {
						$_gallery_output .= sprintf( '<div class="postformat--gallery swiper-slide"><span>%1$s</span></div>', wp_get_attachment_image( $gallery_id, $thumbnail_size ) );
					}
				}
				if ( ! empty( $_gallery_output ) ) {
					$format_output = sprintf(
						'<div class="postformat-content"><div class="lakit-carousel" data-slider_options="%2$s"><div class="lakit-carousel-inner"><div class="swiper-container"><div class="swiper-wrapper">%1$s</div></div></div><div class="lakitcarousel_postformat_prev lakit-arrow prev-arrow"><i aria-hidden="true" class="lastudioicon-arrow-left"></i></div><div class="lakitcarousel_postformat_next lakit-arrow next-arrow"><i aria-hidden="true" class="lastudioicon-arrow-right"></i></div><div class="lakit-carousel__dots lakitcarousel_postformat_dots swiper-pagination"></div></div></div>',
						$_gallery_output,
						esc_attr( json_encode(
							array(
								'slidesToScroll' => [
									'desktop' => 1
								],
                                'slidesToShow' => [
									'desktop' => 1
								],
								'rows'           => [
									'desktop' => 1
								],
                                'infinite'   => true,
                                'arrows'    => true,
                                'dots'      => true,
                                'autoplay'  => true,
                                'autoplaySpeed'  => 6000,
                                'speed'  => 600,
                                'prevArrow' => '.lakitcarousel_postformat_prev',
                                'nextArrow' => '.lakitcarousel_postformat_next',
                                'dotsElm'   => '.lakitcarousel_postformat_dots',
							)
						) )
					);
					$flag_format_content = true;
				}
				break;

			case 'audio':
			case 'video':
			    $_video_link      = get_post_meta( $post_id, '_la_video_link', true );
			    if(!empty($_video_link) && has_post_thumbnail() ){
			        $_icon = '<span class="postformat--icon"><i class="lastudioicon lastudioicon-triangle-right"></i></span>';
				    $_html = get_the_post_thumbnail( $post_id, $thumbnail_size );
				    $format_output = sprintf('<div class="postformat-content postformat-content--v"><div class="postformat-content--inner"><a href="%1$s" class="la-popup">%2$s%3$s</a></div></div>', $_video_link, $_html, $_icon );
				    $flag_format_content = true;
                }
            break;
		}
		if($flag_format_content){
		    $output = $format_output;
        }
		else if( has_post_thumbnail() ){
            $output = sprintf('<div class="postformat-content postformat-content--standard"><div class="postformat-content--inner">%1$s</div></div>', get_the_post_thumbnail( $post_id, $thumbnail_size ) );
        }
	    return $output;
	}
}

if ( ! function_exists( 'omens_entry_meta_item_category_list' ) ) {
	function omens_entry_meta_item_category_list( $before = '', $after = '', $separator = ', ', $parents = '', $post_id = false ) {
		add_filter( 'get_the_terms', 'omens_exclude_demo_term_in_category' );
		$categories_list = get_the_category_list( '{{_}}', $parents, $post_id );
		omens_deactive_filter( 'get_the_terms', 'omens_exclude_demo_term_in_category' );
		if ( $categories_list ) {
			printf(
				'%3$s<span class="screen-reader-text">%1$s </span><span>%2$s</span>%4$s',
				esc_html_x( 'Posted in', 'front-view', 'omens' ),
				str_replace( '{{_}}', $separator, $categories_list ),
				$before,
				$after
			);
		}
	}
}

if ( ! function_exists( 'omens_exclude_demo_term_in_category' ) ) {
	function omens_exclude_demo_term_in_category( $term ) {
		return apply_filters( 'omens/post_category_excluded', $term );
	}
}

if ( ! function_exists( 'omens_deactive_filter' ) ) {
	function omens_deactive_filter( $tag, $function_to_remove, $priority = 10 ) {
		return call_user_func( 'remove_filter', $tag, $function_to_remove, $priority );
	}
}

if ( ! function_exists( 'omens_wpml_object_id' ) ) {
	function omens_wpml_object_id( $element_id, $element_type = 'post', $return_original_if_missing = false, $ulanguage_code = null ) {
		if ( function_exists( 'wpml_object_id_filter' ) ) {
			return wpml_object_id_filter( $element_id, $element_type, $return_original_if_missing, $ulanguage_code );
		} elseif ( function_exists( 'icl_object_id' ) ) {
			return icl_object_id( $element_id, $element_type, $return_original_if_missing, $ulanguage_code );
		} else {
			return $element_id;
		}
	}
}

if ( ! function_exists( 'omens_is_blog' ) ) {
	function omens_is_blog() {
		return ( is_home() || is_tag() || is_category() || is_date() || is_year() || is_month() || is_author() ) ? true : false;
	}
}

if ( ! function_exists( 'omens_get_wishlist_url' ) ) {
	function omens_get_wishlist_url() {
		$wishlist_page_id = omens_get_theme_mod( 'wishlist_page', 0 );

		return ( ! empty( $wishlist_page_id ) ? get_the_permalink( $wishlist_page_id ) : esc_url( home_url( '/wishlist/' ) ) );
	}
}

if ( ! function_exists( 'omens_get_compare_url' ) ) {
	function omens_get_compare_url() {
		$compare_page_id = omens_get_theme_mod( 'compare_page', 0 );

		return ( ! empty( $compare_page_id ) ? get_the_permalink( $compare_page_id ) : esc_url( home_url( '/compare/' ) ) );
	}
}