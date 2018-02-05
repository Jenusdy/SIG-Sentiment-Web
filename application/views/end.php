
</body>
<script type="text/javascript">

	var map = L.map('map', {
		center: [5,28],
		zoom: 3,
		minZoom: 2,
		maxZoom: 18
	});

	var marker_positif = L.layerGroup().addTo(map);
	var marker_negatif = L.layerGroup().addTo(map);
	var marker_netral = L.layerGroup().addTo(map);


	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: ''}).addTo(map);

	var negatif = L.icon({
			iconUrl: 'assets/images/negatif1.png',
			shadowUrl: 'assets/images/leaf-shadow.png',
			iconSize:     [60, 120],
			shadowSize:   [50, 64],
			iconAnchor:   [30, 107],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
	});

	var positif = L.icon({
			iconUrl: 'assets/images/positif1.png',
			shadowUrl: 'assets/images/leaf-shadow.png',

			iconSize:     [60, 120],
			shadowSize:   [50, 64],
			iconAnchor:   [30, 110],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
	});
	
	var netral = L.icon({
			iconUrl: 'assets/images/netral1.png',
			shadowUrl: 'assets/images/leaf-shadow.png',

			iconSize:     [60, 120],
			shadowSize:   [50, 64],
			iconAnchor:   [30, 107],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
	});

	$(document).ready(function(){
		$(document).ready(function(){
			$('.parallax').parallax();
	    });
		jQuery.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>home/get_data",
			dataType: 'json',
			success: function(res) {
				for (var i = 0; res.length; i++) {
					var text = res[i].text.substring(0,20);
					if (res[i].polarity>0) {
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: positif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_positif);
					}else if(res[i].polarity<0){
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: negatif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_negatif);
					}else{
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: netral})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_netral);
					}
				}
			}
		});
	});

	function getBahagia(){
		marker_positif.clearLayers();
		marker_negatif.clearLayers();
		marker_netral.clearLayers();
		jQuery.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>home/get_data",
			dataType: 'json',
			success: function(res) {
				for (var i = 0; res.length; i++) {
					if (res[i].polarity>0) {
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: positif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_positif);
					}
				}
			}
		});
	}
	function getNetral(){
		marker_positif.clearLayers();
		marker_negatif.clearLayers();
		marker_netral.clearLayers();
		jQuery.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>home/get_data",
			dataType: 'json',
			success: function(res) {
				for (var i = 0; res.length; i++) {
					if (res[i].polarity==0) {
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: netral})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_netral);
					}
				}
			}
		});
	}
	function getSedih(){
		marker_positif.clearLayers();
		marker_negatif.clearLayers();
		marker_netral.clearLayers();
		jQuery.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>home/get_data",
			dataType: 'json',
			success: function(res) {
				for (var i = 0; res.length; i++) {
					if (res[i].polarity<0) {
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: negatif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_negatif);
					}
				}
			}
		});
	}

	function getAll(){
		marker_positif.clearLayers();
		marker_negatif.clearLayers();
		marker_netral.clearLayers();
		jQuery.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>home/get_data",
			dataType: 'json',
			success: function(res) {
				for (var i = 0; res.length; i++) {
					var text = res[i].text.substring(0,20);
					if (res[i].polarity>0) {
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: positif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_positif);
					}else if(res[i].polarity<0){
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: negatif})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_negatif);
					}else{
						L.marker([res[i].coordinate_y, res[i].coordinate_x], {icon: netral})
							.bindPopup("Name : " + res[i].name + "<br><br>" 
										+ "Tweet : " + res[i].text+ "<br><br>"
										+ "Polarity : " + res[i].polarity)
							.addTo(marker_netral);
					}
				}
			}
		});
	}

</script>
</html>
