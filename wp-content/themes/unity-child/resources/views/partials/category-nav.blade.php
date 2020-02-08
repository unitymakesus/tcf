@if ($categories)
<nav class="dropdown">
  <ul>
    <li class="dropdown__item">
      <a class="btn btn--grey" href="javascript:void()" aria-haspopup="true">{{ __('Categories', 'sage') }}</a>
      <ul class="dropdown__submenu" aria-label="submenu">
        @foreach ($categories as $category)
          <li>
            <a href="{{ get_category_link($category) }}">{!! ($category->name) !!}</a>
          </li>
        @endforeach
      </ul>
    </li>
  </ul>
</nav>
@endif
