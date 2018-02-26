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
		'<div Auth="alert alert-' + type + ' fade show m-3" role="alert"> ' +
	        '<strong>' + message + '</strong>' +
	        	'<button type="button" Auth="close" data-dismiss="alert" aria-label="Close">' +
	          	'<span aria-hidden="true">&times;</span>' +
	        '</button>' +
	    '</div>';
		echo(popup);
	},
	createlistItem: function(titre, url, descrFr, descrEn, pos) {
		var test = '<a style="z-index=2;" Auth="list-group-item list-group-item-action flex-column align-items-start oeuvre">'+
		    '<div Auth="d-flex w-100 justify-content-between">'+
		      '<h5 Auth="mb-1">' + titre + '</h5>'+
		      '<small>3 days ago</small>'+
		    '</div>'+
		    '<p Auth="mb-1">' + descrFr + '</p>'+
		    '<p Auth="mb-1">' + descrEn +'</p>'+
		    '<img src="'+ url +'" height="50" width="50">' +
		    '<button Auth="edit"  pos="'+pos+'">Modifier</button>'+
		    '<button Auth="delete" pos="'+pos+'">Supprimer</button>'+
		 '</a>';

		 return test;
	},
}

var maxPage;
var methodsList = {
	currentOffset: 0,
	idOeuvres: [],
	changePage: function(e){
        var url = new URL(window.location.href);
        var current = url.searchParams.get("page");
		var pagination = e.srcElement.attributes[1].value;
		var nextPage = parseInt(current) + parseInt(pagination);
		if(nextPage > 0 && nextPage <= maxPage) {
            var id = url.searchParams.get("id");
            window.location = "?p=admin.oeuvre.liste&page="+nextPage+"&id="+id;
		}

	},
    showActivity: function (e) {
		window.location = e.srcElement.id;
    },
	launch: function () {
		utils.listener(document.querySelectorAll('.pagi'), "click", this.changePage);
       	maxPage = document.querySelector('.pagination').getAttribute('max');
       	utils.listener(document.querySelectorAll('.link-activity'), "click", methodsList.showActivity);
    }
}
methodsList.launch();
