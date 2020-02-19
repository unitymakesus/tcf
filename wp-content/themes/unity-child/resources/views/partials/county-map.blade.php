@php
  $all = get_field('county_map_all_county', 'option');
  $chatham = get_field('county_map_chatham_county', 'option');
  $durham = get_field('county_map_durham_county', 'option');
  $orange = get_field('county_map_orange_county', 'option');
  $wake = get_field('county_map_wake_county', 'option');
@endphp

<div class="county-map">
  <div class="container">
    <div class="js-map">
      {{ App\svg_image('north-carolina-county-map') }}
    </div>
    <div class="js-accordion" data-accordion-prefix-classes="tcf" data-accordion-multiselectable="none">
      <div class="js-accordion__panel" data-accordion-opened="true">
        <h2 class="js-accordion__header">{{ __('North Carolina', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--all">
          @if($all['data'])
            <div class="percentage">{{ $all['data'] }}</div>
          @endif
          @if($all['text'])
            <div class="mb-4">{{ $all['text'] }}</div>
          @endif
          @if($all['amount'])
            <div class="amount">
              <span aria-hidden="true">$</span>
              <span class="h1">{!! App\number_format_short($all['amount']) !!}</span>
              <span class="screen-reader-text"> dollars</span>
            </div>
          @endif
          @if($all['link'])
            <a href="{{ $all['link']['url'] }}" target="_blank">{{ $all['link']['title'] }}</a>
          @endif
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Chatham County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--chatham">
          <div class="bg-cover" style="background-image: url('<?= $chatham['background_image']['sizes']['medium']; ?>')"></div>
          @if($chatham['data'])
            <div class="percentage">{{ $chatham['data'] }}</div>
          @endif
          @if($chatham['text'])
            <div class="mb-4">{{ $chatham['text'] }}</div>
          @endif
          @if($chatham['amount'])
            <div class="amount">
              <span aria-hidden="true">$</span>
              <span class="h1">{!! App\number_format_short($chatham['amount']) !!}</span>
              <span class="screen-reader-text"> dollars</span>
            </div>
          @endif
          @if($chatham['link'])
            <a href="{{ $chatham['link']['url'] }}" target="_blank">{{ $chatham['link']['title'] }}</a>
          @endif
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Durham County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--durham">
          <div class="bg-cover" style="background-image: url('<?= $durham['background_image']['sizes']['medium']; ?>')"></div>
          @if($durham['data'])
            <div class="percentage">{{ $durham['data'] }}</div>
          @endif
          @if($durham['text'])
            <div class="mb-4">{{ $durham['text'] }}</div>
          @endif
          @if($durham['amount'])
            <div class="amount">
              <span aria-hidden="true">$</span>
              <span class="h1">{!! App\number_format_short($durham['amount']) !!}</span>
              <span class="screen-reader-text"> dollars</span>
            </div>
          @endif
          @if($durham['link'])
            <a href="{{ $durham['link']['url'] }}" target="_blank">{{ $durham['link']['title'] }}</a>
          @endif
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Orange County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--orange">
          <div class="bg-cover" style="background-image: url('<?= $orange['background_image']['sizes']['medium']; ?>')"></div>
          @if($orange['data'])
            <div class="percentage">{{ $orange['data'] }}</div>
          @endif
          @if($orange['text'])
            <div class="mb-4">{{ $orange['text'] }}</div>
          @endif
          @if($orange['amount'])
            <div class="amount">
              <span aria-hidden="true">$</span>
              <span class="h1">{!! App\number_format_short($orange['amount']) !!}</span>
              <span class="screen-reader-text"> dollars</span>
            </div>
          @endif
          @if($orange['link'])
            <a href="{{ $orange['link']['url'] }}" target="_blank">{{ $orange['link']['title'] }}</a>
          @endif
        </div>
      </div>

      <div class="js-accordion__panel">
        <h2 class="js-accordion__header">{{ __('Wake County', 'sage') }}</h2>
        <div class="js-accordion__panel-wrap js-accordion__panel-wrap--wake">
          <div class="bg-cover" style="background-image: url('<?= $wake['background_image']['sizes']['medium']; ?>')"></div>
          @if($wake['data'])
            <div class="percentage">{{ $wake['data'] }}</div>
          @endif
          @if($wake['text'])
            <div class="mb-4">{{ $wake['text'] }}</div>
          @endif
          @if($wake['amount'])
            <div class="amount">
              <span aria-hidden="true">$</span>
              <span class="h1">{!! App\number_format_short($wake['amount']) !!}</span>
              <span class="screen-reader-text"> dollars</span>
            </div>
          @endif
          @if($wake['link'])
            <a href="{{ $wake['link']['url'] }}" target="_blank">{{ $wake['link']['title'] }}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
