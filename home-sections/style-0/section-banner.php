<?php
   // section banner
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_0_hide',0));
   $content_model   = absint(alchem_option('section_0_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_0_id')));
   $section_title   = wp_kses(alchem_option('section_0_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_0_sub_title'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_0_button_text'));
   $button_link     = esc_attr(alchem_option('section_0_button_link'));
   $button_target   = esc_attr(alchem_option('section_0_button_target'),'_blank');
   $content_align   = esc_attr(alchem_option('section_0_content_align'),'right');
   $section_content = wp_kses(alchem_option('section_0_content'), $allowedposttags);
 ?>
 <?php if( $section_hide != '1' ):?>
<section class="section magee-section alchem-home-section-0 alchem-home-style-0" id="<?php echo $section_id;?>">

<?php if( $content_model == 2 ):?>
    <div class="magee-carousel multi-carousel home-banner-slider">
      <div class="multi-carousel-inner">
        <div id="carousel-banner-section" class="owl-carousel owl-theme">
          <?php for( $i=0; $i<5; $i++ ):?>
          <?php
	$active = '';
	if($i==0)
	$active = 'active';

	$display          = absint(alchem_option('section_0_display_'.$i));
	$image            = esc_url(alchem_option('section_0_image_'.$i));
	$title            = wp_kses(alchem_option('section_0_title_'.$i), $allowedposttags);
	$sub_title        = wp_kses(alchem_option('section_0_sub_title_'.$i), $allowedposttags);
	$btn_text    = wp_kses(alchem_option('section_0_btn_text_'.$i), $allowedposttags);
	$btn_link    = esc_url(alchem_option('section_0_btn_link_'.$i));
	$btn_target  = esc_attr(alchem_option('section_0_btn_target_'.$i));
	if($display == 1):
	?>
          <div class="item">
            <section  class="section magee-section section-banner fullheight verticalmiddle" style="background-image: url(<?php echo $image;?>);background-repeat:repeat;">
              <div class="section-content">
                <div class="container">
                  <div class="" id="">
                    <h1 class="magee-heading" id=""><span class="heading-inner"><?php echo do_shortcode($title);?></span></h1>
                  </div>
                  <p style="text-align:right;color: #fff"><?php echo do_shortcode($sub_title);?></p>
                  <div style="text-align:right"> <a href="<?php echo $btn_link;?>" target="<?php echo $btn_target;?>" class=" magee-btn-normal btn-md btn-line btn-light"><?php echo $btn_text;?></a></div>
                </div>
              </div>
            </section>
          </div>
           <?php endif;?>
          <?php endfor;?>
        </div>
      </div>
    </div>
    <?php else:?>
  <div class="section-content container">
   <?php if( $content_model == 0 ):?>
    <div class="">
      <h1 class="magee-heading" style="text-align:<?php echo $content_align;?>;font-size: 70px;font-weight: 400;margin-top: 0;margin-bottom: 30px;color: #fff;"><span class="heading-inner"><?php echo do_shortcode($section_title);?></span></h1>
    </div>
    <p style="text-align:<?php echo $content_align;?>;color: #fff"><?php echo do_shortcode($sub_title);?></p>

    <?php if( $button_text != '' ){?>
    <div style="text-align:<?php echo $content_align;?>">
      <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class="magee-btn-normal btn-md btn-line btn-light" id=""><?php echo $button_text;?></a>
      </div>
      <?php }?>

      <?php else:?>
      <?php echo do_shortcode($section_content);?>
      <?php endif;?>

  </div>
  <?php endif;?>
</section>
 <?php endif;?>