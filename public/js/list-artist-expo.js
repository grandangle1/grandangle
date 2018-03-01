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


var listArtMet = {
    actListArtMet: function (e) {
        var idArt = e.srcElement.parentElement.id;
      if(e.srcElement.id == "edit") {
          window.location = 'index.php?p=Admin.artist.edit&id=' + idArt;
        } else if(e.srcElement.id == "remove") {
          window.location = 'index.php?p=Admin.expo.remove_artist&artist=' + idArt + '&expo=' + utils.get('id');
        }
    },
    launch: function () {
        utils.listener(document.querySelectorAll('.action-container img'), "click", listArtMet.actListArtMet);
    }
}

listArtMet.launch();














