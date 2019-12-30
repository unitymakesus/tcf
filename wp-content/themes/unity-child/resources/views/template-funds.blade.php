{{--
  Template Name: Funds
 --}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <article {!! post_class() !!}>
      @include('partials.page-header-w-icon')
      @include('partials.content-page')
      @include('partials.page-footer-contact')
    </article>
  @endwhile
@endsection
