@if ($categories = get_categories())
<nav>
  <ul class="menu">
    <li class="menu__item">
      <a href="#" class="menu__link">Categories</a>
      <ul class="submenu">
        @foreach ($categories as $category)
        <li class="submenu__item">
          <a class="submenu__link" href="#">{{ $category->name }}</a>
        </li>
        @endif
      </ul>
    </li>
  </ul>
</nav>
@endif