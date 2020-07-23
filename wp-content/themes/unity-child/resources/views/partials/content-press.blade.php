<article class="single-entry">
  <div class="single-entry__summary" itemprop="description">
    <h2 class="single-entry__title" itemprop="name">{!! get_the_title() !!}</h2>
    <div class="single-entry__meta">
      @include('partials/entry-meta')
    </div>
    @php the_content() @endphp
  </div>
  @if (get_field('press_disable_image') == false)
    <div class="single-entry__image">
      @if (has_post_thumbnail())
        {!! the_post_thumbnail('small') !!}
      @else
        <img src="@asset('images/textures/texture-triangles-gray.svg')" alt="" />
      @endif
    </div>
  @endif
</article>
