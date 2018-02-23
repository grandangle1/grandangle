function echo(data) {
	document.querySelector('#php').innerHTML = data;
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
	'<div Auth="alert alert-' + type + ' fade show m-3" role="alert"> ' +
        '<strong>' + message + '</strong>' +
        	'<button type="button" Auth="close" data-dismiss="alert" aria-label="Close">' +
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
				if(xhr.responseText == "success") {
					window.location = "?p=admin.index.calendar";
				} else {
					/*var data = JSON.parse(xhr.responseText);
					methods.clearErrors();
					methods.showError(data);*/
					echo(xhr.responseText);
				}
			}
		}
	}
	xhr.open('POST', '../App/Controller/ajax/saveExpo.php', true);

	var form = document.querySelector('#form-expo');
    var file = document.querySelector('#file-artist').files;

	var data = new FormData(form);
    data.append('file', file[0]);
	var action = form.querySelector('button').getAttribute('action');
	if(action == "edit") {
        var url = new URL(window.location.href);
        var c = url.searchParams.get("id");
        data.append("idExpo", c);
	}
    data.append('action', action);
	xhr.send(data);
}



document.querySelector('#form-expo').addEventListener('submit', saveExpo);