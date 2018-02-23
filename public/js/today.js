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
    }
}

var methods = {
    showOeuvres: function (e) {
        var salle = e.srcElement.id;
        if(document.querySelector('.show-expo') != undefined) {
            document.querySelector('.show-expo').classList.remove("show-expo");
        }
        document.querySelector('.'+salle).classList.add("show-expo");
        window.scrollBy(0, document.querySelector('.'+salle).getBoundingClientRect().top);
    },
    launch: function () {
        utils.listener(document.querySelectorAll('.salle'), "click", this.showOeuvres);

    }
}
methods.launch();