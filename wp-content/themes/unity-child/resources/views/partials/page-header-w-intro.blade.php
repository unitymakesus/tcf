<header class="page-header--w-intro">
  <div class="container">
    <div class="row">
      <div class="col s12 m8">
        <h1 class="page-header__title">{!! App::title() !!}</h1>
        @if (isset($archive_intro))
          {!! $archive_intro !!}
        @else
          {!! get_field('page_header_intro') !!}
        @endif
      </div>
    </div>
  </div>
</header>
