
var utils = {
	echo: function(data) {
		document.querySelector('.php').innerHTML += data;
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
    }
}


var adminMethods =  {
	currentOffset: 0,
	idExpos: ["" , "", "", ""],
	newExpo: function(e) {
		//console.log(e);
	},
	deleteExpo: function() {
		var confirmDelete = confirm("Press a button!");
		if (confirmDelete == true) {
		    var xhr = utils.getXHR();
		    xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					
				}
			}
		}
		xhr.open('POST', '', true);
		xhr.send();
		}
	},
	actionModif: function(e) {
		var xhr = utils.getXHR();
		var type = e.srcElement.attributes[1].nodeValue;
		var idExpo = adminMethods.idExpos[e.srcElement.attributes[3].nodeValue];
		    xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					if(xhr.responseText == "success") {
						window.location = type +'.php';
					} else {
						alert("Erreur durant la conenxion au serveur");
					}
				}
			}
		}
		xhr.open('POST', '../php/setId.php', true);
		var data = new FormData();
		data.append('idExpo', idExpo);
		xhr.send(data);
	},
	loadWeek: function(weekOffset) {
		var xhr = utils.getXHR();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					var data = JSON.parse(xhr.responseText);
					//utils.echo(xhr.responseText);
					//console.log(xhr.responseText);
					for(var iu = 0; iu < data.length; iu++) {
						var cell = document.querySelector('#cell' + iu);
						var tools = cell.querySelector('.exist').querySelectorAll('[spec="link"]');
						if(data[iu] != false) {
							utils.listener(tools, 'click', adminMethods.actionModif);
							cell.querySelector('.deleteExpo').addEventListener('click', adminMethods.deleteExpo);	
							cell.querySelector('.newExpo').style.display = "none";
							cell.querySelector('.newExpo').removeEventListener('click', adminMethods.newExpo);
							cell.querySelector('.date').innerHTML = "Expotion de la semaine " + data[iu].expo.week;
							cell.querySelector('.nbOeuvre').innerHTML = data[iu].nbOeuvre;
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
							cell.querySelector('.date').innerHTML = "Il n'y a pas encore d'expositon à cette date.";

							var infos = cell.querySelectorAll('.info');
							for(var io = 0; io < infos.length; io++) {
								infos[io].style.display = "none";
							}
						}
					}
				}
			}
		}
		xhr.open('POST', '../php/getAdminPlanning.php', true);
		var data = new FormData();
		data.append("weekOffset", weekOffset);
		xhr.send(data);
	},
	changePage: function(e) {
		console.log(e.srcElement.attributes[2].nodeValue);
	},
	reset: function() {
		adminMethods.loadWeek(0);
	},
	launch: function() {
		var pagination = document.querySelectorAll('.pagination');
		utils.listener(pagination, 'click', adminMethods.changePage);
		document.querySelector('.now').addEventListener('click', adminMethods.reset);

		adminMethods.loadWeek(0);
	},
}

adminMethods.launch();
