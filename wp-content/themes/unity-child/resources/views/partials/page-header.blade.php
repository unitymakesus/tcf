@php
  $the_id = $page_id ?? get_the_ID();
  $bg_img = wp_get_attachment_image_src( get_post_thumbnail_id($the_id), 'x-large');
  $icon = get_field('page_header_icon', $the_id);
@endphp

<header class="flex flex-direction-column">
  <div class="page-header {{ $icon ? 'page-header--w-icon' : '' }} {{ $bg_img ? 'page-header--has-img' : '' }}" style="background-image: url('<?= $bg_img[0]; ?>')">
    <div class="container">
      @if (!empty($icon))
        <div class="page-header__icon">
          <img src="{{ $icon['url'] }}" alt="" />
        </div>
      @endif
      <div>
        @if ($tagline = get_field('page_header_tagline'))
          <h1 class="page-header--w-icon__title">{!! App::title() !!}</h1>
          <span class="page-header__tagline">{{ $tagline }}</span>
        @else
          <h1 class="mb-0 page-header__title">{!! App::title() !!}</h1>
        @endif
      </div>
    </div>
  </div>
</header>
