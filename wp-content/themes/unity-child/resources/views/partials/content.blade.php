@php
$primary = App\get_the_primary_term(get_the_ID(), 'category');
$cat_slug = $primary->slug ?? '';
@endphp

<article class="single-entry single-entry--{{ $cat_slug }}">
  <div class="single-entry__summary" itemprop="description">
    @if ($primary)
      <span class="single-entry__label">{{ $primary->name }}</span>
    @endif
    <h2 class="single-entry__title" itemprop="name">
      <a href="{{ get_the_permalink() }}">{!! get_the_title() !!}</h2></a>
    <div class="single-entry__meta">
      @include('partials/entry-meta')
    </div>
    @php the_excerpt() @endphp
  </div>
  <div class="single-entry__image">
    @if (has_post_thumbnail())
      {!! the_post_thumbnail('thumbnail') !!}
    @else
      <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
    @endif
  </div>
</article>
