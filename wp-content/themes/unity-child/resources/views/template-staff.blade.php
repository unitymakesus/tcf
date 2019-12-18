{{--
  Template Name: Staff
 --}}
 @extends('layouts.app')

 @section('content')
   @while(have_posts()) @php the_post() @endphp
     <article {!! post_class() !!}>
       @include('partials.page-header-staff')
       @include('partials.content-page')
     </article>
   @endwhile
 @endsection