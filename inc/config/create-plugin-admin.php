<?php

    // Admin Setting Page
    function createplugin_atf_admin_setting_page(){
        
        $options = createplugin_atf_setting_page_option();
        
        if ($_POST['createpluginsubmit']) {
        
            $cpmaintext     = $_POST['cpmaintext'];
            $cpplaceholder  = $_POST['cpplaceholder'];
            $cpnoresult     = $_POST['cpnoresult'];
            $cpcontact      = $_POST['cpcontact'];
            $cpcontactl     = $_POST['cpcontactl'];
            
            $options['cpmaintext']      = $cpmaintext;
            $options['cpplaceholder']   = $cpplaceholder;
            $options['cpnoresult']      = $cpnoresult;
            $options['cpcontact']       = $cpcontact;
            $options['cpcontactl']      = $cpcontactl;
            
            update_option('createplugin-post', $options);        
        
        }
        
            $cpmaintext     = $options['cpmaintext'];
            $cpplaceholder  = $options['cpplaceholder']; 
            $cpnoresult     = $options['cpnoresult'];
            $cpcontact      = $options['cpcontact'];
            $cpcontactl     = $options['cpcontactl'];
            
            ?>
            
            <div class="cpadminmain">
                
                <div class="cpadminhead">
                    <div class="cpadminlogo">
                        <div class="cpadminicon cpsettingicon"></div>
                    </div>
                    <div class="cpadmintext">
                        <h1><?php echo get_admin_page_title(); ?></h1>
                    </div>
                </div>
                
                <div class="cpadmincontent">
                    <form action="" method="post" >
                        <table>
                            <tr>
                                <td><label for="cpmaintext"><?php _e('Display Heading Text on Front End', 'createplugin_context')?></label></td>
                                <td><input type="text" name="cpmaintext" value="<?php echo $cpmaintext; ?>" id="cpmaintext" placeholder="Write You Finder Title"/></td>
                                <td><small><?php _e('Default Text: Find Any Think Here', 'createplugin_context')?></small></td>
                            </tr>
                            
                            <tr>
                                <td><label for="cpplaceholder"><?php _e('Display Text in Search Box', 'createplugin_context')?></label></td>
                                <td><input type="text" name="cpplaceholder" value="<?php echo $cpplaceholder; ?>" id="cpplaceholder" placeholder="What you are looking for..."/></td>
                                <td><small><?php _e('Default Text: What you are looking for...', 'createplugin_context')?></small></td>
                            </tr>
                            
                            <tr>
                                <td><label for="cpnoresult"><?php _e('Display Massege If Result Not Found', 'createplugin_context')?></label></td>
                                <td><input type="text" name="cpnoresult" value="<?php echo $cpnoresult; ?>" id="cpnoresult" placeholder="No Result Found"/></td>
                                <td><small><?php _e('Default Text: No Result Found', 'createplugin_context')?></small></td>
                            </tr>
                            
                            <tr>
                                <td><label for="cpcontact"><?php _e('Display Massege for Contact Us', 'createplugin_context')?></label></td>
                                <td><input type="text" name="cpcontact" value="<?php echo $cpcontact; ?>" id="cpcontact" placeholder="Contact Us By E-mail"/></td>
                                <td><small><?php _e('Default Text: Contact Us By E-mail', 'createplugin_context')?></small></td>
                            </tr>
                            
                            <tr>
                                <td><label for="cpcontactl"><?php _e('Input Link of Contact Us Page', 'createplugin_context')?></label></td>
                                <td><input type="text" name="cpcontactl" value="<?php echo $cpcontactl; ?>" id="cpcontactl" placeholder="#"/></td>
                                <td><small><?php _e('Default Link: " # " (Input Link of Contact Page)', 'createplugin_context')?></small></td>
                            </tr>
                            
                            <tr>
                                <td><input type="submit" name="createpluginsubmit" value="<?php _e('Save Settings', 'createplugin_context')?>" class="button button-primary button-large"/></td>
                                <td><?php _e('<p>For more info / problam / Support to Contact Us at<br />info@createplugin.com</p>', 'createplugin_context')?></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
    <?php
        
    }

?>