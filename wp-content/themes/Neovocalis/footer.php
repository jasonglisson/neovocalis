					<div class="footer-wrap">
						<footer class="footer" role="contentinfo">
							<div id="inner-footer" class="row">
								<div class="large-4 medium-4 columns">
									<nav role="navigation">
				    					<?php joints_footer_links(); ?>
				    				</nav>
		    					</div>
		    					<div class="large-4 medium-4 columns fb-like">
			    					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fneovocalis&amp;width=292&amp;height=62&amp;colorscheme=dark&amp;show_faces=false&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=270997929592089" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:62px;" allowtransparency="true"></iframe>
		    					</div>
		    					<div class="large-4 medium-4 columns">
			    					<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-footer.png">
		    					</div>
								<div class="large-12 medium-12 columns">
									<p class="source-org copyright">&copy; 2003-<?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
								</div>
							</div> <!-- end #inner-footer -->
						</footer> <!-- end .footer -->
					</div>
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<!-- all js scripts are loaded in library/joints.php -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->