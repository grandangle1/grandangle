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
        div.innerHTML += '<div class="container">' +
     '<div class="row">' +
         '<ul class="list-inline border border-secondary rounded m-auto p-4">' +
            '<li class="list-inline-item"><h3 class="pt-3 pr-3">' + name +' ' + surname +'</h3></li>' +
            '<li class="list-inline-item"><img src="'+ img+'" height="50", width="50" class="m-3"></li>' +
            '<li class="list-inline-item"><a href="index.php?p=Admin.artist.delete&artist=' + id + '" class="btn btn-danger">Supprimer</a></li>' +
            '<li class="list-inline-item"><a href="" class="btn btn-secondary">Infos</a></li>'
        '</ul>';
        '</div>'
        '</div>'
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

        xhr.send(data);
    },
    launch: function () {
        document.querySelector('.search-form').addEventListener('submit', artExpo.search);
    }
}

artExpo.launch();