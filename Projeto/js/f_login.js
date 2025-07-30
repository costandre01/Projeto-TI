function login() {
  //Guardar as credenciais numa variavel igual para confirmar se existe
  //estabelecer o erro igualando a uma constante
  let login_username = $("#l_tb_username").val();
  let login_password = $("#l_tb_password").val();
  let error = 0;

  //Verificar o login e garantir que o utilizador preenche o campo username
  //Mostrar com erro quando nao estiver
  if(login_username === "") {
    error = 1;
    $("#l_tb_username").css("border", "1px solid red");
    $("#erro_username").css("display", "block");
    $("#erro_username").text("Campo Obrigatório!");
  } else {
    $("#l_tb_username").css("border", "");
    $("#erro_username").css("display", "none");
  }

  //Verificar o login e garantir que o utilizador preenche o campo password
  //Mostrar com erro quando nao estiver
  if(login_password === "") {
    error = 1;
    $("#l_tb_password").css("border", "1px solid red");
    $("#erro_password").css("display", "block");
    $("#erro_password").text("Campo Obrigatório!");
  } else {
    $("#l_tb_password").css("border", "");
    $("#erro_password").css("display", "none");
  }


  //Verifica se as credenciais preenchidas são iguais a alguma combinação do ficheiro de texto
  if(error === 0) {
    $.ajax({
      url: 'query/f_login.php',
      method: 'post',
      dataType: 'text',
      data: {
        login: 'login',
        login_username: login_username,
        login_password: login_password
      },
      success: function(response) {
        if(response == "incorreto") {
          $("#error").text("Dados de Início de Sessão Incorretos");
        } else {
          window.location = "index.php?page=paineldecontrolo";
        }
      }
    });
  }
}

//Alternar entre pagina de registo e de login
$(document).on('click', '#btn_openRegister', function() {
  $("#d_login").hide();
  $("#d_registar").show();
});

$(document).on('click', '#btn_openLogin', function() {
  $("#d_registar").hide();
  $("#d_login").show();
});
