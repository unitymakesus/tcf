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
      <div id="root"></div>
    </div>
  </div>
</div>


