{{--
  Template Name: Grant/Scholarship Page
 --}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article {!! post_class() !!}>
      @include('partials.page-header-w-intro')
      @include('partials.content-page-awards')
    </article>
  @endwhile
@endsection
