import 'jquery-accessible-accordion-aria';

export default {
  finalize() {
    $('.js-accordion').accordion({ buttonsGeneratedContent: 'html' });
  },
}
