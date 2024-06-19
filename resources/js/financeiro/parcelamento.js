document.addEventListener("DOMContentLoaded", function () {
  var formaPagamento = document.getElementById("forma_pagamento");
  var parcelamentoGroup = document.getElementById("parcelamento-group");
  var parcelamentoInput = document.getElementById("parcela");

  // Função para atualizar a visibilidade do campo de parcelamento
  function atualizarVisibilidadeParcelamento() {
    var valor = formaPagamento.value;
    if (valor === "credito" || valor === "boleto") {
      parcelamentoGroup.classList.remove("d-none");
      parcelamentoGroup.classList.add("d-flex");
      parcelamentoInput.required = true;
    } else {
      parcelamentoGroup.classList.remove("d-flex");
      parcelamentoGroup.classList.add("d-none");
      parcelamentoInput.required = false;
    }
  }

  // Inicializar a visibilidade do campo de parcelamento
  atualizarVisibilidadeParcelamento();

  // Adicionar o event listener para mudança na seleção
  formaPagamento.addEventListener("change", atualizarVisibilidadeParcelamento);
});
