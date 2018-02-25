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


var adminMethods =  {
	currentOffset: 0,
	idExpos: ["" , "", "", ""],
	newExpo: function() {
		window.location = 'index.php?p=admin.expo.add';
	},
	getIdExpo: function(e, attr) {
		var type = e.srcElement.attributes[1].nodeValue;
		return adminMethods.idExpos[e.srcElement.attributes[attr].nodeValue];
	},
	deleteExpo: function(e) {
		var idExpo = adminMethods.getIdExpo(e, 2);
		var confirmDelete = confirm("Press a button!");
		if (confirmDelete == true) {
		    var xhr = utils.getXHR();
		    xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					if(xhr.responseText == "success") {
						adminMethods.loadWeek(adminMethods.currentOffset);
						var message = "L'exposition et son contenu à bien été supprimée";
						utils.echoMessage(message, 'success');
					} else {
						utils.echo(xhr.responseText);
					}
				}
			}
		}
		xhr.open('POST', '../App/Controller/ajax/deleteExpo.php', true);
		var data = new FormData();
		data.append('idExpo', idExpo);
		xhr.send(data);
		}
	},
	actionModif: function(e) {
        var type = e.srcElement.attributes[1].nodeValue;
        var idExpo = adminMethods.getIdExpo(e, 3);
		if(type == "editExpo") {
			window.location = "?p=admin.expo.edit&id=" + idExpo;
		} else if(type == "addOeuvre") {
            window.location = "?p=admin.oeuvre.add&id=" + idExpo;
		} else if(type == "listOeuvre") {
			window.location = "?p=admin.oeuvre.liste&page=1&id=" + idExpo;
		} else if(type == "pdfExpo") {
            window.open('?p=admin.expo.pdf&id=' + idExpo, '_blank');
		}
	},
	loadWeek: function(weekOffset) {
		adminMethods.currentOffset = weekOffset;
		var xhr = utils.getXHR();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					var data = JSON.parse(xhr.responseText);

					//console.log(xhr.responseText);
					//console.log(xhr.responseText);
					//utils.echo(xhr.responseText);
					for(var iu = 0; iu < 4; iu++) {
						var cell = document.querySelector('#cell' + iu);
						var tools = cell.querySelector('.exist').querySelectorAll('[spec="link"]');
						cell.querySelector('.date').innerHTML = "Expotion de la semaine " + data.weeks[iu];

						if(data[iu] != false) {
							utils.listener(tools, 'click', adminMethods.actionModif);
							cell.querySelector('.deleteExpo').addEventListener('click', adminMethods.deleteExpo);	
							cell.querySelector('.newExpo').style.display = "none";
							cell.querySelector('.newExpo').removeEventListener('click', adminMethods.newExpo);
							cell.querySelector('.nbOeuvre').innerHTML = data[iu].nbOeuvre;
							cell.querySelector('.exist').style.display = "inline";
							var contacts = cell.querySelectorAll('.contact');
							adminMethods.idExpos[iu] = data[iu].expo.idExpo;
							for(var ik = 0; ik < 3; ik++) {
								contacts[ik].innerHTML = data[iu].contact[ik];
							}

							var infos = cell.querySelectorAll('.info');
							for(var io = 0; io < infos.length; io++) {
								infos[io].style.display = "block";
							}
						} else {
							utils.noListener(tools, 'click', adminMethods.actionModif);
							cell.querySelector('.deleteExpo').removeEventListener('click', adminMethods.deleteExpo);
							cell.querySelector('.exist').style.display = "none";
							cell.querySelector('.newExpo').style.display = "inline";
							cell.querySelector('.newExpo').addEventListener('click', adminMethods.newExpo);

							var infos = cell.querySelectorAll('.info');
							for(var io = 0; io < infos.length; io++) {
								infos[io].style.display = "none";
							}
						}
					}
				}
			}
		}
		xhr.open('POST', '../App/Controller/ajax/getPlanning.php', true);
		var data = new FormData();
		data.append("weekOffset", weekOffset);
		xhr.send(data);
	},
	changePage: function(e) {
		adminMethods.loadWeek((parseInt(e.srcElement.attributes[2].nodeValue) + adminMethods.currentOffset));
	},
	reset: function() {
		adminMethods.loadWeek(0);
	},
    deleteType: function (e) {
		if(confirm("Voulez vous vraiment supprimer ce type d'eauvre?")) {
            window.location = "?p=admin.type.delete&id=" + e.srcElement.id;
		}
    },
	launch: function() {
		var pagination = document.querySelectorAll('.pagination');
		utils.listener(pagination, 'click', adminMethods.changePage);
		document.querySelector('.now').addEventListener('click', adminMethods.reset);
		utils.listener(document.querySelectorAll('.deleteType'), "click", adminMethods.deleteType);

		adminMethods.loadWeek(0);
	},
}

adminMethods.launch();
