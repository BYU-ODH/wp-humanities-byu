
<?php $post_type = get_post_type();?>

<?php switch( $post_type ) {

    case "person":
      ?>
      <article class="searchPostSingle">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="homePostIMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <a class= "pagePost" href="<?php the_permalink();?>"><li><?php the_field('phone');?></li></a>
        <a class= "pagePost" href="<?php the_permalink();?>"><li><?php the_field('email'); ?></li></a>
        <a class= "pagePost" href="<?php the_permalink();?>"><li><?php the_field('address');?></li></a>
        </div>
      </article>
   <?php break;

    case "collaborator":
      ?>
    <article class="searchPostSingle">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="post-IMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
    </article>
    <?php break;

    case "projects":
    ?>
      <article class="searchPostSingle">
        <?php 
          $pods = pods( 'projects' );
          $pods->fetch(get_the_id());
          $field = $pods->field( 'project_image' );
          $src = ($field['guid']);
          echo "<img class='postIMG' src = $src >";
          ?>
          <div class="homePostText">
            <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
          <p>Project Owner: <?php $project = $pods->field( 'project_owner' );
          $owner = ($project['post_title']);
          echo($owner);?>
          </p>
        
      <?php $description = $pods ->field('project_description');
        echo wp_trim_words($description, 30, "...");?>
        
        </div>
        </article>

      <?php break;

    case "post":
      ?>
      <article class="searchPostSingle">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="post-IMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php the_excerpt();?>
      </div>
    </article>
    <?php break;
    default:
    ?>
        <article class="searchPostSingle">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="post-IMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
    </article>
<?php }
?>