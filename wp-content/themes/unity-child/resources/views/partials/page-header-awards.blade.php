@if (is_home() || is_archive() || is_search())
  @php $post_id = get_option('page_for_posts'); @endphp
@else
  @php $post_id = $post->ID; @endphp
@endif

@php
  $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'x-large')
@endphp

@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs-wrap breadcrumbs-wrap__dark">
    <div class="container">
      @php breadcrumb_trail() @endphp
    </div>
  </div>
@endif

<header class="page-header__staff">
  <div class="container">
    <div class="row">
      <div class="col s12 m8">
        <h1>{!! App::title() !!}</h1>
        <p>We currently administer many scholarship and award funds established by individual donors and organizations. Each scholarship and award has a unique set of eligibility criteria, application processes, and deadlines, which you can search below. Please review all eligibility and application requirements and deadlines carefully.</p>
        <p>Also check out our list of additional financial aid resources and scholarships on our “Resources for Students” page!</p>
      </div>
    </div>
  </div>
</header>
