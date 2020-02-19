@if ($categories)
  <div class="dropdown">
    @if ($label)
      <span class="dropdown__label">{{ $label }}</span>
    @endif
    <a class="dropdown__toggle" href="#" role="button" aria-expanded="false">
      {{ __('Categories', 'sage') }}
      <i class="material-icons" aria-hidden="true">arrow_drop_down</i>
    </a>
    <ul class="dropdown__list">
      @foreach ($categories as $category)
        <li>
          <a href="{{ get_category_link($category) }}">{!! ($category->name) !!}</a>
        </li>
      @endforeach
    </ul>
  </div>
@endif

{{-- @if ($categories)
<nav class="dropdown">
  <ul>
    <li class="dropdown__item">
      <a class="btn btn--grey btn-toggle" href="javascript:void()" aria-expanded="false" aria-haspopup="true">{{ __('Categories', 'sage') }}</a>
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
@endif --}}
