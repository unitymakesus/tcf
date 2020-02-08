@if (has_post_thumbnail())
  <div class="event-header">
    <div class="container">
      <figure class="featured-image">
        {!! the_post_thumbnail('large') !!}
      </figure>
    </div>
  </div>
@endif

<article {!! post_class() !!}>
  <header class="mb-6">
    @if ($kicker = get_field('event_kicker_text'))
      <div class="kicker h3">{{ $kicker }}</div>
    @endif
    <h1 class="mb-2 mt-0">{!! get_the_title() !!}</h1>
    @if ($details = App\get_event_full_details(get_the_ID()))
      <div class="details fw-700">{{ $details }}</div>
    @endif
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
</article>
