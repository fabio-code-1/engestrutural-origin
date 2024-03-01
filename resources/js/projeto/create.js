document.addEventListener("DOMContentLoaded", function () {
  let createButtons = document.querySelectorAll(".create-projeto-button");
  createButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      let clientId = this.getAttribute("data-cliente");
      let modalId = "#createProjeto";
      $(modalId).modal("show");
    });
  });
});
