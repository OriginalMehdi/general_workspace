<?php
/**
 * Woocommerce Compare page
 *
 * @author  Your Inspiration Themes
 * @package YITH Woocommerce Compare
 * @version 1.1.4
 */

// remove the style of woocommerce
if ( defined( 'WOOCOMMERCE_USE_CSS' ) && WOOCOMMERCE_USE_CSS ) {
	wp_dequeue_style( 'woocommerce_frontend_styles' );
}

$is_iframe = (bool) ( isset( $_REQUEST['iframe'] ) && $_REQUEST['iframe'] );

wp_enqueue_script( 'jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array( 'jquery' ), '1.3', true );
wp_enqueue_script( 'jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array(
	'jquery',
	'jquery-fixedheadertable',
), '1.3', true );

$widths = array();
foreach ( $products as $product ) {
	$widths[] = '{ "sWidth": "205px", resizeable:true }';
}

$table_text = get_option( 'yith_woocompare_table_text' );
do_action( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_table_text', $table_text );
$localized_table_text = apply_filters( 'wpml_translate_single_string', $table_text, 'Plugins', 'plugin_yit_compare_table_text' );

$secondary_color = Atomlab::setting( 'secondary_color' );
$body_font       = Atomlab::setting( 'typography_body' );
$body_font_size  = Atomlab::setting( 'body_font_size' );
$body_color      = Atomlab::setting( 'body_color' );
$heading_color   = Atomlab::setting( 'heading_color' );
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>

<!-- START HEAD -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width"/>

	<?php add_filter( 'wp_title', function () {
		return esc_html__( 'Product Comparison', 'atomlab' );
	} ); ?>

	<link rel="profile" href="http://gmpg.org/xfn/11"/>

	<?php wp_head() ?>

	<?php do_action( 'yith_woocompare_popup_head' ) ?>

	<link rel="stylesheet"
	      href="http://fonts.googleapis.com/css?family=<?php echo rawurlencode( $body_font['font-family'] ); ?>:300,400,500,600,700,800,900"/>
	<link rel="stylesheet" href="<?php echo $this->stylesheet_url() ?>" type="text/css"/>
	<link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/colorbox.css"/>
	<link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/jquery.dataTables.css"/>

	<style type="text/css">
		body.loading {
			background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
		}

		body {
			font-family: '<?php echo esc_attr($body_font['font-family']); ?>';
			line-height: <?php echo esc_attr($body_font['line-height']); ?>;
			letter-spacing: <?php echo esc_attr($body_font['letter-spacing']); ?>;
			font-size: <?php echo esc_attr($body_font_size); ?>px;
			color: <?php echo esc_attr($body_color); ?>;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		h1.title {
			font-size: 1.076em;
			font-weight: 700;
			letter-spacing: 1px;
			background-color: <?php echo $secondary_color; ?>;
			color: #fff;
			height: 46px;
			line-height: 46px;
			padding: 0 10px;
		}

		table.compare-list th,
		table.compare-list tr.title td {
			color: <?php echo $heading_color; ?>;
		}

		table.compare-list th, table.compare-list td {
			border-color: #ededed;
		}

		table.compare-list tr.title td {
			text-transform: none;
			font-size: 1.576em;
		}

		table.compare-list .stock td span {
			color: #38cb89;
		}

		table.compare-list .add-to-cart td a {
			position: relative;
			display: inline-block;
			font-size: 16px;
			font-weight: 700;
			height: 48px;
			line-height: 46px;
			letter-spacing: .0625em;
			border: 1px solid <?php echo $secondary_color; ?>;
			border-radius: 5px;
			background-color: <?php echo $secondary_color; ?>;
			color: #fff;
			margin: 0;
			padding: 0 26px;
			text-transform: capitalize;
			-webkit-transition: all .3s ease-in-out;
			-moz-transition: all .3s ease-in-out;
			transition: all .3s ease-in-out;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		table.compare-list .add-to-cart td a:hover {
			background-color: transparent;
			color: <?php echo $secondary_color; ?>;
		}

		table.compare-list th, table.compare-list td, table.compare-list th, table.compare-list .price.repeated td {
			padding: 10px !important;
		}

		table.compare-list tr.price td {
			text-decoration: none;
			color: <?php echo $secondary_color; ?>;
		}

		del {
			position: relative;
			text-decoration: none;
		}

		del .amount {
			color: #cccccc;
		}

		del:before {
			position: absolute;
			top: 50%;
			left: 0;
			width: 100%;
			height: 1px;
			margin-top: -2px;
			background: #cccccc;
			content: '';
		}

		ins {
			text-decoration: none;
		}

		.amount {
			font-size: 18px;
			font-weight: 700;
			color: <?php echo $secondary_color; ?>;
		}

		table.compare-list .remove td a {
			color: #ababab;
			font-weight: 700;
			font-size: 12px;
			letter-spacing: 3px;
			text-transform: uppercase;
			-webkit-transition: all .3s ease-in-out;
			-moz-transition: all .3s ease-in-out;
			transition: all .3s ease-in-out;
		}

		table.compare-list .remove td a .remove {
			color: #f00;
			background-color: transparent !important;
		}

		table.compare-list .remove td a:hover {
			color: #f00;
		}

		table.compare-list .remove td a:hover .remove {
			color: #f00;
		}
	</style>
</head>
<!-- END HEAD -->

<?php global $product; ?>

<!-- START BODY -->
<body <?php body_class( 'woocommerce' ) ?>>

<h1 class="title">
	<?php echo esc_html( $localized_table_text ); ?>
	<?php if ( ! $is_iframe ) : ?>
		<a class="close" href="#"><?php esc_html_e( 'Close window [X]', 'atomlab' ) ?></a>
	<?php endif; ?>
</h1>

<?php do_action( 'yith_woocompare_before_main_table' ); ?>

<table class="compare-list" cellpadding="0" cellspacing="0"<?php if ( empty( $products ) )
	echo ' style="width:100%"' ?>>
	<thead>
	<tr>
		<th>&nbsp;</th>
		<?php foreach ( $products as $product_id => $product ) : ?>
			<td></td>
		<?php endforeach; ?>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th>&nbsp;</th>
		<?php foreach ( $products as $product_id => $product ) : ?>
			<td></td>
		<?php endforeach; ?>
	</tr>
	</tfoot>
	<tbody>

	<?php if ( empty( $products ) ) : ?>

		<tr class="no-products">
			<td><?php _e( 'No products added in the compare table.', 'atomlab' ) ?></td>
		</tr>

	<?php else : ?>
		<tr class="remove">
			<th>&nbsp;</th>
			<?php
			$index = 0;
			foreach ( $products as $product_id => $product ) :
				$product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
				<td class="<?php echo $product_class; ?>">
					<a href="<?php echo add_query_arg( 'redirect', 'view', $this->remove_product_url( $product_id ) ) ?>"
					   data-product_id="<?php echo $product_id; ?>"><?php _e( 'Remove', 'atomlab' ) ?>
						<span class="remove">x</span></a>
				</td>
				<?php
				++ $index;
			endforeach;
			?>
		</tr>

		<?php foreach ( $fields as $field => $name ) : ?>

			<tr class="<?php echo $field ?>">

				<th>
					<?php echo $name ?>
					<?php if ( $field == 'image' ) {
						echo '<div class="fixed-th"></div>';
					} ?>
				</th>

				<?php
				$index = 0;
				foreach ( $products as $product_id => $product ) :
					$product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id; ?>
					<td class="<?php echo $product_class; ?>"><?php
						switch ( $field ) {

							case 'image':
								echo '<div class="image-wrap">' . wp_get_attachment_image( $product->fields[ $field ], 'yith-woocompare-image' ) . '</div>';
								break;

							case 'add-to-cart':
								woocommerce_template_loop_add_to_cart();
								break;

							default:
								echo empty( $product->fields[ $field ] ) ? '&nbsp;' : $product->fields[ $field ];
								break;
						}
						?>
					</td>
					<?php
					++ $index;
				endforeach; ?>

			</tr>

		<?php endforeach; ?>

		<?php if ( $repeat_price == 'yes' && isset( $fields['price'] ) ) : ?>
			<tr class="price repeated">
				<th><?php echo $fields['price'] ?></th>

				<?php
				$index = 0;
				foreach ( $products as $product_id => $product ) :
					$product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
					<td class="<?php echo $product_class ?>"><?php echo $product->fields['price'] ?></td>
					<?php
					++ $index;
				endforeach; ?>

			</tr>
		<?php endif; ?>

		<?php if ( $repeat_add_to_cart == 'yes' && isset( $fields['add-to-cart'] ) ) : ?>
			<tr class="add-to-cart repeated">
				<th><?php echo $fields['add-to-cart'] ?></th>

				<?php
				$index = 0;
				foreach ( $products as $product_id => $product ) :
					$product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id ?>
					<td class="<?php echo $product_class ?>">
						<?php woocommerce_template_loop_add_to_cart(); ?>
					</td>
					<?php
					++ $index;
				endforeach; ?>

			</tr>
		<?php endif; ?>

	<?php endif; ?>

	</tbody>
</table>

<?php do_action( 'yith_woocompare_after_main_table' ); ?>

<?php if ( wp_script_is( 'responsive-theme', 'enqueued' ) )
	wp_dequeue_script( 'responsive-theme' ) ?><?php if ( wp_script_is( 'responsive-theme', 'enqueued' ) )
	wp_dequeue_script( 'responsive-theme' ) ?>
<?php print_footer_scripts(); ?>

<script>

    jQuery( document )
        .ready( function ( $ ) {
            $( 'a' )
                .attr( 'target', '_parent' );

            var oTable;
            $( 'body' )
                .on( 'yith_woocompare_render_table', function () {
                    if ( $( window )
                             .width() > 767 ) {
                        oTable = $( 'table.compare-list' )
                            .dataTable( {
                                "sScrollX": "100%", //"sScrollXInner": "150%",
                                "bScrollInfinite": true,
                                "bScrollCollapse": true,
                                "bPaginate": false,
                                "bSort": false,
                                "bInfo": false,
                                "bFilter": false,
                                "bAutoWidth": false
                            } );

                        new FixedColumns( oTable );
                        $( '<table class="compare-list" />' )
                            .insertAfter( $( 'h1' ) )
                            .hide();
                    }
                } )
                .trigger( 'yith_woocompare_render_table' );

            // add to cart
            var redirect_to_cart = false,
                body             = $( 'body' );

            // close colorbox if redirect to cart is active after add to cart
            body.on( 'adding_to_cart', function ( $thisbutton, data ) {
                if ( wc_add_to_cart_params.cart_redirect_after_add == 'yes' ) {
                    wc_add_to_cart_params.cart_redirect_after_add = 'no';
                    redirect_to_cart                              = true;
                }
            } );

            body.on( 'wc_cart_button_updated', function ( ev, button ) {
                $( 'a.added_to_cart' )
                    .attr( 'target', '_parent' );
            } );

            // remove add to cart button after added
            body.on( 'added_to_cart', function ( ev, fragments, cart_hash, button ) {

                $( 'a' )
                    .attr( 'target', '_parent' );

                if ( redirect_to_cart == true ) {
                    // redirect
                    parent.window.location = wc_add_to_cart_params.cart_url;
                    return;
                }

                // Replace fragments
                if ( fragments ) {
                    $.each( fragments, function ( key, value ) {
                        $( key, window.parent.document )
                            .replaceWith( value );
                    } );
                }
            } );

            // close window
            $( document )
                .on( 'click', 'a.close', function ( e ) {
                    e.preventDefault();
                    window.close();
                } );

            $( window )
                .on( 'yith_woocompare_product_removed', function () {
                    if ( $( window )
                             .width() > 767 ) {
                        oTable.fnDestroy( true );
                    }
                    $( 'body' )
                        .trigger( 'yith_woocompare_render_table' );
                } );

        } );

</script>

</body>
</html>
