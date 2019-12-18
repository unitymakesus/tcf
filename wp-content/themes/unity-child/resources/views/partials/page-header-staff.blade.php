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
        <p>Our staff is dedicated to this community and to making it a better place. With extensive knowledge of the region’s changing needs, we work together to assist donors with their philanthropic goals, we work closely with nonprofits to address challenges in the community and we are always learning more about the needs in the Triangle, and how we can affect change. We are here to serve you, our donors and our community.</p>
      </div>
    </div>
  </div>
</header>
