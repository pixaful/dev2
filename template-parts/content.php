<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pixaful
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
	

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
			<?php the_time('l, F jS, Y') ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>


	<?php pixaful_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pixaful' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pixaful' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pixaful_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</div><!-- #post-<?php the_ID(); ?> -->
