@if (has_post_thumbnail())
<figure class="text-center">
  {!! the_post_thumbnail('large') !!}
</figure>
@endif

<article class="container" {!! post_class() !!}>
  <div class="row">
    <div class="col">
      <header class="mt-6 mb-6">
        @if ($kicker = get_field('event_kicker_text'))
          <span class="kicker h3">{{ $kicker }}</span>
        @endif
        <h1 class="mb-2">{!! get_the_title() !!}</h1>
        @if ($details = App\get_event_full_details(get_the_ID()))
          <div class="details fw-700">{{ $details }}</div>
        @endif
      </header>
      <div class="entry-content">
        @php the_content() @endphp
      </div>
    </div>
  </div>
</article>
