@extends('layouts.app')

@section('content')
  @include('partials.page-header-w-intro')

  <div class="container">
    <div class="row">
      <div class="col s12">
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found. Please try another search keyword.', 'sage') }}
          </div>
        @endif

        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-search')
        @endwhile

        @php
          the_posts_pagination([
            'prev_text'          => '&laquo; Previous <span class="screen-reader-text">page</span>',
            'next_text'          => 'Next <span class="screen-reader-text">page</span> &raquo;',
            'before_page_number' => '<span class="meta-nav screen-reader-text">Page</span>',
          ]);
        @endphp
      </div>
    </div>
  </div>
@endsection
