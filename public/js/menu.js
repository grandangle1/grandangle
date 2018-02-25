var utilsMenu = {
    echoMessage : function(message, type) {
		var popup =
			'<div class="alert alert-' + type + ' fade show m-3" role="alert"> ' +
			'<strong>' + message + '</strong>' +
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
			'<span aria-hidden="true">&times;</span>' +
			'</button>' +
			'</div>';
   		 this.echo(popup);
	},
    echo : function(data) {
		document.querySelector('#php').innerHTML = data;
	},
    listener: function(array, type, action) {
        for(var yu = 0; yu < array.length; yu++) {
            array[yu].addEventListener(type, action);
        }
    },
}


var methods = {
    login: function(e) {
		e.preventDefault();
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("Erreur de connexion avec le serveur");
				} else {
					if(xhr.responseText == "success") {
						window.location = "?p=admin.index.calendar";
					} else {
						//console.log(xhr.responseText);
						//utilsMenu.echoMessage(xhr.responseText);
						utilsMenu.echoMessage(JSON.parse(xhr.responseText), 'danger');
					}
				}
			}
		}

		xhr.open('POST', '../App/Controller/ajax/login.php', true);

		form = document.querySelector('#form-login');
		var data = new FormData(form);
		xhr.send(data);
	},
	launch: function () {
        if(document.querySelector('#form-login') !=  null) {
            document.querySelector('#form-login').addEventListener('submit', this.login);
        }
    }
}


methods.launch();








