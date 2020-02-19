@php
  $the_id = $page_id ?? get_the_ID();
  $bg_img = wp_get_attachment_image_src( get_post_thumbnail_id($the_id), 'medium');
@endphp

<header class="page-header--w-intro">
@if (has_post_thumbnail($the_id))
  <div class="row flex">
    <div class="col s12 m4">
      <div class="thumbnail-container" style="background-image: url('<?= $bg_img[0]; ?>')"></div>
    </div>

    <div class="col s12 m8 l7">
      <h1 class="page-header__title">{!! App::title() !!}</h1>
      @if (isset($archive_intro))
        {!! $archive_intro !!}
      @else
        {!! get_field('page_header_intro') !!}
      @endif
    </div>
  </div>
@else
  <div class="container">
    <div class="row no-gutters">
      <div class="col s12 m8 l7">
        <h1 class="page-header__title">{!! App::title() !!}</h1>
        @if (isset($archive_intro))
          {!! $archive_intro !!}
        @else
          {!! get_field('page_header_intro') !!}
        @endif
      </div>
    </div>
  </div>
@endif
</header>
