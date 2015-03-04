<?php
	global $gPageName;
	$gPageName = "main";
	get_header();
?>
    <div id="wrapper-main">
			<div class="category-block c-block1">
				<div class="block-content">
					<div class="item-image"><img src="<?php echo get_template_directory_uri(); ?>/images/tmp/category_bg.png" alt="img 1"></div>
					<div class="item-header">
						<a href="project.html" class="item-header-text item-header-color">Двухкомнатные квартиры</a>
						<span class="item-comments-text item-header-color">2</span>
						<a href="#" class="item-comments-img"></a>
						<span class="item-likes-text item-header-color">5</span>
						<a href="#" class="item-likes-img"></a>
					</div>
					
					<div class="item-content item-text-color">
						Проект двухкомнатной квартиры, расположенной по адресу...
						<a href="project.html" class="item-text-color">читать дальше</a>
					</div>
					
					<div class="item-share"><a href="#" class="item-text-color">поделиться</a></div>
				</div>
			</div>
			<div class="category-block c-block2">
				<div class="block-content">
					<div class="item-image"><img src="<?php echo get_template_directory_uri(); ?>/images/tmp/category_bg.png" alt="img 1"></div>
					<div class="item-header">
						<a href="project.html" class="item-header-text item-header-color">Трёххкомнатные квартиры</a>
						<span class="item-comments-text item-header-color">3</span>
						<a href="#" class="item-comments-img"></a>
						<span class="item-likes-text item-header-color">7</span>
						<a href="#" class="item-likes-img"></a>
					</div>
					
					<div class="item-content item-text-color">
						Проект двухкомнатной квартиры, расположенной по адресу...
						<a href="project.html" class="item-text-color">читать дальше</a>
					</div>
					
					<div class="item-share"><a href="#" class="item-text-color">поделиться</a></div>
				</div>
			</div>
			<div class="category-block c-block1">
				<div class="block-content">
					<div class="item-image"><img src="<?php echo get_template_directory_uri(); ?>/images/tmp/category_bg.png" alt="img 1"></div>
					<div class="item-header">
						<a href="project.html" class="item-header-text item-header-color">Однокомнатные квартиры</a>
						<span class="item-comments-text item-header-color">11</span>
						<a href="#" class="item-comments-img"></a>
						<span class="item-likes-text item-header-color">25</span>
						<a href="#" class="item-likes-img"></a>
					</div>
					
					<div class="item-content item-text-color">
						Проект двухкомнатной квартиры, расположенной по адресу...
						<a href="project.html" class="item-text-color">читать дальше</a>
					</div>
					
					<div class="item-share"><a href="#" class="item-text-color">поделиться</a></div>
				</div>
			</div>
		<div id="wrapper-clear"></div>
	</div>
	
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