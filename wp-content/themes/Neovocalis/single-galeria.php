<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>
			<div class="title-wrap">
				<div class="row">
					<div class="large-12 columns">
						<h1><a href="/media/galeria/">Galería:</a> <?php print the_title(); ?></h1>
					</div>	
				</div>	
			</div>	
			<div id="content">

				<div id="inner-content" class="row">
			
					<div id="main" class="large-12 medium-12 columns first" role="main">
			
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
									
						<?php 
						
						$images = get_field('galeria');
						
						if( $images ): ?>
						        <?php foreach( $images as $image ): ?>
						            <div class="large-2 medium-4 small-6 left">
						                <a href="<?php echo $image['url']; ?>" rel="lightbox[group]">
						                     <img src="<?php echo $image['sizes']['large-thumbnails']; ?>" alt="<?php echo $image['alt']; ?>" />
						                </a>
<!-- 						                <p><?php echo $image['caption']; ?></p> -->
						            </div>
						        <?php endforeach; ?>

						<?php endif; ?>
							
		
									
					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>