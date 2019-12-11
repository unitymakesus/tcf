<?php
namespace App;
/**
 * Temp shortcode for impact area figure cards.
 */
add_shortcode('impact-area-figures', function($atts) {
  $impact_areas = [
    'environmental-conservation' => 'Environmental Conservation',
    'education'                  => 'Education',
    'regional-cultural-arts'     => 'Regional Cultural Arts',
    'community-development'      => 'Community Development',
    'capacity-building'          => 'Capacity Building',
  ];


  ob_start();
  ?>
  <section class="impact-figures">
    <?php foreach ($impact_areas as $area => $title) : ?>
      <?php
        $icon_path = "images/icons/icon-{$area}-white.svg";
        $img_path = "images/impact-areas/impact-area-{$area}.jpg";
      ?>
      <figure class="figure-<?= $area; ?>">
        <div class="cover" style="background-image:url(<?= asset_path($img_path); ?>);"></div>
        <div class="title">
          <a href="#" class="h4">
            <?= $title; ?>
          </a>
        </div>
        <img src="<?= asset_path($icon_path); ?>" alt="" />
      </figure>
    <?php endforeach; ?>
  </section>
  <?php
  return ob_get_clean();
});