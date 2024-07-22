tool.fixedDistance = 30;

var path;
var strokeEnds = 6;
//var url = 'https://via.placeholder.com/600/FFFFFF?text=1';
var url = BASE_URL + 'assets/pemeriksaan_fisik/20221107_094924.jpg';

var raster = new Raster(url);

// If you create a Raster using a url, you can use the onLoad
// handler to do something once it is loaded:

/*
raster.onLoad = function() {
    console.log('The image has loaded.');
    // Transform the raster, so it fills the view:
};
*/
raster.on('load raster', function() {
    console.log('Now the image is definitely ready.');
});

view.onResize = function(event) {
    // Whenever the view is resized, move the path to its center:
    //path.position = view.center;
    console.log('view resize');
}

function onMouseDown(event) {
	path = new Path();
	path.fillColor = {
		hue: Math.random() * 360,
		saturation: 1,
		brightness: 1
	};
}

var lastPoint;
function onMouseDrag(event) {
	// If this is the first drag event,
	// add the strokes at the start:
	if(event.count == 0) {
		addStrokes(event.middlePoint, event.delta * -1);
	} else {
		var step = event.delta / 2;
		step.angle += 90;

		var top = event.middlePoint + step;
		var bottom = event.middlePoint - step;

		path.add(top);
		path.insert(0, bottom);
	}
	path.smooth();
	
	lastPoint = event.middlePoint;
}

function onMouseUp(event) {
	var delta = event.point - lastPoint;
	delta.length = tool.maxDistance;
	addStrokes(event.point, delta);
	path.closed = true;
	path.smooth();
}

function addStrokes(point, delta) {
	var step = delta.rotate(90);
	var strokePoints = strokeEnds * 2 + 1;
	point -= step / 2;
	step /= strokePoints - 1;
	for(var i = 0; i < strokePoints; i++) {
		var strokePoint = point + step * i;
		var offset = delta * (Math.random() * 0.3 + 0.1);
		if(i % 2) {
			offset *= -1;
		}
		strokePoint += offset;
		path.insert(0, strokePoint);
	}
}

function pathRemove(){
    console.log(paper.view.size);    	
	var size = new Size(500, 500);
	paper.view.viewSize = size;
    //console.log(project.activeLayer);    
    project.activeLayer.removeChildren(1);
}

function reloadRaster(){
    //raster.fitBounds(view.bounds);
    //raster.position = view.center;                
    //console.log(paper.view.center);   
	resizeImg(); 
}

function resizeImg() {
    var width = paper.view.size.width; 
    var scale = (width / raster.bounds.width) * 1;
	//console.log(scale);
    //raster.scale(2);
	raster.scale(scale);
    raster.position = paper.view.center;                	
	//raster.position.x += 150;
	//raster.position.y += 50;	
}

// Define a global function inside the window scope.
globals.pathRemove = pathRemove
globals.reloadRaster = reloadRaster