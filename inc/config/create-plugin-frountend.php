<?php

    add_action('wp_footer', 'createplugin_atf_forent_end');
        
    function createplugin_atf_forent_end(){ 
    
        $options = createplugin_atf_setting_page_option();
        $cptitle = $options['cpmaintext'];
        $cpplace = $options['cpplaceholder'];
        ?>
        <div class="cp_main">
            <h1 id="cp-loading-content"><?php  _e('Loading...', 'createplugin_context'); ?><div class="cp-close"><?php _e(' X ', 'createplugin_context'); ?></div></h1>
            <h1 id="cp-loaded-content"><?php if (!empty($cptitle)){ _e( $cptitle , 'createplugin_context' ); }else{ _e('Find Any Think Here', 'createplugin_context'); } ?><div class="cp-close"><?php _e(' X ', 'createplugin_context'); ?></div></h1>
            <input type="text" id="cpsearchqna" name="cpsearchqna" placeholder="<?php if (!empty($cpplace)){ _e( $cpplace , 'createplugin_context' ); }else{ _e('What you are looking for...', 'createplugin_context'); } ?>"/>
            <div id="cpresultqna" class="cp-found-result"></div>
        </div>
        <?php
    }

?>