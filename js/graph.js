var map;
var locId = -1;
var m2mLocation = null;
var deviceList = null;
var graphData = [];
var plot = null;
var updateInterval = 30000;

function initialize() {
	
	locId = getUrlVars()["id"];

	$.get('api/m2m.php?q=locationInfo&idLocation=' + locId, function(data) {
		
		m2mLocation = data['location'];
		deviceList = data['devices'];

		loadMap(data['location']['lat'],data['location']['lng']);

		$('#locationName').html(m2mLocation['name']);

		for(index in data['devices'])
		{
			//createDeviceListElement(data['devices'][index]);
			createM2MDeviceMarker(data['devices'][index]);	
		}
	});
}

/*
function createDeviceListElement(device)
{
	
	var html='<div><p><h3>Device: '+ device['idDevice'] +' </h3><a class="btn" href="#" onclick="showGraph('+device['idDevice']+')">Show Data &raquo;</a></p></div>';
	
	$('#deviceList').append(html);
	
}
*/

function loadMap(lat,lng)
{
	map = L.map('map').setView([lat,lng], 17);
			
	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
}

function loadGraphData(deviceId,type, placeholder, sensorType,min,max,unita) {

        var graphTitle;
        
		//create dedicated Div	
		if(type=="temp")
			graphTitle = "Temperature";
		else if(type=="ph")
			graphTitle = "pH";
		else if(type=="ph_raw")
			graphTitle = "Analog read";
		else if(type=="ph_temp")
			graphTitle = "pH/Temp";
		else if(type=="battery")
			graphTitle = "Battery level";
			
		var html = '<div><h2>'+graphTitle+' ('+unita+') </h2><div id="'+placeholder+'" style="width:100%;height:300px;"></div></div>';

	
		$('#graphList').append(html);

		$.get('api/m2m.php?q=latest_log&deviceId='+deviceId, function(dataArray) {

		var data = dataArray['data'];

		var res = [];
		var avgData = [];
		var xTicksArray = [];
		var maxValue = 0.0;
		var minValue = 100000.0;

		var average = 0.0;
		var totalSum = 0.0;
		var count = 0;
	
		
		
		for(index in data) {
			var payloadString = data[index]['payload'];
			var payloadObj = JSON.parse(payloadString);
			res.push([index, payloadObj[sensorType]]);

			if(payloadObj[sensorType] > maxValue)
				maxValue = payloadObj[sensorType];

			if(payloadObj[sensorType] < minValue)
				minValue = payloadObj[sensorType];

			if(index % 5 == 1)
				xTicksArray.push([index, data[index]['timestamp']]);
			totalSum += payloadObj[sensorType];
			count++;
		}
		
		graphData = res;
		
		average = totalSum / count;
		for(var i = 0; i < count; i++) {
			avgData.push([i,average]);
		}

		var updateInterval = 500;
		/*$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});
		*/
		
		// setup plot
		var options = {
			series : {
				shadowSize : 0
			}, // drawing is faster without shadows
			yaxis : {
				min : minValue,
				max : parseFloat(maxValue) + (0.1 * maxValue)	 							
			},
			xaxis : {
				show : true,
				ticks : xTicksArray				
			},
			lines : {
				show : true
			},
			points : {
				show : true
			},
			grid: {
				hoverable: true,
				clickable: true
			}
		};
		
		var plot = $.plot($('#' + placeholder), [{
			data : graphData,
			label : "Data (" + unita + ")"
		}/*, {
			data : avgData,
			label : "AVG"
		}*/], options);

		function update() {
			
			
			$.get('api/m2m.php?q=latest_log&deviceId='+deviceId, function(data_) {

					data = data_['data'];
			
					var graph = [];
					var avg = [];
					res = [];
					xTicksArray = [];
					maxValue = 0.0;
					minValue = 100000.0;
			
					average = 0.0;
					totalSum = 0.0;
					count = 0;					
					
					for(index in data) {
						var payloadString = data[index]['payload'];
						var payloadObj = JSON.parse(payloadString);
						res.push([index, payloadObj[sensorType]]);
			
						if(payloadObj[sensorType] > maxValue)
							maxValue = payloadObj[sensorType];
			
						if(payloadObj[sensorType] < minValue)
							minValue = payloadObj[sensorType];
			
						if(index % 5 == 1)
							xTicksArray.push([index, data[index]['timestamp']]);
						totalSum += payloadObj[sensorType];
						count++;
					}
					
					graph = res;
					
					average = totalSum / count;
					for(var i = 0; i < count; i++) {
						avg.push([i,average]);
						$("#avg").text(average);
					}				
					
					var options = {
						series : {
							shadowSize : 0
						}, // drawing is faster without shadows
						yaxis : {
							min : minValue,
							max : parseFloat(maxValue) + (0.1 * maxValue)								
						},
						xaxis : {
							show : true,
							ticks : xTicksArray				
						},
						lines : {
							show : true
						},
						points : {
							show : true
						},
						grid: {
							hoverable: true,
							clickable: true
						}
					};
				
					/*plot.setData([{
						data : graph,
						label : "Data"
					//}, {
					//	data : avg,
					//	label : "AVG"
					}]);
		
					// Since the axes don't change, we don't need to call plot.setupGrid()
					//plot.parseOptions(options);
					//plot.options = options;
					//plot.setupGrid();
					
					plot.draw();
					*/
					
					plot = $.plot($('#' + placeholder), [{
						data : graph,
						label : "Data (" + unita + ")"
						}/*, {
							data : avgData,
							label : "AVG"
						}*/], options);
					//plot.draw();
					
					setTimeout(update, updateInterval);
			
			});
		}

		update();
		
		
		function showTooltip(x, y, contents) {
			$("<div id='tooltip'>" + contents + "</div>").css({
				position: "absolute",
				display: "none",
				top: y + 5,
				left: x + 5,
				border: "1px solid #fdd",
				padding: "2px",
				"background-color": "#fee",
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$('#' + placeholder).bind("plothover", function (event, pos, item) {

			var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
			$("#hoverdata").text(str);
			
			if (item) {
					if (previousPoint != item.dataIndex) {

						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0],
						y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
						    "Value: " + y + " " + unita);// + " - AVG = " + average.toFixed(2));
					}
			} else {
					$("#tooltip").remove();
					previousPoint = null;            
			}
			
		});

		// Add the Flot version string to the footer

		//$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});
}		
	
	
function showGraph(deviceId) {
	
	$.get('api/m2m.php?q=deviceInfo&idDevice='+deviceId, function(data) {
		
		$('#graphList').html("");
		
		var sensorTypes = data['sensorTypes'];
		
		for(index in sensorTypes)
			loadGraphData(deviceId,sensorTypes[index]['name'], sensorTypes[index]['name']+'Placeholder', sensorTypes[index]['name'],sensorTypes[index]['rangeMin'],sensorTypes[index]['rangeMax'],sensorTypes[index]['units']);
		
	});

}



function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
		vars[key] = value;
	});
	return vars;
}


function popup(url) 
{
	 params  = 'width='+screen.width;
	 params += ', height='+screen.height;
	 params += ', top=0, left=0'
	 params += ', fullscreen=yes';
	
	 windowname = '';
	 
	 newwin=window.open(url,windowname, params);
	 if (window.focus) {newwin.focus()}
	 return false;
}


function createM2MDeviceMarker(data) {
		
	var latlng = L.latLng([ parseFloat(data['lat']) , parseFloat(data['lng']) ]);
	// add a marker in the given location, attach some popup content to it and open the popup
	L.marker(latlng).addTo(map)
	    .bindPopup('<a target="_blank" href="details.php?device=' + data['idDevice'] + '">' + data['type'] +' '+ data['idDevice'] + '</a>')
		.openPopup();	
	
}

function openDetailPage(locationId) {
	q = (document.location.href);
	void (open('m2mLoc.html?locId=' + locationId, '_self', 'resizable,location,menubar,toolbar,scrollbars,status'));
}