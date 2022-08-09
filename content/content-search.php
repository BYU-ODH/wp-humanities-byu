
<?php $post_type = get_post_type();?>

<?php switch( $post_type ) {

    case "person":
      ?>
      <article class="searchPostSingle">
        <picture class="searchImgContainer">
          <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
          } else { ?>
          <img class="postIMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>">
          <?php } ?>
        </picture>
        <div class="homePostText">
          <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <div><i class="icon byu-icon-telephone"></i><a class= "pagePost" href="tel:+1<?php echo $f_phone;?>"><li class="icon-list"><?php the_field('phone');?></li></a></div>
          <div><i class="icon byu-icon-location"></i><li class="icon-list"><?php the_field('address');?></li></div>
          <div><i class="icon byu-icon-mail"></i><a class= "pagePost" href="mailto:<?php the_field('email');?>"><li class="icon-list"><?php the_field('email'); ?></li></a></div>
          <?php
					$all_terms = '';
					$all_terms .= get_the_term_list( $post->ID, 'personresearch', '', ', ', ', ' );
					if ( $all_terms ) {
					?>
						<i class="icon byu-icon-research"></i> Research Areas:
						<?php
						echo rtrim( $all_terms, ', ' );
						} // endif $all_terms
					?>
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
          ?>
          <picture class="searchImgContainer">
          <?php $src = ($field['guid']);
          echo "<img class='postIMG' src = $src >"; ?>
          </picture>
          <div class="homePostText">
            <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
            <?php $po = $pods->field( 'project_owner' );
            if($po) {
              $po = $po['post_title'];
            }
            else {
              $po = 'Owner not found';
            }?>
          <p>Project Owner: <?php print_r($po);?>
          </p>
        
      <?php $description = $pods ->field('project_description');
        echo wp_trim_words($description, 30, "...");?>
        
        </div>
        </article>

      <?php break;

    case "post":
      ?>
      <article class="searchPostSingle">
        <picture class="searchImgContainer">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'postIMG'));
        } else { ?>
        <img class="postIMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
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
        <img class="postIMG" src="http://localhost/odh/wp-content/uploads/humanitiesLogo.png" alt="<?php the_title(); ?>" />
        <?php } ?>
        </picture>
        <div class="homePostText">
        <a class="pagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
    </article>
<?php }
?>