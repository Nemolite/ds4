<?php
/**
 * Дочерняя тема для темы awaken  
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

/**
* Подключение скриптов и стилей
*/
function ds4_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'ds4-style', get_stylesheet_directory_uri() .'/assets/css/ds4.css' );
	wp_enqueue_script( 'ds4-script', get_stylesheet_directory_uri() . '/assets/js/ds4.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'ds4_scripts_style' );

/**
* Возврат раздела виджетов в классический вид
*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Корректировка слайдера (Рукводитель и важные банеры)
 */
require 'inc/slider.php';

/**
 * Корректировка слайдера (Рукводитель и важные банеры)
 */
require 'inc/baners.php';

/**
 * Приветствие и объявления
 */
require 'inc/welcome.php';

/**
 * Блок руководителя ,важных банеров и основные документы
 */
require 'inc/chif.php';

/**
 * Банер госуслуги
 */
require 'inc/gosuslugi.php';

/**	
 * Для главных банеров в сайтбаре ниже руководителя
 */

function ds4_register_top_sidebar_widgets(){
	register_sidebar( array(
		'name' => 'Главные банеры',
		'id' => 'top-sidebar-banners',
		'description' => 'Банеры под фотографией руководиеля',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'ds4_register_top_sidebar_widgets' );

/**	
 * Для меню Сведения об ОО
 */
function ds4_register_main_menu_sidebar_widgets(){
	register_sidebar( array(
		'name' => 'Сведения об ОО',
		'id' => 'main-menu-sidebar',
		'description' => 'Сведения об образовательной организации',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'ds4_register_main_menu_sidebar_widgets' );

/**
 * Блок документов 
 */
require 'inc/docblock.php';

if ( ! function_exists( 'ds15_theme_menu' ) ) {
	function ds15_theme_menu( ){
		register_nav_menus(
			array(	
				'top_sidebar_menu' => esc_html__( 'Главное меню в сайтбаое', 'ds4' ),
				'left_doc_menu' => esc_html__( 'Документы (левое)', 'ds4' ),
				'right_doc_menu' => esc_html__( 'Документы (правое)', 'ds4' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'ds15_theme_menu' );

/**
 * Левое
 */
function ds4_register_left_doc_menu_widgets(){
	register_sidebar( array(
		'name' => 'Документы (левое)',
		'id' => 'left-doc',
		'description' => 'Документы (левое)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'ds4_register_left_doc_menu_widgets' );

/**
 * Правое
 */
function ds4_register_right_doc_menu_widgets(){
	register_sidebar( array(
		'name' => 'Документы (правое)',
		'id' => 'right-doc',
		'description' => 'Документы (правое)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widget-title"><span class="title-wrapper">',
		'after_title' => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'ds4_register_right_doc_menu_widgets' );

/**
 * Яндекс карта
 */
add_action('ds4_yandex_map','ds4_yandex_map_output');
function ds4_yandex_map_output(){
	if(is_front_page()){
		?>
		<div class="yandex-map">
		<header class="page-entry-header">
			<h1 class="page-entry-title entry-title">Мы на карте</h1>	</header>
		<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4baf23b2e893b9c3e75070d86effc5f2114ad2e288aed4f3ba50f81b6e7c91a2&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>	
		</div>
		<?
	}
}
?>