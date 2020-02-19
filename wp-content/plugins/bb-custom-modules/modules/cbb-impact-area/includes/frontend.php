<?php
/**
 * Impact Area Card Module - Front End
 */
?>

<article class="impact-figure impact-figure--<?php echo $settings->color_palette; ?>">
  <figure>
    <?php if (!empty($settings->background_image_src)) : ?>
      <div class="bg-cover" style="background-image:url(<?php echo $settings->background_image_src; ?>);"></div>
    <?php endif; ?>
    <?php if (!empty($settings->title)) : ?>
      <div class="impact-figure__title">
        <a href="<?php echo esc_attr($settings->link); ?>" class="h4 a11y-link-wrap">
          <?php echo $settings->title; ?>
        </a>
      </div>
    <?php endif; ?>
    <img src="<?php echo esc_attr($settings->impact_icon_src); ?>" alt="" />
  </figure>
</article>
