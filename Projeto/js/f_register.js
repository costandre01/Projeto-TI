function registar() {
  //Guardar as credenciais numa variavel igual
  //estabelecer o erro igualando a uma constante
  let register_username = $("#r_tb_username").val();
  let register_password = $("#r_tb_password").val();
  let register_nivel = $("#r_tb_nivel").val();
  let error = 0;

  //Verificar o login e garantir que o utilizador preenche o campo username
  //Mostrar com erro quando nao estiver
  if(register_username === "") {
    error = 1;
    $("#r_tb_username").css("border", "1px solid red");
    $("#erro_register_username").css("display", "block");
    $("#erro_register_username").text("Campo Obrigatório!");
  } else {
    $("#r_tb_username").css("border", "");
    $("#erro_register_username").css("display", "none");
  }

  //Verificar o login e garantir que o utilizador preenche o campo password
  //Mostrar com erro quando nao estiver
  if(register_password === "") {
    error = 1;
    $("#r_tb_password").css("border", "1px solid red");
    $("#erro_register_password").css("display", "block");
    $("#erro_register_password").text("Campo Obrigatório!");
  } else {
    $("#r_tb_password").css("border", "");
    $("#erro_register_password").css("display", "none");
  }

  //Verificar o login e garantir que o utilizador preenche o campo nível
  //Mostrar com erro quando nao estiver
  if(register_nivel === "") {
    error = 1;
    $("#r_tb_nivel").css("border", "1px solid red");
    $("#erro_register_nivel").css("display", "block");
    $("#erro_register_nivel").text("Campo Obrigatório!");
  } else if (register_nivel != 1 && register_nivel != 2 && register_nivel != 3) {
    error = 1;
    $("#r_tb_nivel").css("border", "1px solid red");
    $("#erro_register_nivel").css("display", "block");
    $("#erro_register_nivel").text("Valor inválido!");
  } else {
    $("#r_tb_nivel").css("border", "");
    $("#erro_register_nivel").css("display", "none");
  }

  //Guarda os ficheiros preenchidos num ficheiro de texto
  if(error === 0) {
    $.ajax({
      url: 'query/f_register.php',
      method: 'post',
      dataType: 'text',
      data: {
        register: 'register',
        register_username: register_username,
        register_password: register_password,
        register_nivel: register_nivel
      },
      success: function(response) {
        console.log(response);
        // window.location = "index.php?page=paineldecontrolo";
      }
    });
  }
}
