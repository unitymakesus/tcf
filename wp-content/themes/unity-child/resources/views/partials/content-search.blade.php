<article class="single-entry">
  <div class="single-entry__summary" itemprop="description">
    <h2 class="single-entry__title" itemprop="name">
      <a href="{{ get_the_permalink() }}">{!! get_the_title() !!}</a>
    </h2>
    @php the_excerpt() @endphp
  </div>
  <div class="single-entry__image">
    @if (has_post_thumbnail())
      {!! the_post_thumbnail('thumbnail') !!}
    @else
      <img src="@asset("images/textures/texture-triangles-gray.svg")" alt="" />
    @endif
  </div>
</article>
