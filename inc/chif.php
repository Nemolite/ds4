<?php
/**
 * Блок руководителя ,важных банеров и основные документы
 */
add_action('ds4_chif_block','ds4_chif_block_output');
function ds4_chif_block_output(){
    ?>
     <div class="ds4-chif">
        <h3>Заведующий МБДОУ Д/С №4 "Ладушки"</h3>
            <div class="ds4-chif-img">
                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/zav_dou.jpg" alt="Заведующий МБДОУ Д/С №4 Ладушки Якунина Ирина Вячеславовна ">
            </div>
        <h3>Якунина Ирина Вячеславовна</h3>                
    </div> <!-- .ds4-chif -->
    <div class="ds4-main-bahers">
        <?php dynamic_sidebar( 'top-sidebar-banners' ); ?>
    </div> 
    <div class="ds4-main-doc">
    <header class="page-entry-header">
			<h1 class="page-entry-title entry-title">Сведения об ОО</h1>	</header>
        <?php dynamic_sidebar( 'main-menu-sidebar' ); ?>    
    </div>  
    <?
}
?>