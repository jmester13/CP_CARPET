<?php
add_action('widgets_init', 'zo_recent_post_widgets');

function zo_recent_post_widgets() {
    register_widget('ZO_Recent_Post_Widget_V2');
}

class ZO_Recent_Post_Widget_V2 extends WP_Widget {

    function ZO_Recent_Post_Widget_V2() {
        parent::__construct(
                'zo_recent_post_v2', __('ZO Recent Posts','thenext'), array('description' => __('Recent Posts Widget.', 'thenext'),)
        );
    }

    function widget($args, $instance) {
        
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'thenext' ) : $instance['title'], $instance, $this->id_base);
        $show_date = (int) $instance['show_date'];
        $show_decs = (int) $instance['show_decs'];
        $show_img = (int) $instance['show_img'];
        $thumb_height = (int) $instance['thumb_height'];
        $thumb_width = (int) $instance['thumb_width'];
        $default_img =  $instance['default_img'];
        $number = (int) $instance['number'];

      //  echo balanceTags($before_widget);

       
        $sticky = get_option('sticky_posts');
        $args = array(
            'posts_per_page' => $number,
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in'  => $sticky,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => 1
        );

        $wp_query = new WP_Query($args);
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";
        
        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
           
        }
        echo balanceTags($before_widget);
        if($title) {
            echo balanceTags($before_title.$title.$after_title);
        }
       
    
        ?>
      <?php if ($wp_query->have_posts()){ ?>
                <div class="zo-recent-post">
                    <ul class="zo-recent-post-wrapper">
                        <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <li>
                                <?php  
                                if ($show_img== true) {
                                 ?>
                                 <div class="zo-recent-media">  
                                   <div class="image">
                                       <a class="post-featured-img" href="<?php the_permalink(); ?>">
                                       <?php   
                                            if(has_post_thumbnail()){
                                                $attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full', false ); 
                                                $image_url =  zo_image_resize($attachment_image[0], $thumb_width, $thumb_height, true, true,true); 
                                            }
                                            else {
                                                $image_url =  $default_img; 
                                            }
                                            ?>
                                           <img alt="<?php get_the_title() ?>" width="<?php echo esc_attr($thumb_width);?>" height="<?php echo esc_attr($thumb_height);?>" class="attachment-featuredImageCropped" src="<?php echo esc_attr($image_url)  ?>"/>
                                       </a>
                                    </div> <!--end media-->    
                                 </div>
                                <?php } ?> 
                                <div class="zo-recent-details <?php if($show_img == false) {echo 'no-image';} ?> ">
                                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php if ($show_date) { ?>
                                    <div class="date">  
                                    <span><?php echo get_the_date('M d, Y'); ?></span>
                                    </div>
                                    <?php }?>   
                                    <?php if ($show_decs) { ?>
                                        <div class="description"><?php echo zo_limit_words( strip_tags( get_the_excerpt() ),10)."..."; ?></div>
                                    <?php  } ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php } else { ?>
                <span class="notfound">No post found!</span>
            <?php
            }
        echo ''.$after_widget;
        wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['thumb_width'] = (int) $new_instance['thumb_width'];
        $instance['thumb_height'] = (int) $new_instance['thumb_height'];
        $instance['show_img'] =  $new_instance['show_img'];
        $instance['extra_class'] = $new_instance['extra_class'];
        $instance['default_img'] = $new_instance['default_img'];

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $default_img = isset($instance['default_img']) ? esc_attr($instance['default_img']) : get_template_directory_uri().'/assets/images/sample.png';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        $show_img = isset($instance['show_img']) ? esc_attr($instance['show_img']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] ) {
            $number = 5;
        }
        if ( !isset($instance['thumb_height']) || !$thumb_height = (int) $instance['thumb_height'] ) {
             $thumb_height = 62  ;    
        }
         if ( !isset($instance['thumb_width']) || !$thumb_width = (int) $instance['thumb_width'] ) {
             $thumb_width = 82;    
        }
              
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php _e( 'Title:', 'thenext' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('show_date'); ?>"><?php _e( 'Show date:', 'thenext' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_date') ); ?>" <?php if($show_date!='') echo 'checked="checked";' ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('show_decs'); ?>"><?php _e( 'Show Description:', 'thenext' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_decs') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_decs') ); ?>" <?php if($show_decs!='') echo 'checked="checked";' ?> type="checkbox" value="1" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('show_img'); ?>"><?php _e( 'Show images:', 'thenext' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_img') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_img') ); ?>" <?php if($show_img!='') echo 'checked="checked";' ?> type="checkbox" value="1" />
        </p>
         <p>
            <label for="<?php echo ''.$this->get_field_id('thumb_width'); ?>"><?php _e( 'Width of thumbnail:', 'thenext' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('thumb_width') ); ?>" name="<?php echo esc_attr( $this->get_field_name('thumb_width') ); ?>" type="text" value="<?php echo esc_attr( $thumb_width ); ?>" size="3" />
             
        </p>
        <p>
           <label for="<?php echo ''.$this->get_field_id('thumb_height'); ?>"><?php _e( 'Height of thumbnail:', 'thenext' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('thumb_height') ); ?>" name="<?php echo esc_attr( $this->get_field_name('thumb_height') ); ?>" type="text" value="<?php echo esc_attr( $thumb_height ); ?>" size="3" />
        </p>
        <p>
           <label for="<?php echo ''.$this->get_field_id('default_img'); ?>"><?php _e( 'Default of thumbnail:', 'thenext' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('default_img') ); ?>" name="<?php echo esc_attr( $this->get_field_name('default_img') ); ?>" type="text" value="<?php echo esc_attr( $default_img ); ?>"  />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('number'); ?>"><?php _e( 'Number of products to show:', 'thenext' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('extra_class'); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id('extra_class'); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <?php
    }
}
?>