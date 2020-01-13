<article {!! post_class() !!}>
  @php
    $bg_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'x-large');
  @endphp

  <header class="page-header" style="background-image: url('<?= $bg_img[0]; ?>')">
    <div class="container">
      @if ($primary = App\get_the_primary_term(get_the_ID(), 'category'))
        <span class="entry-primary-term h4">{{ $primary->name }}</span>
      @endif
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @include('partials/entry-meta')
    </div>
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
</article>
