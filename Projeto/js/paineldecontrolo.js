// Lista de sensores (nomes = nomes das pastas)
const sensores = ['amonio', 'benzeno', 'oxidoNitrogenio', 'dioxidoCarbono', 'alcool', 'fumo', 'temperatura', 'humidade', 'luz', 'porta'];

function carregarValoresSensores(sensores, callback) {
const resultados = {};
let pendentes = sensores.length;

sensores.forEach(function(nomeSensor) {
    $.ajax({
    url: 'query/api.php',
    method: 'GET',
    data: { nome: nomeSensor },
    success: function(valor) {
        //console.log(valor);
        resultados[nomeSensor] = valor;
        pendentes--;
        if (pendentes === 0 && typeof callback === "function") {
        callback(resultados);
        }
    },
    error: function(xhr) {
        resultados[nomeSensor] = "Erro";
        pendentes--;
        if (pendentes === 0 && typeof callback === "function") {
        callback(resultados);
        }
    }
    });
});
}

// Atualiza os valores a cada 5 segundos
function atualizarSensoresPeriodicamente() {
carregarValoresSensores(sensores, function(valores) {
    for (const nome in valores) {
    const id = `#valor-${nome}`;
    //console.log(nome);
    $(id).text(valores[nome]);
    }
});
}

// Primeira execução imediata
$(document).ready(function() {
  atualizarSensoresPeriodicamente();
  setInterval(atualizarSensoresPeriodicamente, 5000); // 5 segundos
});

// Ligar Switches
$('#buzzerSwitch').on('change', function () {
  let buzzerLigado = $(this).is(':checked');
  let nomeSensor = 'buzzer';
  let valor = buzzerLigado ? 'Ligado' : 'Desligado';
  let hora = new Date().toISOString().slice(0, 19).replace('T', ' ');

  $.ajax({
    url: 'query/api.php',
    method: 'POST',
    data: {
      nome: nomeSensor,
      valor: valor,
      hora: hora
    },
    success: function(response) {
      console.log(`Estado do buzzer enviado: ${valor}`);
    },
    error: function(xhr, status, error) {
      console.error('Erro ao enviar dados para a API:', error);
    }
  });
});

$('#luzSwitch').on('change', function () {
    const luzLigada = $(this).is(':checked');
    const valor = luzLigada ? 'Ligado' : 'Desligado';
    const nomeSensor = 'luz';
    const hora = new Date().toISOString().slice(0, 19).replace('T', ' ');

    $.ajax({
      url: 'query/api.php',
      method: 'POST',
      data: {
        nome: nomeSensor,
        valor: valor,
        hora: hora
      },
      success: function(response) {
        console.log(`Estado da luz enviado: ${valor}`);
      },
      error: function(xhr, status, error) {
        console.error('Erro ao comunicar com a API:', error);
      }
    });
  });

  $('#portaSwitch').on('change', function () {
   const portaAberta = $(this).is(':checked');
   const valor = portaAberta ? 'Aberta' : 'Fechada';
   const nomeSensor = 'porta';
   const hora = new Date().toISOString().slice(0, 19).replace('T', ' ');

   $.ajax({
     url: 'query/api.php',
     method: 'POST',
     data: {
       nome: nomeSensor,
       valor: valor,
       hora: hora
     },
     success: function(response) {
       console.log('Estado da porta enviado: ${valor}');
     },
     error: function(xhr, status, error) {
       console.error('Erro ao comunicar com a API:', error);
     }
   });
 });

function obterEstadoSensor(nomeSensor) {
  $.ajax({
    url: 'query/api.php',
    method: 'GET',
    data: {
      nome: nomeSensor
    },
    success: function(resposta) {
      resposta = resposta.trim();
      console.log(`Estado atual de ${nomeSensor}: ${resposta}`);
 
      // Exemplo: atualizar um switch manualmente com base na resposta
      if (nomeSensor === 'luz') {
        $('#luzSwitch').prop('checked', resposta === 'Ligado');
      } else if (nomeSensor === 'buzzer') {
        $('#buzzerSwitch').prop('checked', resposta === 'Ligado');
      } else if (nomeSensor === 'porta') {
        $('#portaSwitch').prop('checked', resposta === 'Aberta');
      }
    },
    error: function(xhr, status, error) {
      console.error(`Erro ao obter estado de ${nomeSensor}:`, error);
    }
  });
}
 
$(document).ready(function () {
  obterEstadoSensor('luz');
  obterEstadoSensor('buzzer');
  obterEstadoSensor('porta');
});


$('#capturarImagem').on('click', function () {
  // Passo 1: POST para api.php
  const nome = "imagem";
  const valor = "Sim";
  const hora = new Date().toISOString().slice(0, 19).replace('T', ' ');
 
  $.ajax({
    url: 'query/api.php',
    method: 'POST',
    data: {
      nome: nome,
      valor: valor,
      hora: hora
    },
    success: function (response) {
      console.log("POST feito com sucesso:", response);
 
      // Passo 2: GET para verificar a imagem
      atualizarImagem();
    },
    error: function (xhr, status, error) {
      console.error("Erro ao fazer POST para api.php:", error);
    }
  });
});

// Função que verifica periodicamente se a imagem existe
function atualizarImagem() {
  $.ajax({
    url: 'query/upload.php',
    method: 'GET',
    dataType: 'json', // Espera JSON
    success: function (resposta) {
      console.log(resposta.imagem); //
      if (resposta.imagem && resposta.imagem.includes('webcam.jpg')) {
        const timestamp = new Date().getTime();
        $('#webcamImagem').attr('src', 'files/imagem/webcam.jpg?t=' + timestamp);
        console.log("Imagem atualizada.");
 
        if (resposta.hora) {
          $('#horaImagem').text("Imagem capturada em: " + resposta.hora);
        }
      } else {
        console.warn("Imagem não encontrada ou resposta inválida.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Erro ao obter imagem via upload.php:", error);
    }
  });
}

$(document).ready(function () {
  setInterval(atualizarImagem, 5000); // Atualiza a cada 5 segundos
});