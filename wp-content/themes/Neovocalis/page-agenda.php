<?php
/**
 * Template Name: Agenda
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
	<div id="primary" class="site-content medium-12 columns">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php the_content(); ?>
						<h3 style="color:#666;border-bottom:1px dotted #ddd;">Upcoming Agenda</h3> 
						<?php

						$event0 = current_time('Ymd');
						$args = array(
						    'post_type' => 'agenda',
							'post_status' => 'publish',
							'posts_per_page' => '10',
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
            echo '<ul>';
						if ( !empty( $loop->posts ) ) {
						  while ( $loop->have_posts() ) : $loop->the_post();
							?><li class="event-list"><h3><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php $date = DateTime::createFromFormat('Ymd', get_field('date'));
								  echo $date->format('m/d/Y');?></a></h3>
								  <?php the_excerpt(); ?></li>
							<?php				
							endwhile; 
							echo '</ul><br><br>';
						} else {
							echo 'No upcoming events.<br><br><br><br><br><br>';
						}
						
						?>						
						<h3 style="color:#666;border-bottom:1px dotted #ddd;">Past Agenda</h3> 
						<?php
						$event1 = current_time('Ymd');
						$args = array(
						    'post_type' => 'agenda',
							'post_status' => 'publish',
							'posts_per_page' => '10',
							'meta_query' => array(
								array(
									'key' => 'date',
									'compare' => '<=',
									'value' => $event1,
									)
									),
							'meta_key' => 'date',
							'orderby' => 'meta_value',
							'order' => 'DESC',
							'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
						);						
						
						$loop = new WP_Query( $args );
						echo '<ul>';
						while ( $loop->have_posts() ) : $loop->the_post();
							?><li class="event-list"><h3><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php $date = DateTime::createFromFormat('Ymd', get_field('date'));
								  echo $date->format('m/d/Y');?></a></h3>
								  <?php the_excerpt(); ?></li>
							<?php				
							endwhile; 
						echo '</ul>';
						?>						
					</div>

				</article>


			<?php endwhile; ?>

		</div>
	</div>
</div>
<?php get_footer(); ?>