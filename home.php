<?php
	global $gPageName;
	$gPageName = "main";
	get_header();
?>
    <div id="wrapper-main">
		<?php
			$num = 0;
			$custom_query = 'posts_query';
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'category_name' => 'projects'
			);
			${$custom_query} = new WP_Query( $args );
			while ( ${$custom_query}->have_posts() ) : ${$custom_query}->the_post();
		?>
		<?php
			$photo = get_post_custom_values('thumbnail');
			$content = get_the_content('читать дальше');
		?>
			<div class="category-block c-block<?php echo ($num++ % 2) + 1;?>">
				<div class="block-content">
					<div class="item-image"><img src="<?php echo $photo[0]; ?>" alt="<?php the_title(); ?>"></div>
					<div class="item-header">
						<a href="<?php the_permalink(); ?>" class="item-header-text item-header-color"><?php the_title(); ?></a>
						<!--<span class="item-comments-text item-header-color">2</span>-->
						<a  href='<?php the_permalink(); ?>#kament_comments' class="item-comments-text item-header-color">0</a>
						<i class="item-comments-img"></i>
						<a  href='<?php the_permalink(); ?>' class="item-likes-text item-header-color">5</a>
						<!--<span class="item-likes-text item-header-color">5</span>-->
						<i class="item-likes-img"></i>
					</div>
					
					<div class="item-content item-text-color">
						<?php echo $content; ?>
					</div>
					
					<div class="item-share"><a href="#" class="item-text-color">поделиться</a></div>
				</div>
			</div>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
		<div id="wrapper-clear"></div>
	</div>
	<!-- KAMENT -->
	<script type="text/javascript">
		/* * * НАСТРОЙКА * * */
		var kament_subdomain = 'wptest';

		/* * * НЕ МЕНЯЙТЕ НИЧЕГО НИЖЕ ЭТОЙ СТРОКИ * * */
		(function () {
			var node = document.createElement('script'); node.type = 'text/javascript'; node.async = true;
			node.src = 'http://' + kament_subdomain + '.svkament.ru/js/counter.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(node);
		}());
	</script>
	<noscript>Для отображения комментариев нужно включить Javascript</noscript>
	<!-- /KAMENT -->
	
	<script type="text/javascript">
		$( document ).ready(function(){
			var $window = $(window);
			var $nav = $("#navigation");
			var $header = $("#header");
			var $delta = 0;
			
			$window.scroll(function(){
				var $top = $nav.offset().top;
				var $scrollTop = $window.scrollTop();
			//return;
				if (!$nav.hasClass("fixed") && ($scrollTop - $delta > $top)) {
					$nav.addClass("fixed").data("top", $top);
					$header.addClass("hide");
					//console.log("1: "+ ($window.scrollTop() - $delta) + " " + $top);
				}
				else if ($nav.hasClass("fixed") && ($scrollTop < $nav.data("top"))) {
					//console.log("2: " + ($window.scrollTop()) + " " + $nav.data("top"));
					$nav.removeClass("fixed");
					$header.removeClass("hide");
				}
			});
		});
	</script>
<?php get_footer(); ?>