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
      var tituloTarefaElement = document.querySelector(".titulo-projeto");

      descricaoProjetoElement.textContent = descricaoProjeto;
      tituloTarefaElement.textContent = tituloProjeto;
    });
  });
});
