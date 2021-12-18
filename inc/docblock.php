<?php
/**
 * Блок документоа
 */
add_action('ds4_docblock','ds4_docblock_output');
function ds4_docblock_output(){
    ?>
    <div class="docblock-left">
        <?php dynamic_sidebar( 'left-doc' ); ?> 
    </div>
    <div class="docblock-right">
        <?php dynamic_sidebar( 'right-doc' ); ?>    
    </div>
    <?
}
?>