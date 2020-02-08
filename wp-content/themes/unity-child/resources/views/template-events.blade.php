{{--
  Template Name: Events
 --}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article {!! post_class() !!}>
      @include('partials.page-header-events')
      @include('partials.content-page-events')
    </article>
  @endwhile
@endsection
