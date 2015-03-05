<?php
	global $gPageName;
	$gPageName = "single-author";
	get_header();
	/*echo '<pre>';
	print_r($post);
	echo '<pre>';*/
	$img = get_post_meta($post->ID, 'photo', true);
	
	$projects = $wpdb->get_results(
		$wpdb->prepare('SELECT ID 
			FROM wp_posts
			JOIN wp_postmeta ON wp_posts.ID = wp_postmeta.post_id
			WHERE meta_key =  %s
			AND meta_value = %s',
			'authors', $post->ID
		)
	);
	//print_r($projects);
?>
	<div id="wrapper" class="wrapper-about">
		<div class="about-left">
			<div class="about-img">
				<img src="<?php echo $img;?>" alt="photo">
			</div>
		</div>
		<div class="about-right">
			<div class="about-text">
				<h1><?php echo $post->post_title;?></h1>
				<?php echo $post->post_content;?>
			</div>
			<div class="about-projects">
			<?php
				if (count($projects) > 0) echo 'Проекты:<br />';

				echo '<div class="about-projects-item">';
				foreach ($projects as $project)
				{
					//$pro = get_post($project->ID);
					$img = get_post_meta($project->ID, 'thumbnail', true);
					$post = get_post($project->ID);
					//print_r($post);
					echo '<a href="' . home_url() . '/' . $project->ID . '" title="' . $post->post_title . '">' .
						'<img src="' . $img . '" alt="' . $post->post_title . '"></a>';
				}
				echo "</div>";
			?>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('.about-projects-item').jScrollPane();
		});
	</script>

<?php
	wp_reset_postdata();
	get_footer();
?>