<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pixaful
 */

get_header();
?>
  <svg id="topwave" viewBox="0 0 2000 818" xmlns="http://www.w3.org/2000/svg">
    <path class="cls-1"
      d="m-7.959 818.3c110.6-75.036 225.48-115.68 343.47-111.8 165.58 5.44 238.85 95.731 415.36 107.81 47.764 3.269 159.02-14.485 259.6-35.937 101.01-21.542 168.69-45.288 267.59-43.923 101.27 1.4 198.63 25.524 291.56 67.881a661.52 661.52 0 0 0 199.69 0 663.4 663.4 0 0 0 235.64-83.853l7.99-714.75-2028.9-7.987zm0-16c110.6-75.036 225.48-115.68 343.47-111.8 165.58 5.44 238.85 95.731 415.36 107.81 47.764 3.269 159.02-14.485 259.6-35.937 101.01-21.542 168.69-45.288 267.59-43.923 101.27 1.4 198.63 25.524 291.56 67.881a661.52 661.52 0 0 0 199.69 0 663.4 663.4 0 0 0 235.64-83.853l7.99-714.75-2028.9-7.986z" />
  </svg>
    <main class="main">
      <div class="intro">
        <div class="container">
          <div class="gridrow row">
            <div class="gridcol">
              <h1><?php the_title(); ?></h1>

            </div>

          </div>
        </div>
      </div>

      <div class="container">

        <div class="gridrow row84">
          <div class="gridcol">
            <article class="card-img maxi-card card-alt white-card unpadded">
           
              <div class="card__content">

                <div class="singlecontent">
                  <div class="sticker">
                   
                    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'pixaful' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'pixaful' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <div class="gridcol sidebar">
            <article class="sticky card-img mini-card card-alt sec1-grad unpadded">
              <div class="card__content">

              
               <?php
get_sidebar(); ?>
              </div>
            </article>
			 

			  
			 
          </div>




        </div>

        <!-- fix related posts here -->

        <h2>Related Posts</h2>
<div class="gridrow row3">


<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(
'tag__in' => $tag_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=>3, // Number of related posts to display.
'caller_get_posts'=>1
);

$my_query = new wp_query( $args );
while( $my_query->have_posts() ) {
$my_query->the_post();
?>

<div class="gridcol">

	<article class="card-img mini-card js-equal-height card-alt sec1-grad unpadded">
    <?php if ( get_field( 'post_image' ) ) : ?>
     
<picture>
<source class="rounded-top card__img" srcset="https://res.cloudinary.com/pixaful/images/w_506/<?php the_field( 'feed_image_number' ); ?>.webp"
type="image/webp">
<source class="rounded-top card__img" srcset="https://res.cloudinary.com/pixaful/images/w_506/<?php the_field( 'feed_image_number' ); ?>.png"
type="image/jpeg">
<img class="rounded-top card__img" src="https://res.cloudinary.com/pixaful/images/w_506/<?php the_field( 'feed_image_number' ); ?>.png"
alt="<?php the_title(); ?>" />
</picture>

    <?php endif ?>	
  

 <div class="card__content">
   
     <h3 class="mini-card-title">
     <a href="<?php the_permalink() ?>">
     <?php the_title(); ?></a>
     </h3>
    
     <?php the_excerpt(); ?>
 </div></article>


</div>
<?php }
}
$post = $orig_post;
wp_reset_query();
?>
</div>





        <!-- end of related posts-->
      </div>



    </main>

    



<?php
get_footer();
