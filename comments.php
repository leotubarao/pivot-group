<?php comment_form(); ?>
<ul class="ltco_comments list-unstyled">
  <?php
    wp_list_comments( array(
      'style'         => 'ul',
      'short_ping'    => true,
      'avatar_size'   => '42',
    ) );
  ?>
</ul><!-- .comment-list -->
