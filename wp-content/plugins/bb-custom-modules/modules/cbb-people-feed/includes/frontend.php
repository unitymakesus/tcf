<?php if ($people = $module->query_people($settings)) : ?>
  <div class="people">
    <?php foreach ($people as $person) : ?>
      <div class="person">
        <div class="person__image">
          <?= get_the_post_thumbnail($person, 'medium'); ?>
        </div>
        <div class="details">
          <a class="link-wrap" href="<?= get_the_permalink($person); ?>">
            <div class="details__name"><?= $person->post_title; ?></div>
          </a>
          <div class="details__title">Job Title</div>
          <div class="details__bio-link" aria-hidden="true"><?= __( 'Biography', 'cbb' ); ?></div>
        </div>
      </div>
    <?php endforeach; ?>

    <?php $i = 1; ?>
    <?php while ($i < 11) : ?>
      <div class="person">
        <div class="person__image">
          <img src="https://placehold.it/433x600" alt="" />
        </div>
        <div class="details">
          <div class="details__name">First Name Last Name</div>
          <div class="details__title">Job Title</div>
          <div class="details__bio-link" aria-hidden="true"><?= __( 'Biography', 'cbb' ); ?></div>
        </div>
      </div>
    <?php $i++; endwhile; ?>
  </div>
<?php else : ?>
  <span><?= __( 'No people posts found in this category.', 'cbb' ); ?></span>
<?php endif; ?>
