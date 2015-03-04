<?php
	global $gPageName;
	$gPageName = "authors";
	get_header();
?>
<section>
    <div id="wrapper">
	<?php
		$num = 0;
		$custom_query = 'posts_query';
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'category_name' => $gPageName
		);
		${$custom_query} = new WP_Query( $args );
		/*global $wp_query;
		print_r($wp_query);*/
		while ( ${$custom_query}->have_posts() ) : ${$custom_query}->the_post();
	?>
	<?php
		$photo = get_post_custom_values('photo');
		$content = get_the_content('читать дальше');
	?>
		<div class="category-block c-block<?php echo ($num++ % 2) + 1;?>">
			<div class="block-content">
				<div class="item-about-image"><img src="<?php echo $photo[0]; ?>" alt="<?php the_title(); ?>"></div>
				<div class="item-about-content item-text-color">
					<div class="item-about-header">
						<a href="<?php the_permalink(); ?>" class="item-about-header-text item-header-color"><?php the_title(); ?></a>
					</div>
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	<?php
		endwhile;
		wp_reset_postdata();
	?>
		<div id="wrapper-clear"></div>
	</div>
</section>
<?php get_footer(); ?>