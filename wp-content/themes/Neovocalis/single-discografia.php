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
						<h1><a href="/discografia/">Discografía:</a> <?php print the_title(); ?></h1>
					</div>	
				</div>	
			</div>	
			<div id="content">

				<div id="inner-content" class="row">
					<?php $cover = get_field('cd_cover');  ?>
            <div class="large-4 left">
              <img src="<?php echo $cover['sizes']['medium']; ?>" alt="<?php echo $cover['alt']; ?>" />
            </div>
          <div id="main" class="large-8 columns first" role="main">
			
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
									
					</div> <!-- end #main -->	
          
          <div class="large-12 columns">
          <?php if( have_rows('mp3_upload') ): ?>
          	<ul>
          	<?php 
          		while( have_rows('mp3_upload') ): 
          		the_row(); 
          		// vars
          		$mp3 = get_sub_field('mp3');
          		$title = get_sub_field('mp3_title');
          		?>
          		<li class="audio">
          			<?php if($title): ?>
          			<div class="caption">
          				<div class="mp3-title"><?php echo $title; ?></div>	
          			</div>	
          			<?php endif; ?>
                <audio class="mp3" controls="controls">  
                  <source src="<?php print $mp3; ?>" />  
                </audio>
          		</li>
          	<?php endwhile; ?>
          	<?php endif; ?>
          	</ul>           
          </div>  
          
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>