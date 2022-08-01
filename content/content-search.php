<div> 
  <a  class="search-color" href ="<?php the_permalink();?>"><h1><?php the_title();?></h1></a>
<?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} else { ?>
<img src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
<?php } ?>



<?php //echo the_meta()["project_description"];?> 
</div>