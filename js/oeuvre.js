var idExpo = 8;
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

function addOeuvre(e) {
	e.preventDefault();
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			if(xhr.status != 200) {
				alert("Erreur durant la connexion au serveur");
			} else {
				echo(xhr.responseText);
				if(xhr.responseText == "success") {
					window.location = "admin.php";
				}
			}
		}
	}

	xhr.open('POST', '../php/actionOeuvre.php', true);

	var form = document.querySelector('.form-oeuvre');
	var file = document.querySelector('#file-oeuvre').files;
	var data = new FormData(form);
	data.append('file', file[0]);
	if(form.querySelector('button').classList.contains('edit')) {
		data.append('action', 'edit');
	} else {
		data.append('action', 'add');
	}
	xhr.send(data);
}




document.querySelector('.form-oeuvre').addEventListener('submit', addOeuvre);