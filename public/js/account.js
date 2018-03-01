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




var accountMethods = {
    echoMessage: function(message, type, div) {
        var popup =
            '<div class="alert alert-' + type + ' fade show m-3" role="alert"> ' +
            '<strong>' + message + '</strong>' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>';

        if(div == "mdp") {
            document.querySelector('.echo-error-mdp').innerHTML += popup;
        } else {
            document.querySelector('.echo-error').innerHTML += popup;
        }
    },
    deleteAdmin: function (e) {
        if(confirm("Vous etes sur de vouloir supprimé cet administratauer??")) {
            window.location = 'index.php?p=Admin.account.delete&id=' + e.srcElement.parentElement.id;
        }
    },
    editAdmin: function (e) {
        document.querySelector('.edit-form').addEventListener('submit', this.checkExistence);
        document.querySelector('.mdp-form').removeEventListener('submit', this.saveNewPass);
        var infos = e.srcElement.parentElement.parentElement.querySelectorAll('.info');
        var formInputs = document.querySelectorAll('.edit-form .info');
        console.log(formInputs);
        console.log(infos);
        for(var io = 0; io < infos.length; io++) {console.log(
            infos[io].textContent);
            formInputs[io].value = infos[io].textContent;
        }

        var form =  document.querySelector('.edit-form');
        form.style.display = "block";
        document.querySelector('.mdp-form').style.display = "none";
        window.scrollBy(0, form.getBoundingClientRect().top);

    },
    closeForm: function () {
      document.querySelector('.edit-form').style.display = "none";
    },
    checkExistence: function (e) {
        var action = utils.get('p');
        if(action != "Admin.account.add") {
            e.preventDefault();
        }

        var xhr = utils.getXHR();

        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4) {
                if(xhr.status != 200) {
                    alert("Erreur durant la connexion au serveur");
                } else {
                    //utils.echo(xhr.responseText);
                    var resp = JSON.parse(xhr.responseText);
                    console.log(resp);
                    if(resp.resp == "success") {
                        document.querySelector(".edit-form").submit();

                    } else {
                        document.querySelector('.echo-error').innerHTML = "";
                        for(var pl = 0; pl < resp.length; pl++) {
                            accountMethods.echoMessage(resp[pl], "danger");
                        }
                    }
                }
            }
        }
        xhr.open("POST", "../App/Controller/ajax/checkExistence.php", true);

        var data = new FormData();
        var identifiant = document.querySelector('input[name="identifiant"]').value;
        if(!action == "Admin.account.add") {
            var id = document.querySelector('input[name="id"]').value;
            data.append("id", id);
        } else {
            data.append("id", "-1");
        }
        var email = document.querySelector('input[name="email"]').value;

        data.append("identifiant", identifiant);
        data.append("email", email);

        xhr.send(data);

    },
    checkMdps: function (e) {
        e.preventDefault();
        var password = document.querySelector('input[name="password"]').value;
        document.querySelector('.echo-error').innerHTML = "";
        if(password.length < 5) {
            accountMethods.echoMessage("Votre mot de passe doit faire plus de 5 characteres", "danger");
        } else {
            if(password !=  document.querySelector('input[name="passwordConfirm"]').value) {
                accountMethods.echoMessage("Les mots de passe ne sont pas identiques!", "danger");
            } else {
                accountMethods.checkExistence();
            }
        }
    },
    saveNewPass: function (e) {
        e.preventDefault();
        var password = document.querySelector('.mdp-form input[name="password"]').value;
        var showErr = document.querySelector('.echo-error-mdp');
        showErr.innerHTML = "";

        if(password.length < 5) {
            accountMethods.echoMessage("Le mot de passe doit faire + de 5 characteres", "danger", "mdp");
        } else if(password != document.querySelector('input[name="password-confirm"]').value) {
            accountMethods.echoMessage("Les mots de passe ne sont pas identique", "danger", "mdp");
        } else {
            var xhr = utils.getXHR();
            xhr.onreadystatechange = function () {
                if(xhr.readyState == 4) {
                    if(xhr.status != 200) {
                        alert("Erreur durant la co au serveur");
                    } else {
                        utils.echoMessage(xhr.responseText);
                        var resp = JSON.parse(xhr.responseText);
                        if(resp.resp == "success") {
                            utils.echoMessage("Le mot de passe à bien été modifier", "success");
                            document.querySelector('.mdp-form').style.display = "none";
                            document.querySelector('.mdp-form').removeEventListener('submit', accountMethods.saveNewPass);
                            utils.clear(document.querySelectorAll('.mdp-form input'));

                        } else {
                            utils.echoMessage("Erreur durant la sauvegarde du mot de passe, contatcter un dev", "danger");
                        }
                    }
                }
            }
            xhr.open('POST', '../App/Controller/ajax/saveMdp.php');

            var form = document.querySelector('.mdp-form');
            var data = new FormData(form);
            xhr.send(data);
        }
    },
    changePass: function()  {
        document.querySelector('.edit-form').removeEventListener('submit', this.checkExistence);
        var form = document.querySelector('.mdp-form');
        window.scrollBy(0, form.getBoundingClientRect().top);
        form.addEventListener('submit', accountMethods.saveNewPass);
        form.style.display = "block";
        document.querySelector(".edit-form").style.display = "none";
    },
    launch: function () {
        var action = utils.get('p');
        if(action != "Admin.account.add") {
            utils.listener(document.querySelectorAll('.delete-Admin'), "click", this.deleteAdmin);
            document.querySelector('.close-form').addEventListener("click", this.closeForm);
            utils.listener(document.querySelectorAll('.edit-Admin'), "click", this.editAdmin);
            document.querySelector('.change-password').addEventListener("click", this.changePass);
        } else {
            document.querySelector('.edit-form').addEventListener('submit', this.checkMdps);
        }

    }
}

accountMethods.launch();


























