var utils = {
    echo: function(data) {
        document.querySelector('#php').innerHTML = data;
    },
    echo2: function(data) {
        document.querySelector('#php').innerHTML += data;
    },
    getXHR: function() {
        try {
            return new XMLHttpRequest();
        }
        catch (e) {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                try {
                    return new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
    },
    listener: function(array, type, action) {
        for(var yu = 0; yu < array.length; yu++) {
            array[yu].addEventListener(type, action);
        }
    },
    noListener: function(array, type, action) {
        for(var yu = 0; yu < array.length; yu++) {
            array[yu].removeEventListener(type, action);
        }
    },
    echoMessage: function(message, type) {
        var popup =
            '<div class="alert alert-' + type + ' fade show m-3" role="alert"> ' +
            '<strong>' + message + '</strong>' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';
        this.echo2(popup);
    },
    get: function(field) {
        var url = new URL(window.location.href);
        return url.searchParams.get(field);
    }
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
    },

}

function checkEmpty(file) {
    var fine = true;
    var url = new URL(window.location.href);
    var page = url.searchParams.get("p");
    if(file.length === 0 && page == "Admin.oeuvre.add"){ utils.echoMessage("Veuillez choisir un fichier!", "info"); fine = false;}
    if(document.querySelector('select').value === "none"){ utils.echoMessage("Veuillez renseigner un type d'oeuvre", "info"); fine = false;}
    if(document.querySelectorAll('[name="salle"]:checked').length === 0) {utils.echoMessage('Veuillez renseigner une salle', "info"); fine = false}
    return fine;
}
var test = {

    addOeuvre: function(e) {
        e.preventDefault();
        var xhr = utils.getXHR();

        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4) {
                if(xhr.status != 200) {
                    alert("Erreur durant la connexion au serveur");
                } else {
                    var resp = JSON.parse(xhr.responseText);
                    if(resp.resp == "modified") {
                        window.location = "?p=Admin.index.calendar";
                    } else if(resp.resp == "added") {
                        window.location = "?p=Admin.oeuvre.add&id=" + utils.get("id");
                    }
                }
            }
        }

        xhr.open('POST', '../App/Controller/ajax/actionOeuvre.php', true);

        var form = document.querySelector('.form-oeuvre');
        var file = document.querySelector('#file-oeuvre').files;
        document.querySelector('#php').innerHTML = "";

        if(checkEmpty(file) == true) {
            var url = new URL(window.location.href);
            var id = url.searchParams.get("id");
            var data = new FormData(form);
            data.append("idType", document.querySelector('select').value);
            if(file.length > 0) {
                data.append('file', file[0]);
            }
            if (form.querySelector('button').classList.contains('edit')) {
                data.append("idOeuvre", id);
                data.append('action', 'edit');
            }
            else {
                data.append("idExpo", id);
                data.append('action', 'add');
            }
            xhr.send(data);
        }
    }
}



document.querySelector('.form-oeuvre').addEventListener('submit', test.addOeuvre);