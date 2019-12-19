@php
  $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'x-large');
  $impact_icon = get_field('impact_icon');
@endphp

@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs-wrap breadcrumbs-wrap__light">
    <div class="container">
      @php breadcrumb_trail() @endphp
    </div>
  </div>
@endif

<header class="page-header page-header__impact" style="background-image: url('<?= $feat_img[0]; ?>')">
  <div class="container">
    <div class="icon">
      <img class="impact-icon" src="{{ $impact_icon['url'] }}" alt="" />
      <h1>{!! App::title() !!}</h1>
    </div>
    <div class="headline">
      <span class="h1 text-transform-none">{{ get_field('impact_headline') }}</span>
    </div>
  </div>
</header>
