@php
$cat = get_field('award_category');
@endphp

<script>
var params = @json($params = [
  'award_category' => $cat->slug
]);
</script>

<div class="container">
  <div class="row row__table">
    <div class="col s12">
      <form role="search" method="get" id="award-search" action="<?= esc_url(home_url('/')); ?>">
        <label for="live-search">{{ __("Search for {$cat->name} by keyword", 'sage') }}</label>
        <input
          type="text"
          id="live-search"
          value="{{ get_search_query() }}"
          name="s"
          placeholder="{{ __('Start typing...', 'sage') }}"
          required
          autocomplete="off"
        />
      </form>
      <div id="root"></div>
    </div>
  </div>
</div>


