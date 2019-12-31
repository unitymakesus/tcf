@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article {!! post_class() !!}>
      @include('partials.page-header')
      @include('partials.content-page')
      @if (is_page('why-the-triangle'))
        @include('partials.county-map')
      @endif
    </article>
  @endwhile
@endsection
