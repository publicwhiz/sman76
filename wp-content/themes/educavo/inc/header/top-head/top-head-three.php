<?php
/* Top Header part for educavo Theme
*/
global $educavo_option;
$mobile_hide_topbar = (!empty($educavo_option['mobile_top_bar'])) ? 'mobile-hide-topbars' : '';
// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($educavo_option['show-top']) || ($rs_top_bar == 'show')){
       if( !empty($educavo_option['top-email']) || !empty($educavo_option['phone']) || !empty($educavo_option['show-social'])){?> 

          <div class="toolbar-area <?php echo esc_attr($mobile_hide_topbar);?>">
            <div class="container2 <?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-8">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                        

                        <?php if(!empty($educavo_option['top-email'])) { ?>
                        <li class="rs-contact-email">
                            <i class="glyph-icon educavoicon-email"></i>                  
                                  <a href="mailto:<?php echo esc_attr($educavo_option['top-email'])?>"><?php echo esc_html($educavo_option['top-email'])?></a>                   
                        </li>
                        <?php } ?>

                        <?php if(!empty($educavo_option['phone'])) { ?>
                        <li class="rs-contact-phone">
                          <i class="fa educavoicon-call"></i>                                      
                              <a href="tel:<?php echo esc_attr(str_replace(" ","",($educavo_option['phone'])))?>"> <?php echo esc_html($educavo_option['phone']); ?></a>                   
                        </li>
                        <?php } ?> 
                  </ul>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($educavo_option['show-social'])){
                        $top_social = $educavo_option['show-social']; 
                    
                          if($top_social == '1'){ 

                            if(!empty($educavo_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($educavo_option['facebook']);?>" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($educavo_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($educavo_option['twitter']);?> " target="_blank"><i class="fab ri-twitter-x-line"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($educavo_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['pinterest']);?> " target="_blank"><i class="fab fa-pinterest-p"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['linkedin']);?> " target="_blank"><i class="fab fa-linkedin"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['google'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['google']);?> " target="_blank"><i class="fab fa-google-plus-square"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['instagram']);?> " target="_blank"><i class="fab fa-instagram"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($educavo_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['vimeo']);?> " target="_blank"><i class="fab fa-vimeo"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['tumblr']);?> " target="_blank"><i class="fab fa-tumblr"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($educavo_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($educavo_option['youtube']);?> " target="_blank"><i class="fab fa-youtube"></i></a> </li>
                            <?php } ?>
                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>