@php

$all = get_field('county_map_all_county', 'option');
$chatham = get_field('county_map_chatham_county', 'option');
$durham = get_field('county_map_durham_county', 'option');
$orange = get_field('county_map_orange_county', 'option');
$wake = get_field('county_map_wake_county', 'option');
@endphp

<div class="county-map">
  <div class="container">
    <div class="js-accordion" data-accordion-prefix-classes="my-prefix" data-accordion-multiselectable="none">
      <div class="js-accordion__panel" data-accordion-opened="true">
        <h2 class="js-accordion__header">{{ __('North Carolina', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--all">
          <div class="percentage">{{ $all['percentage'] }}<sup>%</sup></div>
          <div class="mb-4">{{ $all['text'] }}</div>
          <div class="amount">$<span class="h1">{{ $all['amount'] }}</span>M</div>
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Chatham County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--chatham">
          <div class="bg-cover" style="background-image: url('<?= $chatham['background_image']['sizes']['medium']; ?>')"></div>
          <div class="percentage">{{ $chatham['percentage'] }}<sup>%</sup></div>
          <div class="mb-4">{{ $chatham['text'] }}</div>
          <div class="amount">$<span class="h1">{{ $chatham['amount'] }}</span>M</div>
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Durham County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--durham">
          <div class="bg-cover" style="background-image: url('<?= $durham['background_image']['sizes']['medium']; ?>')"></div>
          <div class="percentage">{{ $durham['percentage'] }}<sup>%</sup></div>
          <div class="mb-4">{{ $durham['text'] }}</div>
          <div class="amount">$<span class="h1">{{ $durham['amount'] }}</span>M</div>
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Orange County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--orange">
          <div class="bg-cover" style="background-image: url('<?= $orange['background_image']['sizes']['medium']; ?>')"></div>
          <div class="percentage">{{ $orange['percentage'] }}<sup>%</sup></div>
          <div class="mb-4">{{ $orange['text'] }}</div>
          <div class="amount">$<span class="h1">{{ $orange['amount'] }}</span>M</div>
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Wake County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--wake">
          <div class="bg-cover" style="background-image: url('<?= $wake['background_image']['sizes']['medium']; ?>')"></div>
          <div class="percentage">{{ $wake['percentage'] }}<sup>%</sup></div>
          <div class="mb-4">{{ $wake['text'] }}</div>
          <div class="amount">$<span class="h1">{{ $wake['amount'] }}</span>M</div>
        </div>
      </div>
    </div>
    <div class="js-map">
      @svg('images/north-carolina-county-map')
    </div>
  </div>
</div>
