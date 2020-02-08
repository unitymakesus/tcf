@php
  $id = get_the_ID();
  $primary = App\get_the_primary_term($id, 'category');
  $type = get_the_terms($id, 'tcf_post_type');
  $cat_slug = $primary->slug ?? '';
  $type_slug = !empty($type) ? $type[0]->slug : '';
@endphp

<article
  class="single-entry" data-cat="{{ $cat_slug }}" data-type="{{ $type_slug }}">
  <div class="single-entry__summary" itemprop="description">
    @if ($primary && $type_slug === 'stories')
      <span class="single-entry__label">Stories: {!! $primary->name !!}</span>
    @else
      <span class="single-entry__label">Blog: Triangle Community Foundation</span>
    @endif
    <h2 class="single-entry__title mt-4" itemprop="name">
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
      @php $color = ($type_slug == 'stories') ? '' : '-gray'; @endphp
      <img src="@asset("images/textures/texture-triangles{$color}.svg")" alt="" />
    @endif
  </div>
</article>
