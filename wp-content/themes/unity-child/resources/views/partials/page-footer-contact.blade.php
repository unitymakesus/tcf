@if ($staff_members = get_field('staff_member_contact'))
  <footer class="entry-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h2>{{ get_field('contact_cta_title') }}</h2>
          <p>Grantmaking: Arts, Community Development, Education, and the Environment</p>
        </div>
      </div>
      @foreach ($staff_members as $staff)
        <div class="row no-gutters mb-3">
          <div class="col s2">
            <div class="entry-footer__image">
              {!! get_the_post_thumbnail($staff, 'staff-headshot') !!}
            </div>
          </div>
          <div class="col s10">
            <div class="entry-footer__details">
              <div class="row">
                <div class="col s12">
                  <h3 class="mb-0">{{ get_the_title($staff) }}</h3>
                </div>
                @if ($email = get_field('email', $staff))
                  <div class="col s12 m6">
                    <div class="mt-2 text-uppercase text-orange fw-700">{{ __('Email', 'sage') }}</div>
                    <div><a target="_blank" rel="noopener" href="mailto:{{ $email }}">{{ $email }}</a></div>
                  </div>
                @endif
                @if ($phone = get_field('phone_number', $staff))
                  <div class="col s12 m6">
                    <div class="mt-2 text-uppercase text-orange fw-700">{{ __('Phone', 'sage') }}</div>
                    <div>{{ $phone }}</div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </footer>
@endif
