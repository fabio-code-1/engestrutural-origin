document.addEventListener("DOMContentLoaded", function () {
  var formArquivoElement = document.getElementById("formArquivo");
  var submitButton = document.getElementById("submitButton");
  if (formArquivoElement && submitButton) {
    formArquivoElement.addEventListener("submit", function (event) {
      // Desativa o botão de submissão
      submitButton.disabled = true;
    });
  }
});
