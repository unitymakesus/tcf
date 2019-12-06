<form role="search" method="get" class="wp-search" action="{{ home_url('/') }}">
  <label class="screen-reader-text" for="wp-search">{{ _x('Search for:', 'label') }}</label>
  <input type="search" class="" name="s" id="wp-search" placeholder="{{ esc_attr_x('Search…', 'placeholder') }}" value="{{ get_search_query() }}" title="{{ esc_attr_x('Search for:', 'label') }}" autocomplete="off" required />
  <button type="submit" class="btn btn-small">
    <span class="screen-reader-text">{{ __('Submit', 'sage') }}</span>
    <i class="material-icons" aria-hidden="true">search</i>
  </button>
</form>
