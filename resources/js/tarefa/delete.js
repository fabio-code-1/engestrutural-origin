document.addEventListener("DOMContentLoaded", function () {
  function confirmDelete(event) {
    event.preventDefault(); // Previne o envio automático do formulário
    var form = event.target.closest("form"); // Encontra o formulário mais próximo ao botão clicado

    // Exibe um alerta de confirmação personalizado
    if (confirm("Tem certeza que deseja excluir esta tarefa?")) {
      form.submit(); // Envia o formulário se o usuário confirmar
    }
  }

  // Adiciona um evento de clique para todos os botões de exclusão
  var deleteButtons = document.querySelectorAll(".delete-button-tarefa");
  deleteButtons.forEach(function (button) {
    button.addEventListener("click", confirmDelete);
  });
});
