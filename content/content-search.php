
<?php $post_type = get_post_type();
      $post_id = get_the_id();
?>


<?php switch( $post_type ) {

    case "person":
      person_type_display($post_id);
      ?>
     
    <?php break;
    case "projects":
      project_type_display($post_id);
    ?>

      <?php break;
    case "post":
      ?>
      <article class="searchPostSingle">
        <picture class="searchImgContainer">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="postIMG" src="wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } 
        echo( "<p class='content-type'>".$post_type."</p>");?>
        </picture>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php the_excerpt();?>
      </div>
    </article>

    <?php break;
    case "attachment":?>
       <article class="searchPostSingle">
        <picture class="searchImgContainer">
        <?php if ( wp_attachment_is_image($post_id) ) { ?>
          <img class="postIMG" src="<?php echo(wp_get_attachment_image_src($post_id, null, false)[0]);?>" alt="<?php the_title(); ?>" />
        <?php } else { ?>
        <img class="postIMG" src="wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } 
        echo( "<p class='content-type'>".$post_type."</p>");?>
        </picture>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php the_excerpt();?>
      </div>
    </article>
    

    <?php break;
    default:
    
    ?>
    
        <article class="searchPostSingle">
        <picture class="searchImgContainer">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="postIMG" src="wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php 
           echo( "<p class='content-type'>".$post_type."</p>");
          } 
        ?>
        </picture>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
    </article>
<?php }
?>