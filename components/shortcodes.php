<?php function baner( $atts = null, $content = null ) {
  $str = '</div><div class="img appear animated">'.do_shortcode($content).'</div><div class="block appear animated">';
  return $str;
}
add_shortcode('full-width', 'baner'); ?>