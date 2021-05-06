@extends('layouts.app')

@section('content')
  @include('partials.page-header-w-intro', [
    'archive_intro' => get_field('press_header_intro', 'option'),
    'page_id' => get_option( 'page_for_posts' )
  ])
  <div class="archive-wrap">
    <div class="archive-filters">
      <div class="container">
        <div class="archive-filters__inner">
          <div class="flex">
            @php $active_filter = array_key_exists('filter', $_GET); @endphp
            <a href="{{ get_post_type_archive_link('press') }}" class="archive-filters__filter {{ $active_filter ? '' : 'active' }}">All</a>
            <a href="{{ get_post_type_archive_link('press') . '?filter=press-releases' }}" class="archive-filters__filter {{ $active_filter && $_GET['filter'] === 'press-releases' ? 'active' : '' }}">Press</a>
            <a href="{{ get_post_type_archive_link('press') . '?filter=media' }}" class="archive-filters__filter {{ $active_filter && $_GET['filter'] === 'media' ? 'active' : '' }}">Media</a>
            <a href="{{ get_post_type_archive_link('press') . '?filter=newsletter' }}" class="archive-filters__filter {{ $active_filter && $_GET['filter'] === 'newsletter' ? 'active' : '' }}">Newsletters</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="archive-wrap__inner">
        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
        @endif

        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>
    </div>
  </div>
  @include('partials.page-footer-contact')
@endsection
