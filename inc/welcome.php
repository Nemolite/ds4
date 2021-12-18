<?php
/**
 * Приветствие и Объявления
 */
add_action('init', 'ds4_welcome');
function ds4_welcome(){
	$labels = array(
		'name'               => 'Приветствие и Объявления', 
		'singular_name'      => 'Приветствие и Объявления', 
		'add_new'            => 'Добавить Приветствие и Объявления',
		'add_new_item'       => 'Добавить новое Приветствие и Объявления',
		'edit_item'          => 'Редактировать Приветствие и Объявления',
		'new_item'           => 'Новое Приветствие и Объявления',
		'view_item'          => 'Посмотреть Приветствие и Объявления',
		'search_items'       => 'Найти Приветствие и Объявления',
		'not_found'          => 'Приветствие и Объявления не найдено',
		'not_found_in_trash' => 'В корзине Приветствие и Объявления не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Приветствие и Объявления'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor')
	);	
	register_post_type('welcome', $args  );
}

add_action('ds4_infoblock_welcome','ds4_infoblock_welcome_output');
function ds4_infoblock_welcome_output() {
    
    $args = array(   
        'post_type'    => 'welcome',
        'posts_per_page' => 1,           
    );
    
    $query = new WP_Query( $args ); 
    if( $query->have_posts() ){
        while( $query->have_posts() ){
            $query->the_post();        
            echo get_the_content();           
       
        }
        wp_reset_postdata();
    } 
}    
   
?>