$(document).ready(function(){
	$('#username').focus();
	$('#login').click(function(){
		var username = $('#username');
		var password = $('#password');
		var login_result = $('.login_result'); 
		login_result.html('loading..'); 
		if(username.val() == ''){ 
			username.focus(); 
			login_result.html('<span class="error">Escribe el nombre del usuario</span>');
			return false;
		}
		if(password.val() == ''){ 
			password.focus();
			login_result.html('<span class="error">Escribe la contraseña</span>');
			return false;
		}
		if(username.val() != '' && password.val() != ''){ 
			var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(data)
			{
				if(data == 0)
				{
					login_result.html('<span class="error">El Usuario o la contraseña son incorrectos</span>');
				}
				else if(data == 1)
				{
					window.location = 'index.php';
					
				}
				else
				{
					alert('Error');
				}
			}
			});
		}
		return false;
	});
});
