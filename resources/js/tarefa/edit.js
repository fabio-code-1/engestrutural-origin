document.addEventListener("DOMContentLoaded", function () {
  var editModalButtons = document.querySelectorAll(
    '[data-bs-target="#tarefaedit"]'
  );

  editModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var tarefaId = button.getAttribute("data-tarefa-id");
      var tituloTarefa = button.getAttribute("data-tarefa-titulo");
      var descricaoTarefa = button.getAttribute("data-tarefa-descricao");
      var prazoTarefa = button.getAttribute("data-tarefa-prazo");
      var prioridadeTarefa = button.getAttribute("data-tarefa-prioridade");
      var statusTarefa = button.getAttribute("data-tarefa-status");

      // Preencher os campos ocultos com os dados da tarefa
      document.getElementById("idTarefa").value = tarefaId;
      document.getElementById("descricaoTarefa").value = descricaoTarefa;
      document.getElementById("tituloTarefa").value = tituloTarefa;
      document.getElementById("prazoTarefa").value = prazoTarefa;
      document.getElementById("prioridadeTarefa").value = prioridadeTarefa;
      document.getElementById("statusTarefa").value = statusTarefa;
    });
  });
});
