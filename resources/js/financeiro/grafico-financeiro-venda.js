// Importar a biblioteca Chart.js
import Chart from "chart.js/auto";

// Acessar o elemento HTML com a classe "grafico-vendas"
var elemento = document.querySelector(".grafico-vendas");

// Verificar se o elemento foi encontrado
if (elemento) {
  // Recuperar os dados da propriedade "data-projetos"
  var projetosJson = elemento.getAttribute("data-projetos");

  // Converter os dados para um objeto JavaScript, se necessário
  var projetosObjeto = JSON.parse(projetosJson);

  // Variáveis para armazenar as somas
  var somaArquitetura = 0;
  var somaEngenharia = 0;
  var somaHidraulica = 0;
  var somaEletrica = 0;

  // Iterar sobre cada objeto no array
  projetosObjeto.forEach(function (projeto) {
    // Acessar os valores específicos de cada objeto e verificar se não são nulos
    if (projeto.valor_arquitetonico !== null) {
      somaArquitetura += parseFloat(projeto.valor_arquitetonico);
    }
    if (projeto.valor_estrutural !== null) {
      somaEngenharia += parseFloat(projeto.valor_estrutural);
    }
    if (projeto.valor_hidraulica !== null) {
      somaHidraulica += parseFloat(projeto.valor_hidraulica);
    }
    if (projeto.valor_eletrica !== null) {
      somaEletrica += parseFloat(projeto.valor_eletrica);
    }
  });

  // Função para formatar os valores em formato monetário
  function formatarValorMonetario(valor) {
    return valor.toLocaleString("pt-BR", {
      style: "currency",
      currency: "BRL",
    });
  }

  // Renderizar o gráfico de barras
  var ctx = document.getElementById("myChart-venda").getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Arquitetura", "Engenharia", "Hidráulica", "Elétrica"],
      datasets: [
        {
          label: "Maiores Vendas",
          data: [somaArquitetura, somaEngenharia, somaHidraulica, somaEletrica],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(255, 206, 86, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(255, 206, 86, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true, // Iniciar o eixo Y a partir do zero
          ticks: {
            callback: function (value, index, values) {
              return formatarValorMonetario(value); // Formatar o valor como monetário
            },
          },
        },
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              var label = context.dataset.label || "";
              if (label) {
                label += ": ";
              }
              label += formatarValorMonetario(context.parsed.y);
              return label;
            },
          },
        },
      },
    },
  });
}
