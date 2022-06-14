
<article class="homePostSingle">
  <!--gets the post id which will help get the thumbnail/image-->
  <?php $post_id = get_the_ID();?>
  <div class="homePostIMG"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'object-fit_cover' ) );?></a></div>
  <div class="homePostText">
    <li><a class="homePagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <li><span class="homePostDate"><?php echo get_the_date( 'F j, Y', $post_id )?></span>&nbsp;/<span class="homePostAuthor"><?php the_author_posts_link(); ?></span>
        <!--<a href="#" title="Visit in Directory"><i class="fa fa-user" aria-hidden="true"></i></a>-->
      <?php
        $post_categories = wp_get_post_categories( $post_id, array( 'fields' => 'all' ) );
        $cats = array();
        $cats_display = array();	
          if( $post_categories ){ // Always Check before loop!
            print("<div class='post_categories'>");
            foreach($post_categories as $c){
              $cats[] = array( 'name' => $c->name, 'slug' => $c->slug );
              $cats_display[] = sprintf("<a href=%s>%s</a>", esc_url( get_category_link( $c->term_id ) ), $c->name );
            }
            print(implode(", ", $cats_display));
            print("</div>"); 
            } ?>
    </li>
      <!-- // Display the Post Excerpt -->
    <li><?php the_excerpt(__('(more…)')); ?></li>
  </div>
</article>
<hr class="homePostLine">