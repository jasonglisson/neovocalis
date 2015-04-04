<?php
/*
Template Name: Internal Page
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
			
				    <div id="main" class="large-12 medium-12 columns" role="main">
					
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					    					
    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
