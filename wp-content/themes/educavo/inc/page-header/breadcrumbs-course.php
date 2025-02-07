<?php 
    global $educavo_option;
    $post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true);
    $banner_hide = get_post_meta(get_queried_object_id(), 'banner_hide', true);

    $header_width_meta = get_post_meta(get_the_ID(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($educavo_option['header-grid']) ? $educavo_option['header-grid'] : '';
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
    //Theme Option Chekcing
    

    if( 'show' == $banner_hide ||  $banner_hide == '' ){  
    $post_meta_data = $post_meta_data;
    } else {
        $post_meta_data = '';
    }

    $post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true);
    $content_banner = get_post_meta(get_the_ID(), 'content_banner', true); 
?>

<div class="rs-breadcrumbs  porfolio-details">

    <?php if($post_meta_data !=''){ ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($post_meta_data); ?>')">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
              <?php
              if (!is_singular('sfwd-lessons') && !is_singular('sfwd-topic') && !is_singular('sfwd-quiz')):
                $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                <?php if($post_meta_title != 'hide'){             
              ?>
              <h1 class="page-title">
                <?php if($content_banner !=''){
                    echo esc_html($content_banner);
                } else {
                    the_title();
                }
                ?>
              </h1>             
              <?php } 
                if(!empty($educavo_option['off_breadcrumb'])){
                    $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                    if($rs_breadcrumbs != 'hide'):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                    endif;
                }
                endif;
                
              ?>        
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php } elseif(!empty($educavo_option['course_banner_single']['url'])){ 
      $course_banner = $educavo_option['course_banner_single']['url'];?>
      <?php if(!empty($educavo_option['show_banner__course_single'])){?>
      <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $course_banner );?>')"> 
      <?php } else { ?>  
        <div class="breadcrumbs-single"> 
        <?php } ?>
          <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumbs-inner"> 
                    <?php 
                        if (!is_singular('sfwd-lessons') && !is_singular('sfwd-topic') && !is_singular('sfwd-quiz')):
                          $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                          <?php if($post_meta_title != 'hide'){             
                        ?>
                        <h1 class="page-title">
                          <?php if($content_banner !=''){
                              echo esc_html($content_banner);
                          } else {
                              the_title();
                          }
                          ?>
                        </h1>             
                        <?php } 
                          if(!empty($educavo_option['off_breadcrumb'])){
                              $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                              if($rs_breadcrumbs != 'hide'):        
                                  if(function_exists('bcn_display')){?>
                                      <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                  <?php } 
                              endif;
                          }
                          endif;
                    ?>
                  </div>
              </div>
            </div>
          </div>
      </div>
    <?php }
    else{
      ?>
        <div class="rs-breadcrumbs-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="breadcrumbs-inner">
                 <?php 
                 if (!is_singular('sfwd-lessons') && !is_singular('sfwd-topic') && !is_singular('sfwd-quiz')):
                 if(is_single()){ ?>
                       <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php } else{ ?>
                       <h1 class="page-title"><?php the_archive_title();?></h1>
                       <?php
                    }         
                    if(!empty($educavo_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide'):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                        endif;
                    }
                    endif;
                    ?>                 
                </div>
              </div>
            </div>
          </div>
      </div>
        <?php
      }
  ?>
</div>