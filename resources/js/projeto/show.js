document.addEventListener("DOMContentLoaded", function () {
  var showModalButtons = document.querySelectorAll(
    '[data-bs-target="#showProjeto"]'
  );

  showModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var descricaoProjeto = button.getAttribute("data-descricao");
      var tituloProjeto = button.getAttribute("data-titulo");
      var descricaoProjetoElement =
        document.querySelector(".descricao-projeto");
      var tituloProjetoElement = document.querySelector(".titulo-projeto");

      descricaoProjetoElement.textContent = descricaoProjeto;
      tituloProjetoElement.textContent = tituloProjeto;

      var modal = new bootstrap.Modal(document.getElementById("showProjeto"));
      modal.show();
    });
  });
});
