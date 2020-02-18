@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article {!! post_class() !!}>
      @include('partials.page-header')
      @include('partials.content-page')
      @if (get_the_ID() === get_field('county_map_display', 'options'))
        @include('partials.county-map')
      @endif
      @include('partials.page-footer-contact')
    </article>
  @endwhile
@endsection
