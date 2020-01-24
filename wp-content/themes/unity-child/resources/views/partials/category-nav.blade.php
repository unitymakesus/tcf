@if ($categories)
<nav class="dropdown">
  <ul>
    <li class="dropdown__item">
      <a class="btn btn--grey" href="#" aria-haspopup="true">{{ __('Categories', 'sage') }}</a>
      <ul class="dropdown__submenu" aria-label="submenu">
        @foreach ($categories as $category)
        <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
      </ul>
    </li>
  </ul>
</nav>
@endif
