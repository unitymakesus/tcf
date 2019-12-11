@php
  $footer_color = get_theme_mod( 'footer_color' );
  $text_color = get_theme_mod( 'footer_text_color' );
@endphp

<footer class="content-info page-footer" role="contentinfo" style="background-color: {{ $footer_color }}">
  <div class="footer-call-to-action">
    <div class="container">
      <div class="row">
        <div class="col s12 m7 push-m5">
          <h2 class="h3 text-uppercase">{{ __('Stay informed with our newsletter', 'sage') }}</h2>
          <p>{{ __('Receive the latest news about grants, stories, and how to make an impact in you community.', 'sage') }}</p>
          <a class="btn btn--white" href="#">{{ __('Sign up for our e-newsletter', 'sage') }}</a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-content">
    <div class="container">
      <div class="row">
        <div class="col s12 m3">
          <div class="footer-logo">
            <img src="@asset('images/logos/logo-footer.svg')" alt="{{ get_bloginfo('name', 'display') }}" />
          </div>
        </div>
        <div class="col s12 m9 l7">
          <address>
            <strong>TRIANGLE COMMUNITY FOUNDATION</strong><br />
            PO Box 12729 Durham, NC 27709<br />
            800 Park Offices Dr, Suite 201, Research Triangle Park, NC 27709
          </address>

          <div class="row">
            <div class="col s6 m4">
              <dl>
                <dt class="text-uppercase">Phone</dt>
                <dd><a href="tel:919.474.8370">919.474.8370</a></dd>
              </dl>
            </div>
            <div class="col s6 m4">
              <dl>
                <dt class="text-uppercase">Donor Services</dt>
                <dd><a href="tel:919.474.8363">919.474.8363</a></dd>
              </dl>
            </div>
            <div class="col s6 m4">
              <dl>
                <dt class="text-uppercase">Fax</dt>
                <dd><a href="tel:919.941.9208">919.941.9208</a></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col s12 m9 push-m3">
          @php dynamic_sidebar('footer-utility') @endphp
        </div>
        <div class="col s12">
          <span class="footer-copyright__text">
            {!! sprintf(__('Copyright &copy; %s %s. All Rights Reserved. Site by Unity Web Agency'), current_time('Y'), get_bloginfo('name', 'display')) !!}
          </span>
        </div>
      </div>
    </div>
  </div>
</footer>
