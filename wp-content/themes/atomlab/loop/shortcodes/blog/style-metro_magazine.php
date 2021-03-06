<?php
if ( $metro_layout ) {
	$metro_layout = (array) vc_param_group_parse_atts( $metro_layout );
	$_sizes       = array();
	foreach ( $metro_layout as $key => $value ) {
		$_sizes[] = $value['size'];
	}
	$metro_layout = $_sizes;
} else {
	$metro_layout = array(
		'2:2',
		'1:1',
		'1:1',
		'2:2',
		'1:1',
		'1:1',
	);
}

if ( count( $metro_layout ) < 1 ) {
	return;
}

$metro_layout_count = count( $metro_layout );
$metro_item_count   = 0;

while ( $atomlab_query->have_posts() ) :
	$atomlab_query->the_post();

	$classes = array( 'post-item grid-item' );

	$_image_width  = 480;
	$_image_height = 480;
	if ( $metro_layout[ $metro_item_count ] === '2:1' ) {
		$_image_width  = 960;
		$_image_height = 480;
	} elseif ( $metro_layout[ $metro_item_count ] === '1:2' ) {
		$_image_width  = 480;
		$_image_height = 960;
	} elseif ( $metro_layout[ $metro_item_count ] === '2:2' ) {
		$_image_width  = 960;
		$_image_height = 960;
	}

	$format = '';
	if ( get_post_format() !== false ) {
		$format = get_post_format();
	}
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>
		<?php if ( in_array( $metro_layout[ $metro_item_count ], array(
			'2:1',
			'2:2',
		), true ) ) : ?>
			data-width="2"
		<?php endif; ?>
		<?php if ( in_array( $metro_layout[ $metro_item_count ], array(
			'1:2',
			'2:2',
		), true ) ) : ?>
			data-height="2"
		<?php endif; ?>
	>
		<?php if ( has_post_thumbnail() ) { ?>
			<?php
			$full_image_size = get_the_post_thumbnail_url( null, 'full' );
			$image_url       = Atomlab_Helper::aq_resize( array(
				'url'    => $full_image_size,
				'width'  => $_image_width,
				'height' => $_image_height,
				'crop'   => true,
			) );
			?>
		<?php } else {
			$image_url = Atomlab_Templates::image_placeholder_url( $_image_width, $_image_height );
		} ?>

		<?php
		$post_options = unserialize( get_post_meta( get_the_ID(), 'insight_post_options', true ) );
		$video        = '';
		if ( $post_options !== false && isset( $post_options['post_video'] ) ) {
			$video = $post_options['post_video'];
		}
		?>

		<a href="<?php the_permalink() ?>">
			<div class="post-thumbnail"
			     style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
			<div class="post-overlay"></div>

			<?php if ( $format === 'video' ) : ?>
				<div class="post-video-play">
					<div class="video-button">
						<div class="video-play">
							<i class="ion-ios-play"></i>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</a>

		<div class="post-info">
			<?php get_template_part( 'loop/blog/category', 'background' ); ?>

			<?php get_template_part( 'loop/blog/title' ); ?>
		</div>
	</div>
	<?php
	$metro_item_count ++;
	if ( $metro_item_count == $count || $metro_layout_count == $metro_item_count ) {
		$metro_item_count = 0;
	}
	?>
<?php endwhile; ?>
