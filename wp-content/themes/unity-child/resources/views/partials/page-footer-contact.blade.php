@if ($staff_id = get_field('staff_member_contact'))
  <footer class="entry-footer">
    <div class="container">
      @php
        $staff_image = get_the_post_thumbnail($staff_id, 'medium');
      @endphp
      <div class="row no-gutters">
        <div class="col s3">
          <div class="entry-footer__image">
            <img src="@asset('images/misc/entry-footer-img.jpg')" alt="" />
          </div>
        </div>
        <div class="col s9">
          <div class="entry-footer__details">
            <h2>{{ get_field( 'contact_cta_title' ) }}</h2>
            <p>Grantmaking: Arts, Community Development, Education, and the Environment</p>
            <div class="row mt-10">
              @if ($email = get_field('email', $staff_id))
                <div class="col m6">
                  <div class="mt-2 text-uppercase text-orange fw-700">{{ __('Email', 'sage') }}</div>
                  <div><a target="_blank" rel="noopener" href="mailto:ken@trianglecf.org">ken@trianglecf.org</a></div>
                </div>
              @endif
              @if ($phone = get_field('phone_number', $staff_id))
                <div class="col m6">
                  <div class="mt-2 text-uppercase text-orange fw-700">{{ __('Phone', 'sage') }}</div>
                  <div>919.474.8370 ext:4001</div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
@endif
