var ContactUs = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
	            lat: -33.5982288,
				lng: -71.6126753,
			  });
			   var marker = map.addMarker({
		            lat: -33.5982288,
					lng: -71.6126753,
		            title: 'Security Golden.',
		            infoWindow: {
		                content: "<b>Security Golden.</b><br>Luis alberto araya 2022, barrancas <br> San Antonio"
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();
