@php
$primary = App\get_the_primary_term(get_the_ID(), 'category');
$cat_slug = $primary->slug ?? '';
@endphp

<article class="single-entry single-entry--{{ $cat_slug }}">
  <div class="single-entry__summary" itemprop="description">
    @if ($primary)
      <span class="single-entry__label">{{ $primary->name }}</span>
    @endif
    <h2 class="single-entry__title" itemprop="name">{!! get_the_title() !!}</h2>
    <div class="single-entry__meta">
      @include('partials/entry-meta')
    </div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, perferendis, laudantium nulla necessitatibus eos quisquam enim corrupti possimus a cumque odit voluptatem nisi quia ipsam vel. Ad, nam cumque. Earum... <a href="#">Continued</a>
  </div>
  <div class="single-entry__image">
    @if (has_post_thumbnail())
      {!! the_post_thumbnail('thumbnail') !!}
    @else
      <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
    @endif
  </div>
</article>
