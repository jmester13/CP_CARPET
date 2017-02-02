<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
global $smof_data, $zo_meta;
?>
        </div><!-- #main -->
			<footer id="<?php if (!empty($zo_meta->_zo_page_boxed)) {
                                echo 'zo-footer-boxed';
                            } ?>">
                <!-- <div id="scroll_to_top"><i class="fa fa-angle-up"></i></div> -->
                <?php if ($smof_data['enable_footer_top'] =='1'): ?>
                <div id="zo-footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar('sidebar-6'); ?></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar('sidebar-7'); ?></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><?php dynamic_sidebar('sidebar-8'); ?></div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php if ($smof_data['enable_footer_bottom'] =='1'): ?>
                <div id="zo-footer-bottom">
                     <div class="container">
                         <div class="row">
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-9'); ?></div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-10'); ?></div>
                         </div>
                     </div>
                </div>
                <?php endif;?>
			</footer><!-- #site-footer -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 984634353;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/984634353/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>