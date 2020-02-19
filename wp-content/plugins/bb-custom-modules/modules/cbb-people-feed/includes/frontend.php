<?php if ($people = $module->query_people($settings)) : ?>
  <div class="people">
    <?php foreach ($people as $person) : ?>
      <div class="person">
        <div class="person__image">
          <?php if (has_post_thumbnail($person)) : ?>
            <?php echo get_the_post_thumbnail($person, 'staff-headshot'); ?>
          <?php else : ?>
            <img src="<?php echo CBB_MODULES_URL . 'assets/images/placeholder-staff.jpg'; ?>" alt="Photo coming soon." />
          <?php endif; ?>
        </div>
        <div class="details">
          <?php if (get_field('about', $person)) : ?>
          <a class="a11y-link-wrap" href="<?= get_the_permalink($person); ?>">
            <div class="details__name"><?= $person->post_title; ?></div>
          </a>
          <?php else : ?>
            <div class="details__name"><?= $person->post_title; ?></div>
          <?php endif; ?>
          <?php if (have_rows('job_titles', $person)) : while (have_rows('job_titles', $person)) : the_row(); ?>
            <div class="details__title"><?= get_sub_field('job_title', $person); ?></div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php else : ?>
  <span><?= __( 'No people found in this category.', 'cbb' ); ?></span>
<?php endif; ?>
