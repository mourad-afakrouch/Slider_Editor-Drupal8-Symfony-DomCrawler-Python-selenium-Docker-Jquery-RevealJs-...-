document.getElementById("ajax-search-input").onkeyup = function(e) {searchFunction(e)};

document.getElementById("avaiable-pages").style.display = 'none';
function searchFunction(e) {
	e = e || window.event; //IE does not pass the event object
	var scrolableDivElement = document.getElementById('avaiable-pages');
	var scrolableDivElementBoundry = scrolableDivElement.getBoundingClientRect();
	switch (e.keyCode) {
		case 38: // if the UP key is pressed
			var lastElement = document.getElementById('list-last-page');
			if(document.getElementsByClassName('focused-page').length == 0){
				firstElement.className += ' focused-page';
			}else if(document.getElementsByClassName('focused-page').id == 'list-first-page'){
				//you are already at the top
			}else{
				var prevElement = document.getElementsByClassName('focused-page')[0].previousSibling;
				var prevElementBoundry = prevElement.getBoundingClientRect();
				document.getElementsByClassName('focused-page')[0].classList.remove("focused-page");
				prevElement.className += ' focused-page';
				if(prevElementBoundry.top < scrolableDivElementBoundry.top){
					var prevElementStyle = prevElement.currentStyle || window.getComputedStyle(prevElement);
					prevElement.parentNode.parentNode.scrollTop -= prevElement.offsetHeight + parseInt(prevElementStyle.marginTop, 10);
				}
			}
		break;
		case 40: // if the DOWN key is pressed
			var firstElement = document.getElementById('list-first-page');
			if(document.getElementsByClassName('focused-page').length == 0){
				firstElement.className += ' focused-page';
			}else if(document.getElementsByClassName('focused-page').id == 'list-last-page'){
				//you are already at the bottom
			}else{
				var nextElement = document.getElementsByClassName('focused-page')[0].nextSibling;
				var nextElementBoundry = nextElement.getBoundingClientRect();
				document.getElementsByClassName('focused-page')[0].classList.remove("focused-page");
				nextElement.className += ' focused-page';
				if(nextElementBoundry.bottom > scrolableDivElementBoundry.bottom){
					var nextElementStyle = nextElement.currentStyle || window.getComputedStyle(nextElement);
					nextElement.parentNode.parentNode.scrollTop += nextElement.offsetHeight + parseInt(nextElementStyle.marginTop, 10);
				}
			}
		break;
		case 13: // if the DOWN key is pressed
			var url = document.getElementsByClassName('focused-page')[0].getAttribute('data-href');
			redirectFunction(url);
		break;
		default:
	        var text = document.getElementById("ajax-search-input").value;
			if(text.length > 0 ){
				document.getElementById("ajax-search-loader").style.display = 'block';
				var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				    	myres = JSON.parse(this.response);
				     	if(typeof myres.nodes !== 'undefined' && myres.nodes.length > 0){
				     		var elements = '<div><ul id="avaiable-pages-ul">';
				     		for (key in myres.nodes){
				     			var classes = 'search-item search-item-' + key;
				     			var elementId = 'default-id';
				     			if(key == 0){
				     				elementId = 'list-first-page';
				     			}
				     			if(key == (myres.nodes.length-1)){
				     				elementId = 'list-last-page';
				     			}
				     			elements = elements + '<li id="' + elementId + '" class="' + classes + '" data-href="' + myres.nodes[key].path +'">' + myres.nodes[key].result + '</a></li>';
				     		}
				     		elements = elements + '</ul></div>';
				     		document.getElementById("avaiable-pages").innerHTML = elements;
				     		var list = document.getElementsByClassName("search-item");
				     		for (var i = 0; i < list.length; i++) {
							    list[i].addEventListener('click', redirectFunction, false);
							}
				     	}else{
				     		document.getElementById("avaiable-pages").innerHTML = '';
				     	}
				     	document.getElementById("ajax-search-loader").style.display = 'none';
				    }
				  };
				  xhttp.open("GET", drupalSettings.ajax_search_block.ajax_base_url +"/api/getpages?t=" + text, true);
				  xhttp.send();
				  document.getElementById("avaiable-pages").style.display = 'block';
			}else{
		    	document.getElementById("avaiable-pages").style.display = 'none';
			}
	}
}

var redirectFunction = function(dataHref) {
	
	if (!dataHref) dataHref = '';

	if(typeof dataHref == "string"){
    			var attribute = dataHref;
	}else{
		var attribute = this.getAttribute("data-href");
	}
    var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	res = JSON.parse(this.response);
	    	window.location = res.url;
	    }
	};
    xhttp.open("GET", drupalSettings.ajax_search_block.ajax_base_url + "/api/getalias?path=" + attribute, true);
	xhttp.send();
};


document.onclick = function(e) {
    if(e.target != document.getElementById('avaiable-pages') && e.target !=document.getElementById('ajax-search-input')) {
        document.getElementById("avaiable-pages").innerHTML = '';
        document.getElementById("ajax-search-loader").style.display = 'none';
        // setWidth('ajax-search-input', 'minus');  
    }else if (e.target == document.getElementById('ajax-search-input')) {
		// setWidth('ajax-search-input', 'add');
    }
};

//Anymation effect to the input

// function setWidth(id, operation){
// 	var elem = document.getElementById(id);
//     var elementWidth = elem.offsetWidth;
//     var id = setInterval(setwidth, 5);
//     function setwidth() {
//     	if(operation == 'add'){
//     		if (elementWidth <= 300) {
// 	    		elementWidth++; 
// 	            elem.style.width = elementWidth + 'px';
// 	        } else {
// 	        	clearInterval(id);
// 	        }
//     	}else{
//     		if (elementWidth >= 225) {
// 	    		elementWidth--; 
// 	            elem.style.width = elementWidth + 'px';
// 	        } else {
// 	        	clearInterval(id);
// 	        }
//     	}
//     }
// }