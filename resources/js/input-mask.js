import Inputmask from "inputmask";

// Aplicar máscara de CNPJ
Inputmask("99.999.999/9999-99", {
  placeholder: " ",
  clearIncomplete: true,
  showMaskOnHover: false,
}).mask(".input-cnpj");

// Aplicar máscara de telefone
Inputmask("(99) 99999-9999", {
  placeholder: " ",
  clearIncomplete: true,
  showMaskOnHover: false,
}).mask(".input-telefone");

// Aplicar máscara de cpf
Inputmask("999.999.999-99", {
  placeholder: " ",
  clearIncomplete: true,
  showMaskOnHover: false,
}).mask(".input-cpf");

// Aplicar máscara de valor
Inputmask("currency", {
  prefix: "R$ ",
  alias: "numeric",
  autoGroup: true,
  digits: 2,
  digitsOptional: false,
  placeholder: "0",
  rightAlign: false,
}).mask(".input-valor");
