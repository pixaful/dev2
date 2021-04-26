<?php
/**
* Template Name: HomePage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pixaful
 */

get_header();
?>

<main class="main">
        <div class="intro">
            <div class="container">
                <div class="gridrow row2">
                    <div class="gridcol">
                     <h1><?php the_field( 'main_title' ); ?></h1>
                     <p><?php the_field( 'main_sub_title' ); ?></p>
                    </div>
                    <div class="gridcol hello">
						<picture>
							<source class="rounded card__img" srcset="https://res.cloudinary.com/pixaful/images/w_1200/<?php the_field( 'intro_block_cloudinary_url' ); ?>.webp"
							  type="image/webp">
							<source class="rounded card__img" srcset="https://res.cloudinary.com/pixaful/images/w_1200/<?php the_field( 'intro_block_cloudinary_url' ); ?>.png"
							  type="image/jpeg">
							<img class="rounded card__img" src="https://res.cloudinary.com/pixaful/images/w_1200/<?php the_field( 'intro_block_cloudinary_url' ); ?>.png"
							  alt="<?php the_title(); ?>" />
						  </picture>
                    </div>
                </div>
            </div>
        </div>
     
            <div class="container">
               <div class="gridrow">
                  <div class="gridcol"><h2 class="white">What would you like to learn today?</h2></div>
             
                  </div>
	
               <div class="gridrow row3">
			   <?php if ( have_rows( 'intro_blocks' ) ) : ?>
		<?php while ( have_rows( 'intro_blocks' ) ) : the_row(); ?>
		<?php $intro_block_image = get_sub_field( 'intro_block_image' ); ?>
		
		
		
		

		<div class="gridcol"> <article class="js-equal-height card-img mini-card card-alt <?php the_sub_field( 'colour' ); ?> unpadded">
			<?php if ( $intro_block_image ) : ?>
		<?php endif; ?>
			<picture>
				<source class="rounded-top card__img" srcset="https://res.cloudinary.com/pixaful/images/w_506/<?php the_sub_field( 'intro_block_cloudinary_url' ); ?>.webp"
				  type="image/webp">
				<source class="rounded-top card__img" srcset="https://res.cloudinary.com/pixaful/images/w_506/<?php the_sub_field( 'intro_block_cloudinary_url' ); ?>.png"
				  type="image/jpeg">
				<img class="rounded-top card__img" src="https://res.cloudinary.com/pixaful/images/w_506/<?php the_sub_field( 'intro_block_cloudinary_url' ); ?>.png"
				  alt="<?php the_title(); ?>" />
			  </picture>
			<div class="card__content">
			  
				  <h3 class="mini-card-title">
					<?php $url = get_sub_field( 'url' ); ?>
					<?php if ( $url ) : ?>
					
					
				  <a href="<?php echo esc_url( $url) ; ?>">
					<?php the_sub_field( 'intro_block_title' ); ?></a>
					<?php endif; ?>
				  </h3>
				  <p><?php the_sub_field( 'intro_block_content' ); ?></p>
			   
				  
			</div></article></div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>





                 
                 
                    
               </div>

               <div class="uk-padding-large uk-padding-remove-horizontal">
      
                <div class="gridrow row2 justify mobile">
                  <div class="gridcol"><h2 class="white">Articles</h2></div>
		 
                  <div class="gridcol"> <a href="#" class="uk-button sec1-grad uk-align-right@m">View all Articles</a></div>
                  </div>
                  <div class="gridrow row3">
		

					<?php
					// the query
					$the_query = new WP_Query(array(
						'category_name' => 'uncategorised',
						'post_status' => 'publish',
						'posts_per_page' => 3,
					));
					?>
			
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<div class="gridcol">
						<article class="card-img js-equal-height mini-card card-alt sec1-grad unpadded">
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
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
			
					<?php else : ?>
						<p><?php __('No News'); ?></p>
					<?php endif; ?>


              </div>
            


              
      <div class="gridrow row2 justify mobile">
        <div class="gridcol"><h2 class="white">Tutorials</h2></div>
        <div class="gridcol"> <a href="#" class="uk-button sec1-grad uk-align-right@m">View all Tutorials</a></div>
        </div>
		<div class="gridrow row3">
		

			<?php
			// the query
			$the_query = new WP_Query(array(
				'category_name' => 'tutorials',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'tag' => 'featured',
			));
			?>
	
			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
	
			<?php else : ?>
				<p><?php __('No News'); ?></p>
			<?php endif; ?>


	  </div>
	
        </div>
      
   

  
        <div class="uk-padding-large uk-padding-remove-horizontal">
          <div class="gridrow row2 justify mobile">
            <div class="gridcol"> <h2 class="white">Reviews</h2></div>
            <div class="gridcol"><a href="#" class="uk-button sec1-grad uk-align-right@m">View all Reviews</a></div>
          </div>
   
			 <div class="card-grid">
		

				<?php
				// the query
				$the_query = new WP_Query(array(
					'category_name' => 'reviews',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'order' => 'ASC',
				));
				?>
		
				<?php if ($the_query->have_posts()) : ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				
					<article class="mini-card module js-equal-height module-article unpadded">
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
					
				
				
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
		
				<?php else : ?>
					<p><?php __('No News'); ?></p>
				<?php endif; ?>
	
	
		  </div>
         </div>
      
</main>
<?php
get_footer();
