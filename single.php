<?php

  $post = $wp_query->post;
  if (in_category('authors')) {
      include(TEMPLATEPATH.'/single-author.php');
  } elseif (in_category('projects')) {
      include(TEMPLATEPATH.'/single-project.php');
  } 
  else{
      include(TEMPLATEPATH.'/single_default.php');
  }
?>