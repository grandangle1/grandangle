var utils = {
    echo: function(data) {
        document.querySelector('#php').innerHTML = data;
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
        this.echo(popup);
    },
    get: function(field) {
        var url = new URL(window.location.href);
        return url.searchParams.get(field);
    },
    clear: function (inputs) {
        for(var pop = 0; pop < inputs.length; pop++) {
            inputs[pop].value = "";
        }
    }
}



var addArt = {
    addArtist: function (e) {
        e.preventDefault();
        var xhr = utils.getXHR();

        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4) {
                if(xhr.status != 200) {
                    alert("Erreur durant la connexion au serveur");
                } else {
                    //utils.echo(xhr.responseText);
                    var resp = JSON.parse(xhr.responseText);
                    if(resp.resp == "success") {
                        window.location = "?p=Admin.index.calendar";
                    } else {

                        utils.echo(xhr.responseText);
                    }
                }
            }
        }
        xhr.open('POST', '../App/Controller/ajax/saveArtist.php', true);

        var form = document.querySelector('#artist-form');
        var file = document.querySelector('#file-artist').files;

        var data = new FormData(form);
        data.append('file', file[0]);

        var action = form.querySelector('button').getAttribute('action');
        if(action == "edit") {
            var url = new URL(window.location.href);
            var c = url.searchParams.get("id");
            data.append("idArtist", c);
        }
        data.append('action', action);
        xhr.send(data);
    },
    launch: function () {
        document.getElementById("artist-form").addEventListener("submit", addArt.addArtist);
    }
}

addArt.launch();





























