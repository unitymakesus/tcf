@php
  $id = get_the_ID();
  $primary = App\get_the_primary_term($id, 'category');
  $type = get_the_terms($id, 'tcf_post_type');
  $cat_slug = $primary->slug ?? '';
  $type_slug = !empty($type) ? $type[0]->slug : '';
@endphp

<article {!! post_class() !!}>
  @php
    $bg_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'x-large');
  @endphp

  <header class="page-header" style="background-image: url('<?= $bg_img[0]; ?>')">
    <div class="container">
      @if ($primary && $type_slug === 'stories')
        <span class="entry-primary-term h4">Stories: {!! $primary->name !!}</span>
      @else
        <span class="entry-primary-term h4">Blog: Triangle Community Foundation</span>
      @endif
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @include('partials/entry-meta')
    </div>
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
</article>
