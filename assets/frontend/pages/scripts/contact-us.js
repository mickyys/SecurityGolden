var ContactUs = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
	            lat: -33.024019,
				lng: -71.5571757,
			  });
			   var marker = map.addMarker({
		            lat: -33.024019,
					lng: -71.5571757,
		            title: 'Security Golden.',
		            infoWindow: {
		                content: "<b>Security Golden.</b><br> Villanelo 180 Dpto. 1405<br>Viña del Mar"
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();
