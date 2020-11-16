<?php
/**
 * Add to wishlist template
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

global $product;

$tooltip_position = 'left';
$hint_classes     = '';
$tooltip_position = apply_filters( 'woocommerce_wishlist_tooltip_position', $tooltip_position );

if ( $tooltip_position !== 'none' ) {
	$hint_classes .= "hint--rounded hint--bounce hint--{$tooltip_position}";
}
?>

<div class="product-action yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product_id ); ?>">
	<?php if ( ! ( $disable_wishlist && ! is_user_logged_in() ) ) { ?>
		<div
			class="<?php echo esc_attr( $hint_classes ); ?> yith-wcwl-add-button <?php echo ( $exists && ! $available_multi_wishlist ) ? 'hide' : 'show'; ?>"
			aria-label="<?php esc_attr_e( 'Add to wishlist', 'atomlab' ); ?>"
			style="display:<?php echo ( $exists && ! $available_multi_wishlist ) ? 'none' : 'block'; ?>">
			<?php yith_wcwl_get_template( 'add-to-wishlist-' . $template_part . '.php', $atts ); ?>
		</div>

		<div class="<?php echo esc_attr( $hint_classes ); ?> yith-wcwl-wishlistaddedbrowse hide"
		     aria-label="<?php echo esc_attr( apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text ) ); ?>"
		     style="display:none;">
			<span class="feedback"><?php echo esc_html( $product_added_text ); ?></span>
			<a href="<?php echo esc_url( $wishlist_url ); ?>" rel="nofollow">
				<?php echo apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text ); ?>
			</a>
		</div>

		<div
			class="<?php echo esc_attr( $hint_classes ); ?> yith-wcwl-wishlistexistsbrowse <?php echo ( $exists && ! $available_multi_wishlist ) ? 'show' : 'hide'; ?>"
			aria-label="<?php echo esc_attr( apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text ) ); ?>"
			style="display:<?php echo ( $exists && ! $available_multi_wishlist ) ? 'block' : 'none'; ?>">
			<span class="feedback"><?php echo esc_html( $already_in_wishslist_text ); ?></span>
			<a href="<?php echo esc_url( $wishlist_url ); ?>" rel="nofollow">
				<?php echo apply_filters( 'yith-wcwl-browse-wishlist-label', $browse_wishlist_text ); ?>
			</a>
		</div>

		<div class="yith-wcwl-wishlistaddresponse"></div>
	<?php } else { ?>
		<a href="<?php echo esc_url( add_query_arg( array(
			'wishlist_notice' => 'true',
			'add_to_wishlist' => $product_id,
		), get_permalink( wc_get_page_id( 'myaccount' ) ) ) ); ?>"
		   rel="nofollow"
		   class="<?php echo esc_attr( $hint_classes ); ?> <?php echo str_replace( 'add_to_wishlist', '', $link_classes ); ?>"
		   aria-label="<?php esc_attr_e( 'Add to wishlist', 'atomlab' ); ?>"
		><?php echo esc_attr( $icon ); ?><?php echo esc_html( $label ); ?>
		</a>
	<?php } ?>

</div>
