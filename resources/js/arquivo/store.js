document.addEventListener("DOMContentLoaded", function () {
  var formArquivoElement = document.getElementById("formArquivo");
  if (formArquivoElement) {
    formArquivoElement.addEventListener("submit", function (event) {
      var progressBar = document.getElementById("progressBar");
      var progressContainer = document.querySelector(".progress");
      var filesInput = document.getElementById("files");
      var alert = document.getElementById("alert-arquivo");

      // Verifica se um arquivo foi selecionado
      if (
        !filesInput.files ||
        filesInput.files.length === 0 ||
        !filesInput.files[0]
      ) {
        alert.innerText = "Selecione um arquivo antes de enviar o formulário.";
        return;
      }

      // Exibe a barra de progresso ao iniciar o upload
      alert.style.display = "block";

      // Bloqueia a página
      document.body.style.pointerEvents = "none";

      // Impede o envio padrão do formulário
      event.preventDefault();

      // Verifica se o formulário já foi enviado
      if (this.getAttribute("data-submitted") === "true") {
        return;
      }

      // Define o atributo de formulário enviado para true para evitar envios duplicados
      this.setAttribute("data-submitted", "true");

      var formData = new FormData(this); // Cria um objeto FormData para enviar os dados do formulário

      // Função para atualizar o progresso do upload
      function updateProgress(event) {
        if (event.lengthComputable) {
          var percentComplete = (event.loaded / event.total) * 100;
          // Limita o número de casas decimais para duas
          percentComplete = percentComplete.toFixed(2);
          progressBar.style.width = percentComplete + "%";
          progressBar.innerHTML = percentComplete + "%";
        }
      }

      // Adiciona um ouvinte de evento de progresso para atualizar a barra de progresso
      var xhr = new XMLHttpRequest();
      xhr.upload.addEventListener("progress", updateProgress);

      // Adiciona um ouvinte de evento de carregamento para recarregar a página após o upload
      xhr.addEventListener("load", function () {
        window.location.reload();
      });

      // Envia a requisição para o servidor
      xhr.open("POST", this.action, true);
      xhr.setRequestHeader(
        "X-CSRF-TOKEN",
        document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content")
      );
      xhr.send(formData);
    });
  }
});
