var utils = {
	echo: function(data) {
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
		echo(popup);
	},
	createlistItem: function(titre, url, descrFr, descrEn, pos) {
		var test = '<a style="z-index=2;" class="list-group-item list-group-item-action flex-column align-items-start oeuvre">'+
		    '<div class="d-flex w-100 justify-content-between">'+
		      '<h5 class="mb-1">' + titre + '</h5>'+
		      '<small>3 days ago</small>'+
		    '</div>'+
		    '<p class="mb-1">' + descrFr + '</p>'+
		    '<p class="mb-1">' + descrEn +'</p>'+ 
		    '<img src="'+ url +'" height="50" width="50">' +
		    '<button class="edit"  pos="'+pos+'">Modifier</button>'+
		 '</a>';

		 return test;
	},
}


var methodsList = {
	currentOffset: 0,
	maxPage: 0,
	idOeuvres: [],
	editOeuvre: function(e) {
		e.preventDefault();
		var idOeuvre = methodsList.idOeuvres[e.srcElement.attributes[1].nodeValue];
		var xhr = utils.getXHR();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					if(xhr.responseText == "success") {
						window.location = 'editOeuvre.php';
					}
				}
			}
		}
		
		xhr.open('POST', '../php/setIdOeuvre.php', true);
		var data = new FormData();
		data.append('idOeuvre', idOeuvre);
		xhr.send(data);
	},
	loadPage: function(offset) {
		var xhr = utils.getXHR();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.status != 200) {
					alert("fail");
				} else {
					var data = JSON.parse(xhr.responseText);
					methodsList.idOeuvres = [];
					document.querySelector('.list-group').innerHTML = "";
					for(var pl = 0; pl < data.length; pl++) {
						document.querySelector('.list-group').innerHTML += utils.createlistItem(data[pl].nomOeuvre, data[pl].urlFile, data[pl].descrArtistFR, data[pl].descrArtistEN, pl);
						methodsList.idOeuvres.push(data[pl].idOeuvre);
					}
					var oeuvres = document.querySelectorAll('.edit');
					utils.listener(oeuvres, 'click', methodsList.editOeuvre);
				}
			}
		}
		
		xhr.open('POST', '../php/getPage.php', true);
		var data = new FormData();
		data.append('page', offset);
		xhr.send(data);
		
	},
	changeNumber: function(numbers, pagination) {
		
		for(var yu = 0; yu < numbers.length; yu++) {
			var newValue = parseInt(numbers[yu].getAttribute('num')) + pagination;
			numbers[yu].firstChild.innerHTML = newValue;
			numbers[yu].setAttribute('num', newValue);
		}	
	},
	changePage: function(e){
		var pagination = parseInt(e.srcElement.attributes[1].nodeValue);
		if(methodsList.currentOffset + pagination >= 0 && methodsList.currentOffset +pagination < methodsList.maxPage) {
			methodsList.currentOffset += pagination;
			var numbers = document.querySelectorAll('.number');
			
			if(methodsList.currentOffset < 3) {
				var active = document.querySelector('.list-oeuvre-container').querySelector('.active');
				var pageNum = parseInt(active.getAttribute('num'));
				active.classList.remove('active');
				document.querySelector('.list-oeuvre-container').querySelector('[num="'+(pageNum+pagination)+'"]').classList.add('active');
			} else if(methodsList.currentOffset >= methodsList.maxPage - 2){
				var active = document.querySelector('.list-oeuvre-container').querySelector('.active');
				var pageNum = parseInt(active.getAttribute('num'));
				active.classList.remove('active');
				document.querySelector('.list-oeuvre-container').querySelector('[num="'+(pageNum+pagination)+'"]').classList.add('active');
			} else {
				methodsList.changeNumber(numbers, pagination);
			}
			methodsList.loadPage(methodsList.currentOffset);
		}
		
	},
	launch: function() {
		methodsList.loadPage(methodsList.currentOffset);
		methodsList.maxPage = document.querySelector('.pagination').getAttribute('max');
		utils.listener(document.querySelectorAll('.pagi'), 'click', methodsList.changePage);
	}
}
methodsList.launch();
