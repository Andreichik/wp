<?php
	global $gPageName;
	$gPageName = "single-project";
	get_header();
	/*echo '<pre>';
	print_r($post);
	echo '<pre>';*/
	$img = get_post_meta($post->ID, 'photo');
	$authors = get_post_meta($post->ID, 'authors');
	//print_r($authorId);
?>
<script type="text/javascript">
	var interval;
	function hide_pluso() {
		var plus = $('.pluso-more');
		//console.log(plus.length);
		if (plus.length > 0)
		{
			plus.hide();
			$('#share-button').show();
			clearInterval(interval);
		}
	}
	$( document ).ready(function(){
		interval = setInterval(hide_pluso, 100);
	});
</script>
	
	<div id="wrapper">
		<div class="project-left">
			<h1><?php echo $post->post_title;?></h1>
			<div class="fotorama" data-width="900" data-height="500" data-allowfullscreen="true">
			<?php
				foreach ($img as $image)
				{
					echo '<img src="' . $image . '">';
				}
			?>
			</div>
			<!--<input type="button" value="скрыть" onclick="hide_hc();">-->
			<!-- KAMENT -->
			<div id="kament_comments"></div>
			<script type="text/javascript">
				/* * * НАСТРОЙКА * * */
				var kament_subdomain = 'wptest';

				/* * * НЕ МЕНЯЙТЕ НИЧЕГО НИЖЕ ЭТОЙ СТРОКИ * * */
				(function() {
					var node = document.createElement('script'); node.type = 'text/javascript'; node.async = true;
					node.src = 'http://' + kament_subdomain + '.svkament.ru/js/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(node);
				})();
			</script>
			<noscript>Для отображения комментариев нужно включить Javascript</noscript>
			<!-- /KAMENT -->
		</div>
		<div class="project-right">
			<div class="project-author">
				<h2>Авторы</h2>
				<ul>
				<?php
					foreach ($authors as $id)
					{
						$author = get_post($id);
						echo '<li><a href="' . home_url() . '/' . $id . '">' . $author->post_title . '</a></li>';
					}
				?>
				</ul>
			</div>
			<div class="project-info">
				<h2>о Проекте</h2>
				<?php echo $post->post_content;?>
			</div>
			<script type="text/javascript">(function() {
			  if (window.pluso)if (typeof window.pluso.start == "function") return;
			  if (window.ifpluso==undefined) { window.ifpluso = 1;
				var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
				s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
				s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
				var h=d[g]('body')[0];
				h.appendChild(s);
			  }})();
			</script>
			<div id="share-button" style="display: none;" class="pluso" data-background="none;" data-options="small,square,line,horizontal,nocounter,sepcounter=1,theme=14" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
		</div>
	</div>
<?php
	wp_reset_postdata();
	get_footer();
?>