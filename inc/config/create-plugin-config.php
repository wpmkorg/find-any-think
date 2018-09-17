<?php
    
    // Regester CSS and JS File.
    add_action('wp_enqueue_scripts','createplugin_atf_our_plugin_style');

    function createplugin_atf_our_plugin_style(){
        
        // Our JS File
        wp_register_script( 'createplugin-script', CP_URL . 'js/createplugin.js', array('jquery'), '1.0');
        
        // Our JS File Register
    	wp_enqueue_script('createplugin-script');
        wp_localize_script( 'createplugin-script', 'CPfinder', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        
        // Our CSS File.
        wp_enqueue_style( 'createplugin-style', CP_URL . 'css/cp-frount-end.css' );
    }
    
    // Regester CSS and JS File.
    add_action('admin_head','createplugin_atf_admin_style');
    
    // Admin Css
    function createplugin_atf_admin_style(){
        // Our CSS File.
        wp_enqueue_style( 'createplugin-style', CP_URL . 'css/cp-frount-end.css' );
    }
    // Get Query of Post
    add_action( 'wp_ajax_nopriv_createplugin_atf_finder', 'createplugin_atf_finder' );
    add_action( 'wp_ajax_createplugin_atf_finder', 'createplugin_atf_finder' );
    
    // Regester Post Type / Name.
    add_action('init','createplugin_atf_reg_post');
    
    // Function Hold Coustomer Post.
    function createplugin_atf_reg_post() {
    
    $labels = array(
        'name' => __('Create Plugin - All Answer', 'createplugin_context'),
        'singular_name' => __('All Answer', 'createplugin_context'),
        'add_new' => __('Add New Answer', 'createplugin_context'),
        'add_new_item' => __('Create Plugin - Add New Answer', 'createplugin_context'),
        'edit_item' => __('Edit Answer Item', 'createplugin_context'),
        'new_item' => __('New Answer Item', 'createplugin_context'),
        'view_item' => __('View Answer Item', 'createplugin_context'),
        'search_items' => __('Search Answer Item', 'createplugin_context'),
        'not_found' => __('No Answer Items found', 'createplugin_context'),
        'not_found_in_trash' => __('No Answer Items found in Trash', 'createplugin_context'),
        'parent_item_colon' => '',
        'menu_name' => __('Create Plugin', 'createplugin_context')
    );
    $args = array(
        'label' => __('CP Finder', 'createplugin_context'),
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'menu_icon' => CP_URL . '/images/logo.png',
        'supports' => array( 'title', 'editor' ),
    );
    
    register_post_type( 'createplugin-post' , $args);
    }
    
    // Register Setting Page.
    add_action('admin_menu', 'createplugin_atf_setting_page');
    
    // Function For Register Menu Setting Page.
    function createplugin_atf_setting_page() {
    	add_submenu_page( 'edit.php?post_type=createplugin-post', 'Create Plugin Setting Page', 'Setting Page', 'manage_options', 'cp-search-setting', 'createplugin_atf_admin_setting_page' ); 
    }
    
    // Function Get Query.
    function createplugin_atf_finder() {
        
        //global $count_posts;
        if(isset($_POST['cpsearch']) && $_POST['cpsearch'] != ''){
            
            $cpsearch = $_POST['cpsearch'];
            $cpsearch = mysql_real_escape_string($cpsearch);
            $cppost = array( 'post_type' => 'createplugin-post', 's' => $cpsearch, 'posts_per_page' => 5);
            $cploop = new WP_Query( $cppost );
            
            echo "<ul>";
            while ( $cploop->have_posts() ) : $cploop->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </li>
                <?php
            endwhile;
            echo "</ul>";
        }
        
        $options = createplugin_atf_setting_page_option();
        $cpnoresult = $options['cpnoresult'];
        $cpcontact  = $options['cpcontact'];
        $cpcontactl = $options['cpcontactl'];
        if( $cploop->found_posts == 0 ){ ?>
            <div class="cp-no-result-founnd"><p><?php if (!empty($cpnoresult)){ _e( $cpnoresult , 'createplugin_context' ); }else{ _e('No Answer Found', 'createplugin_context'); } ?></p></div>
            <div class="cp-contect-us">
                <a href="<?php if (!empty($cpcontactl)){ _e( $cpcontactl , 'createplugin_context' ); }else{ _e('#', 'createplugin_context'); } ?>" target="_blank">
                    <?php if (!empty($ctcontact)){ _e( $ctcontact , 'createplugin_context' ); }else{ _e('Contact Us By E-mail', 'createplugin_context'); } ?>
                </a>
            </div>
        <?php
        }
        exit;
    }
    
    // Update Function.
    function createplugin_atf_setting_page_option() {
        return get_option('createplugin-post', array());
    }
?>