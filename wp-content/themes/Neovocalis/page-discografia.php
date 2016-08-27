<?php
/*
Template Name: Discografía
*/
?>

<?php get_header(); ?>
			<div class="title-wrap">
				<div class="row">
					<div class="large-12 columns">
						<h1><?php print the_title(); ?></h1>
					</div>	
				</div>	
			</div>	
			<div id="content">
			
				<div id="inner-content" class="row">
			
        <?php 
        
        $posts = get_field('discografia_order');
        
        if( $posts ): ?>
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <div class="row">
                <?php setup_postdata($post); ?>
                <div class="large-3 columns">
                  <?php $image = get_field('cd_cover' , $post->ID); ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php print $image['sizes']['large-thumbnails']; ?>"></a>
                </div>
                <div class="large-9 columns">                      
                  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                </div>  
              </div> 
              <br> 
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
