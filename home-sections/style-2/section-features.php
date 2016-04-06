<?php
//section features
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_4_hide',0));
   $content_model   = absint(alchem_option('section_4_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_4_id')));
   $section_color   = esc_attr(alchem_option('section_4_color'));
   $section_title   = wp_kses(alchem_option('section_4_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_4_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_4_content'), $allowedposttags);
   $image           = esc_url(alchem_option('section_4_image'));
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);

 ?>
 <?php if( $section_hide != '1' ):?>
  <section class="section magee-section alchem-home-section-4 alchem-home-style-2" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title"><?php echo $section_title;?></h2>
    <div class="section-subtitle"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 60px;"></div>
    <?php endif;?>

    <div class="row">
    <div class="col-md-8">
    <img src="<?php echo $image;?>" alt=''>
  </div>

    <div class=" col-md-4">
    <?php

	  for( $j=0;$j<6;$j++):

	  $feature_icon    =  esc_attr(alchem_option('section_4_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_attr(alchem_option('section_4_feature_image_'.$j));
	  $feature_title   =  esc_attr(alchem_option('section_4_feature_title_'.$j));
	  $feature_content =  wp_kses(alchem_option('section_4_feature_content_'.$j), $allowedposttags);
	  $link            =  esc_url(alchem_option('section_4_link_'.$j));
	  $target          =  esc_attr(alchem_option('section_4_target_'.$j));
	  if( $feature_icon !='' || $feature_image !='' || $feature_title!='' || $feature_content!='' ):
	  if( $link == "" )
	  $title = '<h3>'.$feature_title.'</h3>';
	  else
	  $title = '<a href="'.$link.'" target="'.$target.'"><h3>'.$feature_title.'</h3></a>';

	  $icon            = '';
	  if( $feature_image !='' )
	  $icon  = '<img class="feature-box-icon"  src="'.$feature_image.'" alt="" />';
	  else
	  $icon  = '<i class="feature-box-icon fa fa-'.$feature_icon.'" style="color: #2db5c2;"></i>';


	  ?>

      <div class="" id="">
  <div class="magee-feature-box style2" id="">
    <div class="icon-box  icon-circle" style="font-size: 30px;border-width: 1px;border-color: #2db5c2;"> <?php echo $icon;?></div>
    <?php echo $title;?>
    <div class="feature-content">
      <p><?php echo do_shortcode($feature_content);?></p>
      <a href="<?php echo $link;?>" target="<?php echo $target;?>" class="feature-link"></a></div>
  </div>
</div>
  <?php endif;?>
        <?php endfor;?>

</div>
    </div>

    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
 </div>
  </div>
</section>
<?php endif;?>