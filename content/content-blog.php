
<article class="homePostSingle">
  <!--gets the post id which will help get the thumbnail/image-->
  <?php $post_id = get_the_ID();
  $person_link = GetBlogAuthDirectoryLink($post_id);?>
  <div class="homePostIMG"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'object-fit_cover' ) );?></a></div>
  <div class="homePostText">
    <li><a class="homePagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <li><span class="homePostDate"><?php echo get_the_date( 'F j, Y', $post_id )?></span>&nbsp;/<span class="homePostAuthor"><?php the_author_posts_link(); ?></span>
      <?php if($person_link) : ?>
        <span><a href="<?php echo($person_link);?>"><i class="fa fa-user" aria-hidden="true"></i></a></span>
        <?php endif; ?>
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
    <?php 
    $x = strlen(get_the_excerpt());
    if ($x && $x > 0) {
      the_excerpt();
    } else {
      $text = get_post_meta($post_id)['flexible_content_0_content'][0]; 
      echo '<p>'.wp_trim_words($text, 50, '...').'</p>';
    } ?>
  </div>
</article>
<hr class="homePostLine">