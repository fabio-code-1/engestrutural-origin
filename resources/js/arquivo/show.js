document.addEventListener("DOMContentLoaded", function () {
  var showModalButtons = document.querySelectorAll(
    '[data-bs-target="#showModalArquivo"]'
  );

  showModalButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var descricaoArquivo = button.getAttribute("data-descricao");
      var tituloArquivo = button.getAttribute("data-titulo");
      var descricaoArquivoElement = document.querySelector(
        "#showModalArquivo .descricao-arquivo"
      );
      var tituloArquivoElement = document.querySelector(
        "#showModalArquivo .modal-title"
      );

      // Verifica se há uma descrição para o arquivo
      if (descricaoArquivo) {
        descricaoArquivoElement.textContent = descricaoArquivo;
      } else {
        descricaoArquivoElement.textContent =
          "Este arquivo não possui uma descrição.";
      }

      tituloArquivoElement.textContent =
        "Descrição do Arquivo - " + tituloArquivo;
    });
  });
});
