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
			</div>
	</div>

<?php
	wp_reset_postdata();
	get_footer();
?>