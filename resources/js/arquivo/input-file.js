document.addEventListener("DOMContentLoaded", function () {
  var filesElement = document.getElementById("files");
  if (filesElement) {
    filesElement.addEventListener("change", function () {
      // Exibe o nome do arquivo selecionado
      var fileNameElement = document.getElementById("selectedFile");
      if (fileNameElement) {
        var fileName = this.files[0].name;
        fileNameElement.innerText = fileName;
      }
    });
  }
});
