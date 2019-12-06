<?php
namespace App;
/**
 * Temp shortcode for impact area figure cards.
 */
add_shortcode('impact-area-figures', function($atts) {
  $impact_areas = [
    'environmental-conservation' => 'Environmental Conservation',
    'youth-education'            => 'Youth Education',
    'cultural-arts'              => 'Cultural Arts',
    'community-development'      => 'Community Development',
    'building-capacity'          => 'Building Capacity',
  ];


  ob_start();
  ?>
  <section class="impact-figures">
    <?php foreach ($impact_areas as $area => $title) : ?>
      <?php $icon_path = "images/icons/icon-{$area}-white.svg"; ?>
      <figure class="figure-<?= $area; ?>">
        <div>
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