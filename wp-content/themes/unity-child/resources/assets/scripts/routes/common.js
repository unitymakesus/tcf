import dropdownToggle from '../components/dropdownToggle';

export default {
  init() {
    /**
     * Initalize custom dropdown toggles.
     */
    dropdownToggle();

    /**
     * Set aria labels for current navigation items
     */
    // Main navigation in header and footer
    $('.menu-primary-menu-container .menu-item').each(function() {
      if ($(this).hasClass('current-page-ancestor')) {
        $(this).children('a').attr('aria-current', 'true');
      }
      if ($(this).hasClass('current-menu-item')) {
        $(this).children('a').attr('aria-current', 'page');
      }
    });
    // Sidebar navigation
    $('.widget_nav_menu .menu-item').each(function() {
      if ($(this).hasClass('current-page-ancestor')) {
        $(this).children('a').attr('aria-current', 'true');
      }
      if ($(this).hasClass('current-menu-item')) {
        $(this).children('a').attr('aria-current', 'page');
      }
    });

    // Search "dropdown"
    let expanded = false;
    $('#js-search-toggle').on('click', function(e) {
      e.preventDefault();

      // Toggle aria-expanded for open / close
      expanded = !expanded;
      $(this).attr('aria-expanded', expanded ? 'true' : 'false');
      $(this).find('i').text(expanded ? 'close' : 'search');

      // Activate search "popover"
      let searchWrap = $('.search-wrapper__inner');
      searchWrap.toggleClass('is-active');

      if (expanded === true) {
        searchWrap.find('input[type="search"]').focus();
      }
    });
  },
  finalize() {
    // Media query
    var smDown = window.matchMedia( '(max-width: 768px)' );

    // Show a11y toolbar
    function showA11yToolbar() {
      $('body').addClass('a11y-tools-active');
      $('#a11y-tools-trigger + label i').attr('aria-label', 'Hide accessibility tools');

      // Enable focus of tools using tabindex
      $('.a11y-tools').each(function() {
        var el = $(this);
        $('input', el).attr('tabindex', '0');
      });
    }

    // Hide a11y toolbar
    function hideA11yToolbar() {
      $('body').removeClass('a11y-tools-active');
      $('#a11y-tools-trigger + label i').attr('aria-label', 'Show accessibility tools');

      // Disable focus of tools using tabindex
      $('.a11y-tools').each(function() {
        var el = $(this);
        $('input', el).attr('tabindex', '-1');
      });
    }

    // Toggle a11y toolbar
    $('#a11y-tools-trigger').on('change', function() {
      if (smDown.matches) {
        if ($(this).prop('checked')) {
          showA11yToolbar();
        } else {
          hideA11yToolbar();
        }
      }
    });

    // Make a11y toolbar keyboard accessible
    $('.a11y-tools').on('focusout', 'input', function() {
      setTimeout(function () {
        if (smDown.matches) {
          if ($(':focus').closest('.a11y-tools').length == 0) {
            $('#a11y-tools-trigger').prop('checked', false);
            hideA11yToolbar();
          }
        }
      }, 200);
    });

    // Controls for changing text size
    $('#text-size input[name="text-size"]').on('change', function() {
      let tsize = $(this).val();
      $('html').attr('data-text-size', tsize);
      document.cookie = 'data_text_size=' + tsize + ';max-age=31536000;path=/';
    });

    // Controls for changing contrast
    $('#toggle-contrast input[name="contrast"]').on('change', function() {
      let contrast = $(this).is(':checked');
      $('html').attr('data-contrast', contrast);
      document.cookie = 'data_contrast=' + contrast + ';max-age=31536000;path=/';
    });

    /**
     * Mobile menu toggle behavior.
     */
    $('#mobile-menu-toggle').on('click', function() {
      $('body').toggleClass('mobilenav-active');

      // Toggle aria-expanded value.
      $(this).attr('aria-expanded', (i, attr) => {
        return attr == 'false' ? 'true' : 'false';
      });

      // Toggle icon.
      $(this).find('i').text((i, text) => {
        return text == 'menu' ? 'close' : 'menu';
      });

      // Toggle aria-label text.
      $(this).attr('aria-label', (i, attr) => {
        return attr == 'Show navigation menu' ? 'Hide navigation menu' : 'Show navigation menu';
      });
    });

    /**
     * Sub-menu toggles (mobile only)
     */
    $('.btn-toggle--sub-menu').on('click', function() {
      // Toggle aria-expanded value.
      $(this).attr('aria-expanded', (i, attr) => {
        return attr == 'false' ? 'true' : 'false';
      });
    });

    // Only show mobile nav if an element inside is receiving focus
    $('.navbar-menu').each(function () {
      var el = $(this);

      $('a', el).on('focus', function() {
        $(this).parents('li').addClass('hover');
      }).on('focusout', function() {
        $(this).parents('li').removeClass('hover');

        // if (smDown.matches) {
          // setTimeout(function () {
            // if ($(':focus').closest('#menu-main-menu').length == 0) {
            //   $('#menu-trigger').prop('checked', false);
            //   hideMobileNav();
            // }
          // }, 200);
        // }
      });
    });
  },
};
