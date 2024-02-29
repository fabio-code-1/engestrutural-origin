document.addEventListener("DOMContentLoaded", function () {
  let editButtons = document.querySelectorAll(".edit-button");
  editButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      let clientId = this.getAttribute("data-cliente");
      let modalId = "#editModal" + clientId;
      $(modalId).modal("show");
    });
  });
});
