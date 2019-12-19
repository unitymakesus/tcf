@php
$events = get_posts([
  'post_type' => 'event',
  'tax_query' => [
    [
      'taxonomy' => 'event_category',
      'field' => 'id',
      'terms' => $term_id,
    ]
  ]
]);
@endphp

@if ($events)
  @foreach ($events as $event)
    @php
      $event_date = get_field('event_date_display', $event) ? get_field('event_date_display', $event) : get_field('event_date', $event);
    @endphp

    <div class="flex">
      <div class="event-grouping__content">
        <h4 class="h4 mb-2">{{ $event->post_title }}</h4>
        <span class="event-grouping__subhead">{{ $event_date }}</span>
        <p><u>This event is invite-only</u>. If you are interested in attending this event, please reach out to Sarah Guidi.</p>
        <a class="btn btn--orange" href="{{ get_the_permalink($event) }}">{{ __('Call To Action', 'sage') }}</a>
      </div>
      <div class="event-grouping__image">
        {!! get_the_post_thumbnail($event->ID, 'large') !!}
      </div>
    </div>
  @endforeach
@endif
