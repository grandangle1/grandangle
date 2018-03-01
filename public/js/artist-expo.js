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


var artExpo = {
    showArtist: function (name, surname, img, id) {
        var div = document.querySelector('.show-artist');
      div.innerHTML += '<div>' +
      '<h3>' + name +' ' + surname +'</h3>' +
      '     <img src="'+ img+'" height="50", width="50">' +
          ' <a href="index.php?p=Admin.artist.assign&artist=' + id +'&expo='+ utils.get('id')+'" class="btn btn-success">choisir</a>' +
          '<a href="" class="btn btn-primary">Voir</a>'
      '</div>';
    },
    search: function (e) {
        e.preventDefault();
        var search = document.querySelector('.searchVal').value;
        if(search.length < 3) {
            utils.echoMessage("Au moin 3 characteres", "warning");
            return false;
        }
        var xhr = utils.getXHR();

        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4) {
                if(xhr.status != 200) {
                    alert("erreur");
                } else {

                    //utils.echo(xhr.responseText);
                    var resp = JSON.parse(xhr.responseText);
                    document.querySelector('.show-artist').innerHTML = "";
                    if(resp == "false") {
                        utils.echoMessage("Il n'y a pas d'artiste correspondant à cette recherche.", "info")
                    } else {
                        for(var kj = 0; kj < resp.length; kj++) {
                            artExpo.showArtist(resp[kj].nameArtist, resp[kj].surnameArtist, resp[kj].urlImg, resp[kj].idArtist);
                        }
                    }
                }
            }
        }

        xhr.open("POST", "../App/Controller/ajax/searchArtist.php", true);

        var data = new FormData();
        data.append("search", search);
        data.append("idExpo", utils.get('id'));
        xhr.send(data);
    },
    launch: function () {
        document.querySelector('.search-form').addEventListener('submit', artExpo.search);
    }
}

artExpo.launch();


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
        var idExpo = utils.get('id');

        data.append('action', "add");
        data.append("idExpo", idExpo);
        xhr.send(data);
    },
    launch: function () {
        document.getElementById("artist-form").addEventListener("submit", addArt.addArtist);
    }
}

addArt.launch();






