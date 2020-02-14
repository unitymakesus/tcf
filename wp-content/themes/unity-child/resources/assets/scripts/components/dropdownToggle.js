const dropdownToggles = () => {
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
