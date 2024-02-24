document.addEventListener("DOMContentLoaded", function () {
  var showModalButtons = document.querySelectorAll(
    '[data-bs-target="#showModal"]'
  );

  showModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var descricaoTarefa = button.getAttribute("data-descricao");
      var tituloTarefa = button.getAttribute("data-titulo");
      var descricaoTarefaElement = document.querySelector(".descricao-tarefa");
      var tituloTarefaElement = document.querySelector(".titulo-tarefa");

      descricaoTarefaElement.textContent = descricaoTarefa;
      tituloTarefaElement.textContent = tituloTarefa;
    });
  });
});
