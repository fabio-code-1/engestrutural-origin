document.addEventListener("DOMContentLoaded", function () {
  var submitButton = document.querySelector(
    "#formArquivo button[type='submit']"
  );
  if (submitButton) {
    submitButton.addEventListener("click", function (event) {
      // Oculta o modal
      $("#create-arquivo").modal("hide");
    });
  }
});
