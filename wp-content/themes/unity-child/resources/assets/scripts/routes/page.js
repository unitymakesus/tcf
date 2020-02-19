import countyMap from '../components/countyMap';

export default {
  init() {
    let countyMapElem = document.querySelectorAll('.county-map');
    if (countyMapElem.length) {
      countyMap();
    }
  },
};
