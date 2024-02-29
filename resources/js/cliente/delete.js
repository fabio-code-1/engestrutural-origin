document.addEventListener("DOMContentLoaded", function () {
  let deleteButtons = document.querySelectorAll(".delete-button");
  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // Evita o envio do formulário
      let clientId = this.getAttribute("data-cliente");
      if (confirm("Tem certeza que deseja deletar este cliente?")) {
        document.getElementById("deleteForm" + clientId).submit();
      }
    });
  });
});
