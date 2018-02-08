function echo(data) {
	document.querySelector('#php').innerHTML += data;
}

var methods = {
	clearErrors: function() {
		var inputs = document.querySelectorAll('input');
		
		for (var ii = 0; ii < inputs.length; ii++) {
			inputs[ii].classList.remove('bg-danger');
		}
		var textarea = document.querySelectorAll('textarea');
		for (var kk = 0; kk < textarea.length; kk++) {
			textarea[kk].classList.remove('bg-danger');
		}

		var alerts = document.querySelectorAll('.alert');
		for (var ke = 0; ke < textarea.length; ke++) {
			alerts[ke].style.display = "none";
			alerts[ke].style.innerHTML = "";
		}
	}, 
	showError: function(data) {
		for(var errorNum = 0; errorNum < data.length; errorNum++ ) {
			document.querySelector('[name="' + data[errorNum][0] + '"]').classList.add('bg-danger');
			var alert = document.querySelector('.alert.' + data[errorNum][0] + '');
			alert.innerHTML = data[errorNum][1];
			alert.style.display = "block";
		}
	}
};

function echoMessage(message, type) {
	var popup = 
	'<div class="alert alert-' + type + ' fade show m-3" role="alert"> ' +    
        '<strong>' + message + '</strong>' +
        	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
          	'<span aria-hidden="true">&times;</span>' +
        '</button>' +
    '</div>';
	echo(popup);
}

function saveExpo(e) {
	e.preventDefault();
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			if(xhr.status != 200) {
				alert("Erreur durant la connexion au serveur");
			} else {
				console.log(xhr.responseText);
				if(xhr.responseText == "success") {
					window.location = "admin.php";
				} else {
					var data = JSON.parse(xhr.responseText);
					methods.clearErrors();
					methods.showError(data);
				}
			}
		}
	}
	xhr.open('POST', '../php/saveExpo.php', true);

	var form = document.querySelector('#form-expo');
	var data = new FormData(form);
	xhr.send(data);
}



document.querySelector('#form-expo').addEventListener('submit', saveExpo);