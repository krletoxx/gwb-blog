<?php
    
   /* 
    * Helper function to return the theme option value. If no value has been saved, it returns $default.
    * Needed because options are saved as serialized strings.
    */

    if ( !function_exists( 'of_get_option' ) )
    {
        function of_get_option($name, $default = false)
        {
            
            $optionsframework_settings = get_option('optionsframework');
            
            // Gets the unique option id
            $option_name = $optionsframework_settings['id'];
            
            if ( get_option($option_name) )
            {
                $options = get_option($option_name);
            }
                
            if ( isset($options[$name]) )
            {
                return $options[$name];
            }
            else
            {
                return $default;
            }
        }
    }

    // Making theme translation ready
    load_theme_textdomain('skoon', get_template_directory() . '/languages');

    add_action('after_setup_theme', 'skoon_setup');

    function skoon_setup(){
        load_theme_textdomain('skoon', get_template_directory() . '/languages');
    }

    // Declare WP Menus
    if (function_exists('register_nav_menus'))
    {
      register_nav_menus(array(
         'main_nav' =>  __('Main Navigation Menu', 'skoon')
      ));
    }
    
    if (function_exists('register_nav_menus'))
    {
      register_nav_menus(array(
         'footer_nav' =>  __('Footer Navigation Menu', 'skoon')
      ));
    }

    // Adding post thumbnail support
    if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
   
    if ( function_exists( 'add_image_size' ) )
    {
      add_image_size( 'feat-large', 680 );
      add_image_size( 'feat-small', 500 );
      add_image_size( 'large-post', 430 );
      add_image_size( 'normal-post', 325 );
      add_image_size( 'small-post', 220 );
    }

    // Tag cloud
    add_filter('widget_tag_cloud_args','set_number_tags');
    function set_number_tags($args)
    {
        $args = array('number' => 22,
            'unit' => 'px',
            'smallest' => 14,
            'largest' => 14
        );
        return $args;
    }

    // Create Custom Excerpts
    function mola_excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).' ...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return $excerpt;
    }

    // Load CSS files
    function mola_styles_load ()  
    {
        if ( !is_admin() )
        {
            
            wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', '', '1.2'); 
            wp_enqueue_style('style');
            
            wp_register_style('media-queries', get_template_directory_uri() . '/css/media-queries.css', '', '1'); 
            wp_enqueue_style('media-queries');
            
            ?>
            
            <!--[if lt IE 9]>
                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css">
            <![endif]-->
            
            <?php
            
        }   
    }  
    add_action( 'wp_enqueue_scripts', 'mola_styles_load' );

    // Load javascript files
    function mola_scripts_load ()
    {
        if ( !is_admin() )
        {
            
            wp_enqueue_script('jquery');

            if ( is_singular() ) wp_enqueue_script('comment-reply');
            
            wp_register_script('menu', get_template_directory_uri() . '/js/menu.js', '', '1.4.8', true);
            wp_enqueue_script('menu');

            wp_register_script('sticky-menu', get_template_directory_uri() . '/js/sticky-menu.js', '', '1', true);
            wp_enqueue_script('sticky-menu');

            wp_register_script('jcarousellite', get_template_directory_uri() . '/js/jcarousellite.js', '', '1.8.5', true);
            wp_enqueue_script('jcarousellite');

            wp_register_script('easing', get_template_directory_uri() . '/js/easing.js', '', '1.3', true);
            wp_enqueue_script('easing');

            wp_register_script('socialite', get_template_directory_uri() . '/js/socialite.js', '', '2', true);
            wp_enqueue_script('socialite');
            
            wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', '', '1', true);
            wp_enqueue_script('custom');
            
        }
    }
    add_action('wp_enqueue_scripts', 'mola_scripts_load');

    // add ie conditional html5 shim to header
    function add_ie8_support ()
    {
        if ( !is_admin() )
        {
           echo '<!--[if lt IE 9]>';
           echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
           echo '<![endif]-->';
        }
    }
    add_action('wp_head', 'add_ie8_support');

    // Content width
    if ( ! isset( $content_width ) ) $content_width = 680;

    // Enable custom post formats
    add_theme_support('post-formats', array('video','audio','gallery'));

    add_theme_support('automatic-feed-links');
    
    // Remove WordPress Version Number
    remove_action('wp_head', 'wp_generator');

    // Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => __('Sidebar Widgets', 'skoon'),
            'id'   => 'sidebar-widgets',
            'description'   => __('These are widgets for the sidebar.', 'skoon'),
            'before_widget' => '<div id="%1$s" class="widget %2$s group">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="special-heading"><h2>',
            'after_title'   => '</h2></div>'
        ));
    }

    // Declare footer widget zone
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => __('Medium Footer Widgets', 'skoon'),
            'id'   => 'medium-widgets',
            'description'   => __('Use only two widgets here.', 'skoon'),
            'before_widget' => '<div id="%1$s" class="widget medium-widget %2$s group">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h2>',
            'after_title'   => '</h2></div>'
        ));
    }

    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => __('Large Footer Widget', 'skoon'),
            'id'   => 'large-widget',
            'description'   => __('Use only one widget here.', 'skoon'),
            'before_widget' => '<div id="%1$s" class="widget large-widget %2$s group">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title"><h2>',
            'after_title'   => '</h2></div>'
        ));
    }

    // About author links
    function mola_author_contact( $contactmethods ) {

        unset( $contactmethods[ 'aim' ] );
        unset( $contactmethods[ 'yim' ] );
        unset( $contactmethods[ 'jabber' ] );
     
        $contactmethods[ 'twitter' ] = 'Twitter';
        $contactmethods[ 'facebook' ] = 'Facebook';
        $contactmethods[ 'pinterest' ] = 'Pinterest';
        $contactmethods[ 'google' ] = 'Google Plus';
        $contactmethods[ 'dribbble' ] = 'Dribbble';
     
        return $contactmethods;
    }
    add_filter( 'user_contactmethods', 'mola_author_contact' );

    // Hide pages from search results
    if ( !is_admin() ) {

        function mola_search_filter($query) {
            if ($query->is_search) {
                $query->set('post_type', 'post');
            }
            return $query;
        }
        add_filter('pre_get_posts', 'mola_search_filter');

    }

    // Comments callback function
    function mola_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-body group" id="comment-<?php comment_ID(); ?>">
                
            <?php echo get_avatar($comment,$size='60',$default='' ); ?>
           
            <div class="comment-author"><?php printf(__('%s', 'skoon'), get_comment_author_link()) ?></div>
            <div class="comment-date"><?php printf(__('%1$s', 'skoon'), get_comment_date()) ?></div>
           
            <div class="comment-text">
           
                <?php comment_text() ?>
            
                <?php if ($comment->comment_approved == '0') : ?>
                     <em class="awaiting-mod-txt"><?php _e('Your comment is awaiting moderation.', 'skoon'); ?></em>
                <?php endif; ?>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
           
            </div>
         
        </div>
<?php
   }

   include 'lib/plugins/functions.php';
   
   include 'lib/widgets/video-widget.php';
   include 'lib/widgets/facebook-widget.php';
   include 'lib/widgets/popular-posts.php';
   include 'lib/widgets/social-widget.php';
   include 'lib/options/options-panel.php';