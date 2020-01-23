@extends('layouts.app')

@section('content')
  @include('partials.page-header-w-intro', [
    'archive_intro' => is_home() ? get_field('stories_header_intro', 'option') : ''
  ])
  <div class="archive-wrap">
    @if (is_home())
    <div class="archive-filters">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="flex">
              @php $active_filter = array_key_exists('filter', $_GET); @endphp
              <a href="{{ get_post_type_archive_link('post') }}" class="{{ $active_filter ? '' : 'active' }}">All</a>
              <a href="{{ get_post_type_archive_link('post') . '?filter=stories' }}"  class="{{ $active_filter && $_GET['filter'] === 'stories' ? 'active' : '' }}">Stories</a>
              <a href="{{ get_post_type_archive_link('post') . '?filter=blog' }}" class="{{ $active_filter && $_GET['filter'] === 'blog' ? 'active' : '' }}">Blog</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="archive-wrap__inner">
            @if (!have_posts())
              <div class="alert alert-warning">
                {{ __('Sorry, no results were found. Please check back again soon!', 'sage') }}
              </div>
            @endif

            @while (have_posts()) @php the_post() @endphp
              @include('partials.content-'.get_post_type())
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
    </div>
  </div>
  @if (is_home())
    <div class="container">
      @include('partials.twitter-feed')
    </div>
  @endif
@endsection
