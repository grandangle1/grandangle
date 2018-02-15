function echo(data) {
	document.querySelector('#php').innerHTML += data;
}

function login(e) {
	e.preventDefault();
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			if(xhr.status != 200) {
				alert("Erreur de connexion avec le serveur");
			} else {
				if(xhr.responseText == "success") {
					window.location = "admin.php";
				} else {
					echo(xhr.responseText);
				}
			}
		}
	}

	xhr.open('POST', '../php/login.php', true);

	form = document.querySelector('#form-login');
	var data = new FormData(form);
	xhr.send(data);

}

if(document.querySelector('#form-login') !=  null) {
	document.querySelector('#form-login').addEventListener('submit', login);
}








