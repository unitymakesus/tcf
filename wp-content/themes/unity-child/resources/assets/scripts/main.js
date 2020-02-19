import 'custom-event-polyfill';
import 'picturefill';

/** Import autoloaded dependencies */
import './autoload/*';

/** Import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import page from './routes/page';
import templateEvents from './routes/templateEvents';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  page,
  templateEvents,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
