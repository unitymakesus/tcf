import 'jquery-accessible-accordion-aria';

const countyMap = () => {
  $('.js-accordion').accordion({ buttonsGeneratedContent: 'html' });

  $('.counties__active path').on('click', function() {
    let county = $(this).data('county');

    switch (county) {
      case 'chatham':
        $('.js-accordion button:nth-of-type(2)').trigger('click');
        break;
      case 'durham':
        $('.js-accordion button:nth-of-type(3)').trigger('click');
        break;
      case 'orange':
        $('.js-accordion button:nth-of-type(4)').trigger('click');
        break;
      case 'wake':
        $('.js-accordion button:nth-of-type(5)').trigger('click');
        break;
      default:
        $('.js-accordion button:nth-of-type(1)').trigger('click');
    }
  });
}

export default countyMap;
