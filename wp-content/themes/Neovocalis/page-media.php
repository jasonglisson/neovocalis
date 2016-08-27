<?php
/**
 * Template Name: Media
 */

get_header(); ?>
<div class="title-wrap">
	<div class="row">
		<div class="large-12 columns">
			<h1><?php print the_title(); ?></h1>
		</div>	
	</div>	
</div>	
<div class="row">
  <div class="gallery-wrap">						
  	<div class="row">
  	  <div class="galeria large-12 columns">
  		  <h2>Galerías</h2>
          <?php $args = array( 'post_type' => 'galeria', 'order' => 'ASC', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();?>
            <div class="member-list large-4 columns">
              <a class="blog-title" href="<?php the_permalink(); ?>"><?php// the_title(); ?>
                <div class="blog-date"><?php// the_date(); ?></div>
        					<?php $rows = get_field('galeria'); // get all the rows
        						//print_r($rows);
        					$rand_row = $rows[ array_rand( $rows ) ]; // get the first row
        					$rand_row_image = $rand_row['image']; // get the sub field value 
        					?>	
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $rows[0]['sizes']['large-thumbnails']; ?>"/>
                  </a>																
                </div>
            <?php endwhile; ?>					    
            </div>    		
  	    <div class="videos large-12 columns">
    	    <br>
  			  <h2>Videos</h2>
  	    </div> 
  	  </div>     	
  	</div>  
  </div>	
</div>
<?php get_footer(); ?>