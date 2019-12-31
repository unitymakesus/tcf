// Import parent JS
// import '../../../../unity-core/dist/scripts/main.js';

/** Import autoloaded dependencies */
import './autoload/*';

/** Import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import archive from './routes/archive';
import templateEvents from './routes/templateEvents';
import whyTheTriangle from './routes/whyTheTriangle';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  home,
  aboutUs,
  archive,
  templateEvents,
  whyTheTriangle,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
