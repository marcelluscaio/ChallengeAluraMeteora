<?php
//getting highlighted products
$posts = get_posts(array(
    'numberposts'   => 9, 
    'post_type'     => 'cm_produtos',
    'meta_key'      => 'is_highlight',
    'meta_value'    => true
));

get_template_part( 'Template_parts/General/produtos', '', array('posts' => $posts))
?>