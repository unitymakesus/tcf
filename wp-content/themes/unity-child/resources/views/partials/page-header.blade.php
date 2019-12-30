@if (is_home() || is_archive() || is_search())
  @php $post_id = get_option('page_for_posts'); @endphp
@else
  @php $post_id = $post->ID; @endphp
@endif

@php
  $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'x-large')
@endphp

<header class="page-header {{ $feat_img ? 'page-header__bg' : '' }}" style="background-image: url('<?= $feat_img[0]; ?>')">
  <div class="container">
    <h1 class="page-header__title mb-0">{!! App::title() !!}</h1>
    @if ($tagline = get_field('page-header-tagline'))
      <div class="page-header__tagline">
        {{ $tagline }}
      </div>
    @endif
  </div>
</header>
