@if ($hero = get_field('hero_image'))
<figure class="text-center">
  <img src="{{ $hero['sizes']['large'] }}" alt="{{ $hero['alt'] }}" />
</figure>
@endif

<article class="container" {!! post_class() !!}>
  <div class="row">
    <div class="col">
      <header class="mt-6 mb-6">
        <span class="kicker h3">{{ __('Save The Date', 'sage') }}</span>
        <h1 class="mb-2">{!! get_the_title() !!}</h1>
        <div class="details fw-700">March 2020, 4:00pm—7:00pm | Raleigh Convention Center</div>
      </header>
      <div class="entry-content">
        @php the_content() @endphp
      </div>
      <a href="#" class="btn btn--orange mb-6 mt-6">{{ __('Call To Action', 'sage') }}</a>
    </div>
  </div>
</article>
