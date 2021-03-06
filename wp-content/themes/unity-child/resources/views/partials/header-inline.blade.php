@php
  $header_color = get_theme_mod( 'header_color' );
  $text_color = get_theme_mod( 'header_text_color' );
  $logo_width = get_theme_mod( 'header_logo_width' );
  $cta_text = get_theme_mod( 'header_cta_text' );
  $cta_link = get_theme_mod( 'header_cta_link' );
  $cta_target_bool = get_theme_mod( 'header_cta_target' );
  $cta_target = '';

  if ($cta_target_bool == true) {
    $cta_target = 'target="_blank" rel="noopener"';
  }
@endphp

@if (get_field('global_alert_bar_enable', 'options'))
  <div class="alert-bar">
    <div class="container-wide">
      <div class="row">
        <div class="col s12 text-center">
          {!! get_field('global_alert_bar_message', 'option') !!}
        </div>
      </div>
    </div>
  </div>
@endif

<header class="banner header-inline" role="banner" style="background-color: {{ $header_color }}">
    @php
      if (!empty($logo_width)) {
        $custom_logo_width = 'style=width:' . $logo_width . 'px;';
      } else {
        $custom_logo_width = '';
      }
    @endphp
    <div class="container-wide">
      <a class="logo" href="{{ home_url('/') }}" rel="home" {{ $custom_logo_width }}>
        @if (has_custom_logo())
          @php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'simple-logo' );
            $logo_2x = wp_get_attachment_image_src( $custom_logo_id, 'simple-logo-2x' );
          @endphp
          <img src="{{ $logo[0] }}"
              srcset="{{ $logo[0] }} 1x, {{ $logo_2x[0] }} 2x"
              alt="{{ get_bloginfo('name', 'display') }}"
              width="{{ $logo[1] }}" height="{{ $logo[2] }}" />
        @else
          {{ get_bloginfo('name', 'display') }}
        @endif
      </a>
      <div class="menu-trigger-wrapper hide-on-large-only">
        <button class="btn btn-small btn-toggle" id="mobile-menu-toggle" aria-expanded="false" aria-label="Show navigation menu">
          <i class="material-icons" aria-hidden="true">menu</i>
        </button>
      </div>
    </div>
    <nav class="navbar navbar-menu" role="navigation">
      <div class="container-wide flex space-between">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => FALSE, 'menu_class' => 'nav nav__primary flex']) !!}
        @include('partials/searchform', [
          'context' => 'header',
        ])
        <div class="utility-wrapper">
          <div class="utility-wrapper__nav">
            {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'container' => FALSE, 'menu_class' => 'nav nav__secondary flex']) !!}
            @if ($cta_link = get_field('header_cta_link', 'options'))
              <div class="cta-link">
                <a href="{{ $cta_link['url'] }}" class="btn" target="{{ $cta_link['target'] }}">{{ $cta_link['title'] }}</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </nav>
</header>

@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs-wrap">
    <div class="container-wide">
      @php breadcrumb_trail() @endphp
    </div>
  </div>
@endif
