@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container mt-12 mb-12">
    <div class="row">
      <div class="col s12">
        @if (!have_posts())
          <div class="alert alert-warning">
            <p>{{ __('Sorry, but the content you were trying to view does not exist.', 'sage') }}</p>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
