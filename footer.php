<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		<div id="buffer"></div>
		<footer>
			<div id="social">
				<a href="https://vk.com/" target="_blank" class="social-icon vk"></a>
				<a href="https://facebook.com/" target="_blank" class="social-icon facebook"></a>
				<a href="http://ok.ru/" target="_blank" class="social-icon ok"></a>
				<a href="https://twitter.com" target="_blank" class="social-icon twitter"></a>
			</div>
		</footer>
		<script type="text/javascript">
			$( document ).ready(function(){
				var sql = '<?php echo get_num_queries();?>';
				var time = '<?php echo timer_stop(0, 6);?>';
				console.log('time = ' + time + '; sql = ' + sql);
				time = time.replace(',', '.');
				document.title = parseFloat(time).toFixed(2) + '; ' + sql + '';
			});
		</script>
	</body>
</html>