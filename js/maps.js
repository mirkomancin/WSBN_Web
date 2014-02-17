function initMaps(){
	$.get('api/m2m.php?q=location', function(data) {
			// create a map in the "map" div, set the view to a given place and zoom
			var map = L.map('map').setView([43.797675,11.191394], 15);
			
			// add an OpenStreetMap tile layer
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
			
			for(index in data){
				var latlng = L.latLng([ parseFloat(data[index]['lat']) , parseFloat(data[index]['lng']) ]);
				// add a marker in the given location, attach some popup content to it and open the popup
				L.marker(latlng).addTo(map)
				    .bindPopup('<a href="graphs.php?id=' + data[index]['idLocation'] + '">' + data[index]['note'] + '</a>')
				    .openPopup();	
			}
		}); 	
}
