<?php
/**
 * Template part for displaying blog content in home.php, archive.php.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TM Atomlab
 * @since   1.0
 */
$style = 'list';

if ( have_posts() ) :
	global $wp_query;
	$atomlab_query = $wp_query;
	$count         = $atomlab_query->post_count;
	$classes       = array(
		'tm-blog',
		"style-$style",
	);
	$grid_classes  = array( 'tm-grid' );

	?>
	<div class="tm-grid-wrapper <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="<?php echo esc_attr( implode( ' ', $grid_classes ) ); ?>"
			<?php
			if ( $style === 'list' ) {
				echo 'data-grid-has-gallery="true"';
			}
			?>
		>
			<?php if ( $style === 'list' ) { ?>
				<?php
				while ( $atomlab_query->have_posts() ) :
					$atomlab_query->the_post();
					$classes = array( 'grid-item', 'post-item' );
					$format  = '';
					if ( get_post_format() !== false ) {
						$format = get_post_format();
					}
					?>
					<div <?php post_class( implode( ' ', $classes ) ); ?>>
						<?php if ( ! in_array( $format, array( 'link' ) ) ) : ?>
							<?php get_template_part( 'loop/blog/format', $format ); ?>
						<?php endif; ?>
						<div class="post-info">
							<?php if ( has_category() ) : ?>
								<div class="post-categories">
									<?php the_category( ', ' ); ?>
								</div>
							<?php endif; ?>

							<?php get_template_part( 'loop/blog/title' ); ?>

							<?php get_template_part( 'loop/blog/meta' ); ?>

							<?php if ( in_array( $format, array( 'link' ) ) ) : ?>
								<?php get_template_part( 'loop/blog/format', $format ); ?>
							<?php endif; ?>

							<div class="post-excerpt">
								<?php Atomlab_Templates::excerpt( array( 'limit' => 42, 'type' => 'word' ) ); ?>
							</div>

							<div class="post-footer">
								<div class="post-footer-left">
									<?php get_template_part( 'loop/blog/readmore' ); ?>
								</div>

								<div class="post-footer-right">
									<?php get_template_part( 'loop/blog/sharing' ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php } ?>
		</div>
		<div class="tm-grid-pagination">
			<?php Atomlab_Templates::paging_nav(); ?>
		</div>
	</div>
<?php else : get_template_part( 'components/content', 'none' ); ?>
<?php endif; ?>
