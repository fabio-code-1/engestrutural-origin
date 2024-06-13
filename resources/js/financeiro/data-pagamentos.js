document.getElementById("cliente").addEventListener("change", function () {
  var clienteId = this.value;
  var projetos = JSON.parse(
    this.options[this.selectedIndex].getAttribute("data-projetos")
  );
  var projetoSelect = document.getElementById("projeto");

  // Limpa o dropdown de projetos
  projetoSelect.innerHTML =
    '<option value="" selected disabled>Escolha um projeto</option>';

  // Adiciona os projetos do cliente selecionado ao dropdown
  Object.keys(projetos).forEach(function (id) {
    var option = document.createElement("option");
    option.value = id;
    option.textContent = projetos[id];
    projetoSelect.appendChild(option);
  });
});
