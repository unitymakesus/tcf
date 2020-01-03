@php
$events = get_posts([
  'post_type' => 'event',
  'tax_query' => [
    [
      'taxonomy' => 'event_category',
      'field'    => 'id',
      'terms'    => $term_id,
    ]
  ]
]);
@endphp

@if ($events)
  @foreach ($events as $event)
    <div class="flex">
      <div class="event-grouping__content">
        <h4 class="h4 mb-2">{{ $event->post_title }}</h4>
        <span class="event-grouping__subhead">{{ App\get_event_date($event->ID) }}</span>
        {!! get_field('event_summary', $event->ID) !!}
        @if ($link = get_field('event_cta', $event->ID))
          <a class="btn btn--orange" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
        @endif
      </div>
      <div class="event-grouping__image">
        {!! get_the_post_thumbnail($event->ID, 'large') !!}
      </div>
    </div>
  @endforeach
@endif
