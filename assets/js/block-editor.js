document.addEventListener("DOMContentLoaded", () => {
  globalMenuToggle();
});

function globalMenuToggle() {
  const crossMenuButton = document.querySelector(".js-menu");
  console.log(crossMenuButton);

  if (crossMenuButton) {
    crossMenuButton.addEventListener("click", (event) => {
      event.preventDefault();
      const menu = document.querySelector(".ly_header_navi");
      menu.classList.toggle("is-open");
      crossMenuButton.classList.toggle("is-open");
    });
  }
}
