const dropdownToggles = () => {
  // missing forEach on NodeList for IE11
  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  let dropdownToggles = document.querySelectorAll('.dropdown__toggle');
  if (dropdownToggles.length) {
    dropdownToggles.forEach(toggle => {
      toggle.addEventListener('click', function(e) {
        let expanded = this.getAttribute('aria-expanded');
        this.setAttribute('aria-expanded', expanded === 'false' ? 'true' : 'false');

        e.preventDefault();
        return false;
      });
    });
  }
}

export default dropdownToggles;
