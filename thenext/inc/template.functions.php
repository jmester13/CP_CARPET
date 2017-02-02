<?php
/**
 * Page title template
 * @since 1.0.0
 * @author Fox
 */
function zo_page_title(){
    global $smof_data, $zo_meta, $zo_base;

    /* page options */
    if(is_page() && isset($zo_meta->_zo_page_title) && $zo_meta->_zo_page_title){
        if(isset($zo_meta->_zo_page_title_type)){
            $smof_data['page_title_layout'] = $zo_meta->_zo_page_title_type;
        }
    }

    if($smof_data['page_title_layout']){
        $page_title_before = '<div id="page-title" class="page-title">
            <div class="container">
            <div class="row">';
        $page_title_after = '</div></div></div><!-- #page-title -->';
        ?>

            <?php switch ($smof_data['page_title_layout']){
                case '1':
                    ?>
                    <?php echo $page_title_before; ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo $page_title_after; ?>
                    <?php
                    break;
                case '2':
                    ?>
                    <?php echo $page_title_before; ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo $page_title_after; ?>
                    <?php          
                    break;
                case '3':
                    ?>
                    <?php echo $page_title_before; ?><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><?php echo $page_title_after; ?>
                    <?php
                    break;
                case '4':
                    ?>
                    <?php echo $page_title_before; ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo $page_title_after; ?>
                    <?php
                    break;
                case '5':
                    ?>
                    <?php echo $page_title_before; ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo $page_title_after; ?>
                    <?php
                    break;
                case '6':
                    ?>
                    <?php echo $page_title_before; ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo $page_title_after; ?>
                    <?php
                    break;
            } ?>

        <?php
    }
}

/**
 * Get sub page title.
 *
 * @author Fox
 */
function zo_page_sub_title(){
    global $zo_meta, $post;

    if(!empty($zo_meta->_zo_page_title_sub_text)){
        echo '<div class="page-sub-title">'.esc_attr($zo_meta->_zo_page_title_sub_text).'</div>';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo '<div class="page-sub-title">'.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'</div>';
    }
}

if (!function_exists('zo_logo')) {
    function zo_logo(){
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['main_logo']['url']) ? $smof_data['main_logo']['url'] : get_template_directory().'/assets/images/logo.png';
        if(isset($zo_meta->_zo_header) && $zo_meta->_zo_header){
            if(isset($zo_meta->_zo_header_logo) && !empty($zo_meta->_zo_header_logo) ){
                $logo = !empty($zo_meta->_zo_header_logo) ? wp_get_attachment_url($zo_meta->_zo_header_logo) : $logo;
            }
        }
        return $logo;
    }
}
if (!function_exists('zo_sticky_logo')) {
    function zo_sticky_logo(){
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['sticky_logo']['url']) ? $smof_data['sticky_logo']['url'] : get_template_directory().'/assets/images/logo-white.png';
        return $logo;
    }
}

/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function zo_header(){
    global $smof_data, $zo_meta;
    /* header for page */
    if(isset($zo_meta->_zo_header) && $zo_meta->_zo_header){
        if(isset($zo_meta->_zo_header_layout)){
            $smof_data['header_layout'] = $zo_meta->_zo_header_layout;           
        }
    }
    else $smof_data['header_layout'] = '';
    /* load template. old */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

/**
 * Get menu location ID.
 * 
 * @param string $option
 * @return NULL
 */
function zo_menu_location($option = '_zo_primary'){
    global $zo_meta;
    /* get menu id from page setting */
    return (isset($zo_meta->$option) && $zo_meta->$option) ? $zo_meta->$option : null ;
}

function zo_get_page_loading() {
    global $smof_data;
    
    if($smof_data['enable_page_loadding']){
        echo '<div id="zo-loadding">';
        switch ($smof_data['page_loadding_style']){
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add page class
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_page_class(){
    global $smof_data, $zo_meta;
    
    $page_class = '';
    /* check boxed layout */
    if($smof_data['body_layout']){
        $page_class = 'zo-page-boxed';
    } else {
        $page_class = 'zo-wide';
    }
	
	if (!empty($zo_meta->_zo_page_boxed)) {
        $page_class = 'zo-page-boxed ';
	}
    
    echo apply_filters('zo_page_class', $page_class);
}

/**
 * Add main class
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_main_class(){
    global $zo_meta;
    
    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($zo_meta->_zo_full_width) && $zo_meta->_zo_full_width){
        /* full width */
        $main_class = "no-container";
    } else {
        /* boxed */
        $main_class = "container";
    }
    
    echo apply_filters('zo_main_class', $main_class);
}

/**
 * Single detail
 *
 * @author Fox
 * @since 1.0.0
 */
function zo_single_detail(){
    
}

/**
 * Show post like.
 *
 * type-1: icon - count like
 * type-2: icon - count like - text like
 * type-3: count like - text likes
 * @since 1.0.0
 */
function zo_get_post_like_number () {
    $likes = get_post_meta(get_the_ID() , '_zo_post_likes', true);

    if(!$likes) $likes = 0;
    return $likes;
}
function zo_get_post_like($content=''){

    $likes = get_post_meta(get_the_ID() , '_zo_post_likes', true);

    if(!$likes) $likes = 0;

    ?>
    <a href="javascript:void(0)" class="zo-post-like" data-id="<?php the_ID(); ?>">
    <?php 
        switch ($content) {
            case 'type-1':
                echo '<i class="fa fa-thumbs-o-up"></i>';
                echo '<span>'.esc_attr($likes).'</span>';
                break;
            case 'type-2': 
                echo '<i class="fa fa-thumbs-o-up"></i>';
                echo '<span>'.esc_attr($likes).'</span>';
                _e(' Likes', 'thenext');
                break;
            default:
                echo '<span>'.esc_attr($likes).'</span>';
                _e(' Likes', 'thenext');
                break;
        }
    ?>
    </a>
<?php
}
/**
 * Count post view.
 *
 * @since 1.0.0
 */
function zo_set_count_view(){
    global $post;

    if(is_single() && !empty($post->ID) && !isset($_COOKIE['zo_post_view_'. $post->ID])){

        $views = get_post_meta($post->ID , '_zo_post_views', true);

        $views = $views ? $views : 0 ;

        $views++;

        update_post_meta($post->ID, '_zo_post_views' , $views);

        /* set cookie. */
        setcookie('zo_post_view_'. $post->ID, $post->ID, time() * 20, '/');
    }
}

add_action( 'wp', 'zo_set_count_view' );
/**
 * Show post like.
 *
 * type-1: icon - count like
 * type-2: icon - count like - text like
 * type-3: count like - text likes
 * @since 1.0.0
 */
function zo_get_count_view_number (){
    global $post;

    $views = get_post_meta($post->ID , '_zo_post_views', true);

    $views = $views ? $views : 0;
    return $views;
}
function zo_get_count_view($content='') {
    global $post;

    $views = get_post_meta($post->ID , '_zo_post_views', true);

    $views = $views ? $views : 0 ;?>
    <a href="javascript:void(0)" class="zo-post-view" data-id="<?php the_ID(); ?>">
    <?php 
        switch ($content) {
            case 'type-1':
                echo '<i class="fa fa-eye"></i>';
                echo '<span>'.esc_attr($likes).'</span>';
                break;
            case 'type-2': 
                echo '<i class="fa fa-eye"></i>"></i>';
                echo '<span>'.esc_attr($likes).'</span>';
                _e(' Likes', 'thenext');
                break;
            default:
                echo '<span>'.esc_attr($likes).'</span>';
                _e(' Likes', 'thenext');
                break;
        }
    ?>
    </a>
<?php }

/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_archive_detail(){
    ?>
    <ul>
        <li class="detail-date"> <?php echo get_the_date("M d, Y"); ?></li>
        <?php if(has_category()): ?>
            <li class="detail-terms"><?php the_terms( get_the_ID(), 'category', 'In ', ' / ' ); ?></li>
        <?php endif; ?>
        
        <li class="detail-like"><?php zo_get_post_like('type-3'); ?> </li>
        <li class="detail-comment"><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?> <?php _e('Comments', 'thenext'); ?></a></li>
    </ul>
    <?php
}
function zo_blog_calendar_detail(){
    ?>
    <div class="zo-blog-calendar-detail">
        <div class="detail-date"> 
            <div class="month-year"> <?php echo get_the_date("M Y"); ?></div>
            <div class="date"><?php echo get_the_date("d"); ?></div>
        </div>
        
        <div class="zo-separator-line-calendar-blog"></div>
        <div class="entry-author">
            <span><?php 
                _e('Post by ', 'thenext'); 
                the_author_posts_link(); 
            ?></span>
        </div>
        <div class="detail-view">
            <a href="javascript:void(0)" class="zo-post-view" data-id="<?php the_ID(); ?>">
                <?php 
                    echo '<span>'.esc_attr(zo_get_count_view_number ()).' </span>';
                    echo '<i class="fa fa-eye"></i>';
                ?>
            </a>
        </div>
        <div class="detail-like">
            <a href="javascript:void(0)" class="zo-post-like" data-id="<?php the_ID(); ?>">
                <?php 
                    echo '<span>'.esc_attr(zo_get_post_like_number()).' </span>';
                    echo '<i class="fa fa-thumbs-o-up"></i>';
                 ?> 
            </a>
        </div>
        <div class="detail-comment">
            <a href="<?php the_permalink(); ?>">
                <?php echo '<span>'.comments_number('0','1','%').'</span>'; ?> 
                <i class="fa fa-comment-o"></i>
            </a>
        </div>
    </div>
    <?php
}

/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_archive_readmore(){
    echo '<a class="btn btn-readmore" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.__('Read more', 'thenext').'</a>';
}
function zo_archive_readmore_nobutton(){
    echo '<a class="read-more-text" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.__('Read more', 'thenext').'</a>';
}

/**
 * Media Audio.
 * 
 * @param string $before
 * @param string $after
 */
function zo_archive_audio() {
	global $zo_base;
    /* get shortcode audio. */
    $shortcode = $zo_base->getShortcodeFromContent('audio', get_the_content());
    
    if($shortcode != ''){
        echo do_shortcode($shortcode);
        
        return true;
        
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        
        return false;
    }
    
}

/**
 * Media Video.
 *
 * @param string $before
 * @param string $after
 */
function zo_archive_video() {
    
    global $wp_embed, $zo_base;
    /* Get Local Video */
    $local_video = $zo_base->getShortcodeFromContent('video', get_the_content());
    
    /* Get Youtobe or Vimeo */
    $remote_video = $zo_base->getShortcodeFromContent('embed', get_the_content());
    
    if($local_video){
        /* view local. */
        echo do_shortcode($local_video);
        
        return true;
        
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        echo $wp_embed->run_shortcode($remote_video);
        
        return true;
        
    } elseif (has_post_thumbnail()) {
        /* view thumbnail. */
        the_post_thumbnail();
    } else {
        return false;
    }
    
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_archive_gallery(){
	global $zo_base;
    /* get shortcode gallery. */
    $shortcode = $zo_base->getShortcodeFromContent('gallery', get_the_content());
    
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
        
        if(!empty($ids)){
        
            $array_id = explode(",", $ids[1]);
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>
        			<?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):?>
        				<div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                    		<img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                    	</div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        		    <span class="fa fa-angle-left"></span>
        		</a>
        		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        		    <span class="fa fa-angle-right"></span>
        		</a>
        	</div>
            <?php
            
            return true;
        
        } else {
			?>
				<div class="no-image">
					<img src="<?php echo get_template_directory_uri().'/assets/images/sample.png';?>" alt="<?php _e('Thumb', 'thenext');?>" />
				</div>
			<?php
            return true;
        }
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
    }
}

/**
 * Quote Text.
 * 
 * @author Fox
 * @since 1.0.0
 */
function zo_archive_quote() {
    /* get text. */
    preg_match_all('/\<blockquote\>(.*?)\<\/blockquote\>/ms', apply_filters( 'the_content', get_the_content() ), $blockquote);

    if(!empty($blockquote[1][0])){
        echo ''.$blockquote[1][0].'';
        return true;
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        return false;
    }
}
function zo_is_archive_quote() {
    /* get text. */
    preg_match_all('/\<blockquote\>(.*?)\<\/blockquote\>/ms', apply_filters( 'the_content', get_the_content() ), $blockquote);

    if(!empty($blockquote[1][0])){
        return true;
    } else {
        return false;
    }
}

/**
 * Get icon from post format.
 * 
 * @return multitype:string Ambigous <string, mixed>
 * @author Fox
 * @since 1.0.0
 */
function zo_archive_post_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>__('STANDARD', 'thenext'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = __('GALLERY', 'thenext');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = __('LINK', 'thenext');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = __('QUOTE', 'thenext');
            break;
        case 'video':
            $post_icon['icon'] = 'fa  fa-youtube-play';
            $post_icon['text'] = __('VIDEO', 'thenext');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = __('AUDIO', 'thenext');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = __('STANDARD', 'thenext');
            break;
    }
    echo '<i class="'.$post_icon['icon'].'"></i>';
}

/**
 * Get social share link
 *
 * @return string
 * @author Zacky
 * @since 1.0.0
 */

 function zo_social_share() {
     ?>
     <ul class="social-list">
         <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
         <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
         <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
         <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
     </ul>
    <?php
 }
function zo_masonry_loadmore(){
    $paged = ( $_POST['startPage']) ? $_POST['startPage'] : 1; 
    $zo_masonry =  $_POST['zo_data'];
    $args = array(
        'orderby' => $zo_masonry['orderby'],
        'order' => $zo_masonry['order'],
        'paged' => $paged,
        'posts_per_page' => $zo_masonry['posts_per_page'],
        'post_type' => $zo_masonry['post_type'],
    );
    $posts = new WP_Query($args);
    $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
    $taxo = 'category';
    while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
    wp_reset_postdata();   
    ?>
    <!-- get template  -->
        <div class=" <?php echo esc_attr($zo_masonry['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                    <?php get_template_part('single-templates/grid-style2/content',get_post_format()); ?>
        </div>
    <?php 
    }   
    die();
}

add_action('wp_ajax_zo_masonry_loadmore', 'zo_masonry_loadmore');
add_action('wp_ajax_nopriv_zo_masonry_loadmore', 'zo_masonry_loadmore');
function zo_after_loadmore(){
?>
 <div class="zo_items_loadmore"></div>
 <div class="zo_pagination"></div>
<?php    
}
function zo_before_loadmore($zo_loadmore){
    // Call Script
    wp_enqueue_script('mediaelement');
    wp_enqueue_style('mediaelement');
    wp_register_script( 'zo-load-more-js', get_template_directory_uri().'/assets/js/zo_loadmore.js', array('jquery') ,'1.0',true);
    $atts = $zo_loadmore['atts'];
    $layout = ($atts['layout']=='masonry') ? 'masonry' : 'basic';
    $adminajax = admin_url('admin-ajax.php'); 
    if($atts['layout']=='masonry'){
        $zo_masonry = $zo_loadmore['posts'];
        $zo_masonry['item_class'] = $atts['item_class'];
    }
    else {
      $zo_masonry = '';  
    }
    wp_localize_script(
            'zo-load-more-js',
            'zo_more_obj',
            array(
                'startPage' => $atts['paged'],
                'maxPages' =>$atts['max_num_pages'],
                'total' => $atts['found_posts'],
                'perpage' => $atts['post_count'],
                'nextLink' => next_posts($atts['max_num_pages'], false),
                'ajaxType' => 'Button',
                'masonry' => $layout,
                'ajaxurl' =>$adminajax,
                'zo_masory' =>$zo_masonry,
            )
    );
    wp_enqueue_script( 'zo-load-more-js'); 
}

/*Function limit words*/
function zo_limit_words($string, $word_limit) {
    $words = explode(' ', strip_tags($string), ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
    }
    return apply_filters('the_excerpt', implode(' ', $words));
}
function zo_limit_word_for_excerpt($string, $word_limit) {
    $words = explode(' ', strip_tags($string), ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
        array_push($words, "etc..");
    }
    return apply_filters('the_excerpt', implode(' ', $words));
}



function zo_before_loadmore_refresh($zo_loadmore){
    // Call Script
    wp_enqueue_script('mediaelement');
    wp_enqueue_style('mediaelement');
    wp_register_script( 'masonry-load-more-js', get_template_directory_uri().'/assets/js/zo_masonry_loadmore.js', array('jquery') ,'1.0',true);
    $atts = $zo_loadmore['atts'];
    $layout = ($atts['layout']=='masonry') ? 'masonry' : 'basic';
    $adminajax = admin_url('admin-ajax.php'); 
    if($atts['layout']=='masonry'){
        $zo_masonry = $zo_loadmore['posts'];
        $zo_masonry['item_class'] = $atts['item_class'];
        $zo_masonry['html_id'] = $atts['html_id'];
        $zo_masonry['post_id'] = $atts['post_id'];
        $zo_masonry['masonry_option'] = $atts['masonry_option'];
        $zo_masonry['id_cat_filter'] = $atts['id_cat_filter'];
    }
    else {
      $zo_masonry = '';  
    }
    wp_localize_script(
            'masonry-load-more-js',
            'zo_more_obj',
            array(
                'startPage' => $atts['paged'],
                'maxPages' =>$atts['max_num_pages'],
                'total' => $atts['found_posts'],
                'perpage' => $atts['post_count'],
                'nextLink' => next_posts($atts['max_num_pages'], false),
                'ajaxType' => 'Button',
                'masonry' => $layout,
                'ajaxurl' =>$adminajax,
                'zo_masory' =>$zo_masonry,
                'admin' => current_user_can( 'manage_options' )
            )
    );
    wp_enqueue_script( 'masonry-load-more-js'); 
}
function zo_masonry_loadmore_refresh(){
    $paged = ( $_POST['startPage']) ? $_POST['startPage'] : 1; 
    $zo_masonry =  $_POST['zo_data'];
    $tax_query = '';
    $tax_query['relation'] = 'OR';
    $tax_query[] =  $zo_masonry["tax_query"];
    $args = array(
        'orderby' => $zo_masonry['orderby'],
        'paged' => $paged,
        'posts_per_page' => $zo_masonry['posts_per_page'],
        'post_type' => $zo_masonry['post_type'],
        'tax_query' => $tax_query,
    );
    $posts = new WP_Query($args);
    $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
    $taxo = 'portfolio-category';
    $i = ((int)$paged-1) * $zo_masonry['posts_per_page'];
    while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
    wp_reset_postdata();   
     
    $size = zo_masonry_size($zo_masonry['post_id'] , $zo_masonry['html_id'], $i);
    ?>
    <!-- get template  -->
        <div class="zo-masonry-item item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>"
                     data-groups='[<?php echo implode(',', $groups);?>]' data-index="<?php echo esc_attr($i); ?>" data-id="<?php echo esc_attr($zo_masonry['post_id']); ?>">
                <?php get_template_part('single-templates/portfolio/content','masonry-hasprettyphoto'); ?>
            </div>
    <?php 
    $i++;
    } 
    
    die();
}

add_action('wp_ajax_zo_masonry_loadmore_refresh', 'zo_masonry_loadmore_refresh');
add_action('wp_ajax_nopriv_zo_masonry_loadmore_refresh', 'zo_masonry_loadmore_refresh');