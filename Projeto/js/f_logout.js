//Fazer um pedido para o logout
function logout() {
  var url = window.location.href.split('?')[0];

  $.ajax({
    url: 'query/f_logout.php',
    method: 'post',
    dataType: 'text',
    data: {
      logout: "logout"
    },
    success: function() {
      location.replace(url);
    }
  });
}
