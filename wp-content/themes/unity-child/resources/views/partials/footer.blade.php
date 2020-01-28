<footer class="content-info page-footer" role="contentinfo">
  @if (get_field('global_footer_cta_enable', 'option'))
  <div class="footer-call-to-action">
    <div class="container">
      <div class="row">
        <div class="col s12 m7 push-m5">
          <h2 class="h2">{{ get_field('global_footer_cta_heading', 'option') }}</h2>
          {!! get_field('global_footer_cta_text', 'option') !!}
          @if ($link = get_field('global_footer_cta_link', 'option'))
            <a class="btn btn--white btn--footer-cta" href="{{ $link['url'] }}" target="{{ $link['target'] }}">{{ $link['title'] }}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="footer-content">
    <div class="container">
      <div class="row">
        <div class="col s12 m3">
          <div class="footer-logo">
            <img src="@asset('images/logos/logo-footer.svg')" alt="{{ get_bloginfo('name', 'display') }}" />
          </div>
        </div>
        <div class="col s12 m9 l7">
          @if ($address = get_field('footer_address', 'option'))
          <address>
            {!! $address !!}
          </address>
          @endif

          <div class="row">
            @if ($phone = get_field('footer_phone', 'option'))
              <div class="col s6 m4">
                <dl>
                  <dt class="text-uppercase">{{ __('Phone', 'sage') }}</dt>
                  <dd><a href="tel:{{ $phone }}">{{ $phone }}</a></dd>
                </dl>
              </div>
            @endif
            @if ($donor_services = get_field('footer_donor_services', 'option'))
            <div class="col s6 m4">
              <dl>
                <dt class="text-uppercase">{{ __('Donor Services', 'sage') }}</dt>
                <dd><a href="tel:{{ $donor_services }}">{{ $donor_services }}</a></dd>
              </dl>
            </div>
            @endif
            @if ($fax = get_field('footer_fax', 'option'))
            <div class="col s6 m4">
              <dl>
                <dt class="text-uppercase">{{ __('Fax', 'sage') }}</dt>
                <dd><a href="tel:{{ $fax }}">{{ $fax }}</a></dd>
              </dl>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col s12">
          @php dynamic_sidebar('footer-utility') @endphp
          @if ($copyright = get_field('footer_copyright_text', 'option'))
            <span class="footer-copyright__text">
              {!! str_replace('#year#', date('Y'), $copyright) !!}
            </span>
          @endif
        </div>
      </div>
    </div>
  </div>
</footer>
