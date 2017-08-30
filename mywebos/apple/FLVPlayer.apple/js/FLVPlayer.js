// Jon Reiling. jreiling@mac.com. http://www.jonreiling.com/
// Enjoy!

var fo;

//
// WIDGET EVENTS
//

if (window.widget) {
	widget.onremove = onhide;
	//widget.onshow = onshow;
	widget.onhide = onhide;
}


function onhide(){

	fo = new SWFObject("", "FLVPlayback", "320", "240", "8", "#000000");
	fo.addParam("wmode", "transparent");
	fo.write("flashcontent");
	
	resizeWidget(320,240);
	showDragIndicator();

}

function showDragIndicator(){
	var dragIndicator = document.getElementById("dragIndicator");
	dragIndicator.style.display = "block";	
}

function hideDragIndicator() {
	var dragIndicator = document.getElementById("dragIndicator");
	dragIndicator.style.display = "none";
}

//
// MEDIA PLAYER EVENTS
//

function resizeWidget(w, h) {

	var flashLayer = document.getElementById("flashcontent");
	flashLayer.style.height = h;
	flashLayer.style.width = w;
	window.resizeTo(w+22, h+22);
	
	var frontLayer = document.getElementById("front");
	frontLayer.style.height = h+22;
	frontLayer.style.width = w+22;	
	
	var flashMovie = document.getElementById("FLVPlayback");
	flashMovie.setAttribute("height", h);
	flashMovie.setAttribute("width", w);

	positionBorderElement("corner_tr", w + 8, 0, 14, 8);
	positionBorderElement("corner_br", w + 8, h + 8, 14, 14);
	positionBorderElement("corner_bl", 0, h + 8, 8, 14);

	positionBorderElement("border_right", w + 8, 8, 14, h);
	positionBorderElement("border_left", 0, 8, 8, h);
	positionBorderElement("border_top", 8, 0, w, 8);
	positionBorderElement("border_bottom", 8, h + 8, w, 14);
	
}

function positionBorderElement(targetElement, x, y, w, h) {
	var targetDiv = document.getElementById(targetElement);
	targetDiv.style.top = y;
	targetDiv.style.left = x;
	
	targetDiv.style.width = w;
	targetDiv.style.height = h;
	
	

}

function showcontrols() {
	var flashMovie = document.getElementById("FLVPlayback");
	flashMovie.showControls();

}

function hidecontrols() {
	var flashMovie = document.getElementById("FLVPlayback");
	flashMovie.hideControls();
}

function flashMouseEvent(event) {
	var flashMovie = document.getElementById("FLVPlayback");
	flashMovie.onFlashClick(event.clientX-8, event.clientY-8);
}

function loadMedia(s) {

	hideDragIndicator();

	fo = new SWFObject("FLVPlayer.swf", "FLVPlayback", "10", "10", "8", "#000000");
	fo.addParam("allowScriptAccess", "always");
	fo.addVariable("flvSrc", s); // this line is optional, but this example uses the variable and displays this text inside the flash movie
	fo.write("flashcontent");
	
}


//
// DRAG AND DROP
//


function dragdrop (event) {
	
	uri = event.dataTransfer.getData("text/uri-list");
	if (uri.indexOf(".flv") != -1) loadMedia(uri);
	event.stopPropagation();
	event.preventDefault();

}

// The dragenter, dragover, and dragleave functions are implemented but not used.  They
// can be used if you want to change the image when it enters the widget.

function dragenter (event) {

	// If the user hasn't defined a server, or a transfer is in progress, we can't take a drop

	event.dataTransfer.dropEffect = "link";

	event.stopPropagation();
	event.preventDefault();
}

function dragover (event) {

	// If the user hasn't defined a server, or a transfer is in progress, we can't take a drop

	event.dataTransfer.dropEffect = "link";


	event.stopPropagation();
	event.preventDefault();
}

function dragleave (event) {
	event.stopPropagation();
	event.preventDefault();
}

