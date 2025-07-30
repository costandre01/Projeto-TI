const url = new URLSearchParams(window.location.search);
const url_sensor = url.get("sensor");
// console.log(url_sensor);

// switch(url_sensor) {
//   case "h_qualidadeAr": // Carrega dados de qualidade do ar
//     $(".title_sensor").text("Qualidade do Ar");
//     // Ajax
//     carregarEstadoAtualSensor(url_sensor);
//     break;
//   case "h_temperaturaHumidade": // Carrega dados de temperatura/humidade
//     $(".title_sensor").text("Temperatura e Humidade");
//     // Ajax
//     carregarEstadoAtualSensor(url_sensor);
//     break;
//   case "h_luz": // Carrega dados de luz
//     $(".title_sensor").text("Luz");
//     // Ajax
//     carregarEstadoAtualSensor(url_sensor);
//     break;
//   default:
//     console.log("Sensor não reconhecido");
// }

if (url_sensor) {
  // Define título dinâmico com base no nome
  $(".title_sensor").text(formatarNomeSensor(url_sensor));

  // Carrega valor atual do sensor
  carregarEstadoAtualSensor(url_sensor);
} else {
  console.log("Sensor não definido na URL");
}

// Funções
function carregarEstadoAtualSensor(nomeSensor) {
  $.ajax({
    url: 'query/api_historico.php',
    method: 'GET',
    dataType: 'text',
    data: { nome: nomeSensor },
    success: function(response) {
      console.log("Valor atual do sensor:", response);
      $("#table").html(response); // Exemplo de uso em HTML
    },
    error: function(xhr) {
      console.error("Erro ao carregar valor:", xhr.responseText);
    }
  });
}

// Formata o nome do sensor em texto legível
function formatarNomeSensor(nome) {
  const mapa = {
    "amonio": "Qualidade do Ar",
    "temperatura": "Temperatura e Humidade",
    "luz": "Luz"
    // Adiciona mais se quiseres, ou deixa como fallback:
  };
  return mapa[nome] || nome.replace("h_", "").replace(/([A-Z])/g, ' $1');
}

// Primeira execução imediata
$(document).ready(function() {
setInterval(() => {
    carregarEstadoAtualSensor(url_sensor);
  }, 5000);
});