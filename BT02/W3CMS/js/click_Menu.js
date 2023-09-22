const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(function (dropdown) {
    const activeBtn = dropdown.querySelector('.nav-link');
    const dropdownMenuer = dropdown.querySelector('.dropdown-menuer');

    activeBtn.addEventListener('click', function (event) {
        event.preventDefault();

        const isDropdownActive = dropdownMenuer.classList.contains('show');

        closeAllDropdowns();

        if (!isDropdownActive) {
            dropdownMenuer.style.display = 'block';
            activeBtn.classList.add('mm-active');
            dropdownMenuer.classList.add('show');
        }
    });
});

function closeAllDropdowns() {
    dropdowns.forEach(function (dropdown) {
        const activeBtn = dropdown.querySelector('.nav-link');
        const dropdownMenuer = dropdown.querySelector('.dropdown-menuer');

        dropdownMenuer.style.display = 'none';
        dropdownMenuer.classList.remove('show');
        activeBtn.classList.remove('mm-active');
    });
}

const dropdownSubs = document.querySelectorAll('.dropdown-sub');

dropdownSubs.forEach(function (dropdown) {
  dropdown.addEventListener('click', function (event) {
    event.preventDefault();
    const dropdownMenuer = dropdown.nextElementSibling;

    if (dropdownMenuer.style.display === "none") {
      dropdownMenuer.style.display = 'block';
      dropdown.classList.add("show");
    } else {
      dropdownMenuer.style.display = 'none';
      dropdown.classList.remove('show');
    }
  });
});