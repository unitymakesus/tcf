import 'custom-event-polyfill';
import 'focus-within-polyfill';
import 'picturefill';

/** Import autoloaded dependencies */
import './autoload/*';

/** Import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import templateEvents from './routes/templateEvents';
import whyTheTriangle from './routes/whyTheTriangle';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  templateEvents,
  whyTheTriangle,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
