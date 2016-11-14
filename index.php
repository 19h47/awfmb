<?php 

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();

$context['characters'] = range('a','z');
// $context['tags'] = get_tags( array('name__like' => $context['characters'], 'order' => 'ASC') );
$context['tags_link'] = get_tag_link( $tag->term_id );

$templates = array( 'index.twig' );
if ( is_home() ) {

	$args = array(
        'post_type' => 'post',
        'category' => -3
    );
    $context['posts'] = Timber::get_posts( $args );

	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );