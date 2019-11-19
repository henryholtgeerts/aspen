			<!-- footer -->
			<footer class="footer">

				<?php 
				$show_divider = get_theme_mod( 'show_footer_divider', '');
				if ($show_divider) {
					echo '<hr>';
				}
				?>

				<div class="footer-widgets">
					<div>
						<a href="https://github.com/henryholtgeerts">
							<i class="fab fa-github"></i>
						</a>
						<a href="https://twitter.com/henryholtgeerts">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="https://www.youtube.com/channel/UCDNS25MGIIvh8wG0iwLHGTw">
							<i class="fab fa-youtube"></i>
						</a>
					</div>
					<div>
						<a href="mailto:henryholtgeerts@gmail.com">henryholtgeerts@gmail.com</a> • 253.678.0193
					</div>
				</div>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /grid -->

		<?php wp_footer(); ?>

	</body>
</html>
