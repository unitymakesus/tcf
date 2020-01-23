<div class="entry-content">
  <div class="row">
    @if ($amount = get_field('amount'))
      <div class="col s6">
        <h2 class="h3">{{ __('Amount', 'sage') }}</h2>
        <p class="award-detail-text">{{ $amount }}</p>
      </div>
    @endif
    @if ($deadline = get_field('deadline'))
      <div class="col s6">
        <h2 class="h3">{{ __('Application Deadline', 'sage') }}</h2>
        <p class="award-detail-text">{{ App\get_award_deadline_text(get_the_ID()) }}</p>
      </div>
    @endif
    <div class="col s12 mt-6">
      @php the_content() @endphp
    </div>
  </div>
</div>
<div class="entry-pre-footer">
  {{ __('Please reach out to us if you have questions PRIOR to the deadline!', 'sage') }}
</div>
