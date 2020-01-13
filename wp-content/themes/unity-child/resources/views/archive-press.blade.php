@extends('layouts.app')

@section('content')
  @include('partials.page-header-w-intro', [
    'archive_intro' => 'Triangle Community Foundation is the leading expert on local philanthropy, giving trends, and critical issues. We strive to be clear and informative about the work we do to enhance life in the Triangle, and we pride ourselves on being a trusted resource for media and other community partners.'
  ])
  <div class="archive-wrap">
    <div class="archive-filters">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="flex">
              @php $active_filter = array_key_exists('filter', $_GET); @endphp
              <a href="{{ get_post_type_archive_link('press') . '?filter=press-releases' }}"  class="{{ $active_filter && $_GET['filter'] === 'press-releases' ? 'active' : '' }}">Press</a>
              <a href="{{ get_post_type_archive_link('press') . '?filter=media' }}" class="{{ $active_filter && $_GET['filter'] === 'media' ? 'active' : '' }}">Media</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="archive-wrap__inner">
            @if (!have_posts())
              <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
              </div>
              {!! get_search_form(false) !!}
            @endif

            @while (have_posts()) @php the_post() @endphp
              @include('partials.content-'.get_post_type())
            @endwhile
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
