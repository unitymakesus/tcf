@if (is_home() || is_archive() || is_search())
  @php $post_id = get_option('page_for_posts'); @endphp
@else
  @php $post_id = $post->ID; @endphp
@endif

@php
  $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'x-large')
@endphp

@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs-wrap breadcrumbs-wrap__light">
    <div class="container">
      @php breadcrumb_trail() @endphp
    </div>
  </div>
@endif

<header class="page-header" style="background-image: url('<?= $feat_img[0]; ?>')">
  <div class="container">
    <h1 class="mb-0">{!! App::title() !!}</h1>
  </div>
</header>
