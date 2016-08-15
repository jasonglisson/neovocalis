<?php
/*
Template Name: Homepage
*/
?>


<?php get_header(); ?>
			
			<div id="content">

				<div class="slider">
					
					<?php if( have_rows('carousel') ): ?>
					
						<ul class="slides">
					
						<?php while( have_rows('carousel') ): the_row(); 
					
							// vars
							$image = get_sub_field('carousel_image');
							$content = get_sub_field('carousel_caption');
					
							?>
					
							<li class="slide">
					
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" style="height:350px;"/>
					
							    <span class="slide-caption"><?php echo $content; ?></span>
					
							</li>
					
						<?php endwhile; ?>
					
						</ul>
					
					<?php endif; ?>		
								
				</div>	
				<div class="home-text-wrap">
					<div class="row">
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); 
					endwhile; 
					wp_reset_postdata();	?>
					</div>	
				</div>	
				<div id="inner-content">
					<div id="main" class="row" role="main">	
						<div class="agenda large-4 columns">
							<h2 class="heading">Agenda</h2>
						<?php

						$event0 = current_time('Ymd');
						$args = array(
						    'post_type' => 'agenda',
							'post_status' => 'publish',
							'posts_per_page' => '2',
							'meta_query' => array(
								array(
									'key' => 'date',
									'compare' => '>=',
									'value' => $event0,
									)
									),
							'meta_key' => 'date',
							'orderby' => 'meta_value',
							'order' => 'DESC',
							'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
						);						
						
						$loop = new WP_Query( $args );
						if ( !empty( $loop->posts ) ) {
							while ( $loop->have_posts() ) : $loop->the_post();?>
						    <div class="blog-post-wrap">
						    	<div class="blog-post">
							    	<a class="blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="blog-date"> <?php $agendaDate = get_field('date', $loop->posts->ID); $d = DateTime::createFromFormat('Ymd', $agendaDate); print $d->format('d/m/Y');?></div>										
                    <div class="blog-base-share">
										  <a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank"><i class="fi-social-facebook large"></i></a>
                      <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fi-social-twitter large"></i></a>
                    </div>	
                  </div>
                  <hr>
                </div>															  
							<?php				
							endwhile; 
							echo '</ul><br><br>';
						} else {
							echo 'No upcoming events.<br><br><br><br><br><br>';
						}
						
						?>							
						</div>	
						<div class="news large-4 columns">
							<h2 class="heading">News</h2>
							<?php 
								$this_post = $post->ID;
							    $args = array( 'post_type' => 'news', 'posts_per_page' => 2 );
							    $loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
							    <div class="blog-post-wrap">
							    	<div class="blog-post">
								    	<a class="blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<div class="blog-date"> <?php the_date(); ?></div>									
										<hr>
										<div class="blog-base-share">
											<a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank"><i class="fi-social-facebook large"></i></a>
											<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fi-social-twitter large"></i></a>
										</div>	
									</div>
							    </div>	
							<?php endwhile; ?>
						</div>
						<div class="facebook large-4 columns">
							<h2 class="heading">Facebook</h2>
							facebook feed goes here
						</div>																		
	    			</div> <!-- end #main -->
					    
				</div> <!-- end #inner-content -->
				<div class="gallery-wrap">						
					<div class="row">
					    <div class="galeria large-6 columns">
						    <h2>Galería</h2>
						<?php $args = array( 'post_type' => 'galeria', 'order' => 'ASC', 'posts_per_page' => 6 );
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
				                     <img src="<?php echo $rows[0]['sizes']['thumbnail']; ?>"/>
				                </a>																
							</div>
						<?php endwhile; ?>					    
					    </div>    		
	
					    <div class="videos large-6 columns">
							<h2>Videos</h2>
					    </div>    	
					</div>    
				</div>	   
			</div> <!-- end #content -->

<?php get_footer(); ?>