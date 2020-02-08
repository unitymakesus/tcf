@php
  $featured_event = get_field('main_featured_event')
@endphp

<header class="page-header--w-intro {{ $featured_event ? 'page-header--has-event' : '' }}">
  <div class="container">
    <div class="row no-gutters">
      <div class="col s12 m8 l7">
        <h1 class="page-header__title">{!! App::title() !!}</h1>
      </div>
    </div>
  </div>
  @if (!empty($featured_event))
    <section class="featured-event">
      <div class="container-wide">
        <div class="row flex">
          <div class="col m6">
            <div class="image-wrap">
              {!! get_the_post_thumbnail($featured_event->ID, 'medium_large') !!}
            </div>
          </div>
          <div class="col m6">
            <div class="content-wrap">
              <h2 class="mb-0">{{ $featured_event->post_title }}</h2>
              <div class="fw-700 mb-3">{{ App\get_custom_date('event', $featured_event->ID) }}</div>
              @if ($location = get_field('event_location', $featured_event->ID))
                <p>{{ $location }}</p>
              @endif
              <p>{!! get_field('event_summary', $featured_event->ID) !!}</p>
              @if ($link = get_field('event_cta', $featured_event->ID))
                <p><a class="btn btn--orange" href="{{ $link['url'] }}">{{ $link['title'] }}</a></p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
</header>
