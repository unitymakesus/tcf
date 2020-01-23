@if ($featured_event = get_field('main_featured_event'))
  <section class="featured-event">
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
          {!! get_field('event_summary', $featured_event->ID) !!}
          @if ($link = get_field('event_cta', $featured_event->ID))
            <a class="btn btn--orange" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
          @endif
        </div>
      </div>
    </div>
  </section>
@endif
<div class="container">
  <div class="tabbed">
    <ul>
      <li>
        <a href="#section-donor-only">{{ __('Donor Only Events', 'sage') }}</a>
      </li>
      <li>
        <a href="#section-nonprofit-only">{{ __('Nonprofit Only Events', 'sage') }}</a>
      </li>
      <li>
        <a href="#section-community-gatherings">{{ __('Community Gatherings', 'sage') }}</a>
      </li>
    </ul>
    <section id="section-donor-only">
      <h2 class="h2">{{ __('Donor Only Events', 'sage') }}</h2>
      {!! get_field('tab_donor_only_events_intro') !!}
      @if (have_rows('tab_donor_only_events_content')) @while (have_rows('tab_donor_only_events_content')) @php the_row(); @endphp
        <div class="event-grouping">
          <div class="flex mb-6">
            <div class="event-grouping__content">
              <h3 class="h3 mb-2">{!! get_sub_field('event_grouping_title') !!}</h3>
              @if ($subhead = get_sub_field('event_grouping_subhead'))
                <span class="event-grouping__subhead">{{ $subhead }}</span>
              @endif
              @if ($content = get_sub_field('event_grouping_content'))
                <div>{!! $content !!}</div>
              @endif
              @if ($cta = get_sub_field('event_grouping_cta'))
                <a class="btn btn--orange" href="{{ $cta['url'] }}" target="{{ $cta['target'] }}">{{ $cta['title'] }}</a>
              @endif
            </div>
            <div class="event-grouping__image">
              @if ($img = get_sub_field('event_grouping_image'))
                <img src="{{ $img['sizes']['medium'] }}" alt="{{ $img['alt'] }}" />
              @else
                <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
              @endif
            </div>
          </div>
          @if ($term_id = get_sub_field('event_grouping_upcoming_events'))
            @include('partials.upcoming-events-by-tax', [
              'term_id' => $term_id,
            ])
          @endif
        </div>
      @endwhile @endif
    </section>
    <section id="section-nonprofit-only">
      <h2 class="h2">{{ __('Nonprofit Only Events', 'sage') }}</h2>
      {!! get_field('tab_nonprofit_only_events_intro') !!}
      @if (have_rows('tab_nonprofit_only_events_content')) @while (have_rows('tab_nonprofit_only_events_content')) @php the_row(); @endphp
        <div class="event-grouping">
          <div class="flex mb-6">
            <div class="event-grouping__content">
              <h3 class="h3 mb-2">{!! get_sub_field('event_grouping_title') !!}</h3>
              @if ($subhead = get_sub_field('event_grouping_subhead'))
                <span class="event-grouping__subhead">{{ $subhead }}</span>
              @endif
              @if ($content = get_sub_field('event_grouping_content'))
                <div>{!! $content !!}</div>
              @endif
              @if ($cta = get_sub_field('event_grouping_cta'))
                <a class="btn btn--orange" href="{{ $cta['url'] }}" target="{{ $cta['target'] }}">{{ $cta['title'] }}</a>
              @endif
            </div>
            <div class="event-grouping__image">
              <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
            </div>
          </div>
          @if ($term_id = get_sub_field('event_grouping_upcoming_events'))
            @include('partials.upcoming-events-by-tax', [
              'term_id' => $term_id,
            ])
          @endif
        </div>
      @endwhile @endif
    </section>
    <section id="section-community-gatherings">
      <h2 class="h2">{{ __('Community Gatherings', 'sage') }}</h2>
      {!! get_field('tab_community_gatherings_intro') !!}
      @if (have_rows('tab_community_gatherings_content')) @while (have_rows('tab_community_gatherings_content')) @php the_row(); @endphp
        <div class="event-grouping">
          <div class="flex mb-6">
            <div class="event-grouping__content">
              <h3 class="h3 mb-2">{!! get_sub_field('event_grouping_title') !!}</h3>
              @if ($subhead = get_sub_field('event_grouping_subhead'))
                <span class="event-grouping__subhead">{{ $subhead }}</span>
              @endif
              @if ($content = get_sub_field('event_grouping_content'))
                <div>{!! $content !!}</div>
              @endif
              @if ($cta = get_sub_field('event_grouping_cta'))
                <a class="btn btn--orange" href="{{ $cta['url'] }}" target="{{ $cta['target'] }}">{{ $cta['title'] }}</a>
              @endif
            </div>
            <div class="event-grouping__image">
              <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
            </div>
          </div>
          @if ($term_id = get_sub_field('event_grouping_upcoming_events'))
            @include('partials.upcoming-events-by-tax', [
              'term_id' => $term_id,
            ])
          @endif
        </div>
      @endwhile @endif
    </section>
  </div>
</div>
