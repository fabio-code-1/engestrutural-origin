document.addEventListener("DOMContentLoaded", function () {
  let editButtons = document.querySelectorAll(".edit-projeto-button");
  editButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      let projetoId = this.getAttribute("data-projeto");
      let modalId = "#editProjeto" + projetoId;
      $(modalId).modal("show");
    });
  });
});
