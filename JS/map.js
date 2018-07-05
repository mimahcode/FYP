<?php
      include "dbconnect.php";
        $query = "select * from userdata";
        $data = mysqli_query($conn,$query);
$num_rows = mysqli_num_rows($data);
        
while($value = mysqli_fetch_array($data)){
    $datas[] = $value['email']; 
}

      ?>
$(function () { 

    
  'use strict';
    
    var tz_map = L.map('world-map-markers', {
        scrollWheelZoom: false
    });
    var clickedRegion = null;

//	 create the tile layer with correct attribution
	
	// set the position and zoom level of the map
	tz_map.setView(new L.LatLng(-6.17221, 35.73947),6.3);
    
  $.getJSON('JS/regions-districts.json', function(regions){
//      var marker1 = new L.marker([-6.17221, 35.73947]).addTo(tz_map);
        var regionLayer =  L.geoJSON(regions,{
            style: function(feature){
                var properties = feature.properties;
                return {
                    color: (properties.level === 3) ? "#ff7800" : "#000",
                    weight: (properties.level === 3) ? 2: 4,
                    opacity: 0.65,
                    fill: true,
                    stroke: true

                }
            },
                    onEachFeature: onEachFeature,
                    filter: filterLevel3
        })
    
        regionLayer.on({
           click: whenClicked
       });
    tz_map.addLayer(regionLayer);
    
    
    function filterLevel3(feature){
        return((feature.properties.level !== 3) || (feature.properties.level == 3 && feature.properties.parentId === clickedRegion))
        
    }
    
      
//          alert();
    function onEachFeature(feature, layer) {
        
        
        //Does this feature have a property named popupContent?
        
        if (feature.properties && feature.properties.name){
            var content = `<div class="leaflet-popup-info">
             <?php
for($i =0; $i < $num_rows; $i++){
    ?>
  <script>
   
        console.log(("<?php echo $datas[$i];?>"));
      
</script>                       
                        <?php
}
?>
             ${feature.properties.name}<br>
             <h5><strong>Crops grown</strong></h5>
             ${feature.properties.crop} `;
            layer.bindPopup(content);
//            console.log(feature.properties.name +" : "+ feature.properties.crop);
            
        }
        
        var center = layer.getBounds().getCenter();
        
        var label = L.marker(center, {
          icon: L.divIcon({
            className: 'label',
            html: feature.properties.name,
            iconSize: [100, 40]
          })
        }).addTo(tz_map);
        
        if (feature.properties.level===3){
        
        var areIcon = [
            ['Images/plantIcons/corn.png'],
            ['Images/plantIcons/grapes.png'],
            ['Images/plantIcons/onion.png'],
            ['Images/plantIcons/peanuts.png'],
            ['Images/plantIcons/potato.png'],
            ['Images/plantIcons/wheat.png'],
            ['Images/plantIcons/banana.png'],
            ['Images/plantIcons/tomato.png']
            
        ]
            
        var agrIcon = L.icon({
            iconUrl: areIcon[0],
            iconSize: [24,24],
            iconAnchor: [12,22],
            popupAnchor: [0,-24]
        });
            var marker = L.marker(center, {icon: agrIcon}).addTo(tz_map);
        }
        
        
        
    }
    
    function whenClicked(evt){
        clickedRegion = evt.layer.feature.properties.id;
        var filtered = regions.features.filter(function(feature){
            return feature.properties.parentId === clickedRegion
        });
        
        var _districtGeof = {
            "type": "FeatureCollection",
            "crs": {
                "type": "name",
                "properties": {
                    "name": "TanzaniaRegionsDistricts"
                }
            },
            
            "features": filtered
        };
        
        var districtsLayer = L.geoJSON(_districtGeof,{
            style: function (feature) {
                var properties = feature.properties;
                return {
                    color: "#ff7800",
                    weight: (properties.level === 3) ? 2 : 4,
                    opacity: 0.65,
                    fill: true,
                    stroke: true
                }
            },
            onEachFeature: onEachFeature,
            filter: filterLevel3
        })
        
        tz_map.addLayer(districtsLayer);
        tz_map.fitBounds(evt.layer.getBounds());
        //console.log(districtsLayer.name);
        
    }
    });
    
    
    
    
});       
    

  /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

  // -----------------
  // - SPARKLINE BAR -
  // -----------------
//  $('.sparkbar').each(function () {
//    var $this = $(this);
//    $this.sparkline('html', {
//      type    : 'bar',
//      height  : $this.data('height') ? $this.data('height') : '30',
//      barColor: $this.data('color')
//    });
//  });
//
//  // -----------------
//  // - SPARKLINE PIE -
//  // -----------------
//  $('.sparkpie').each(function () {
//    var $this = $(this);
//    $this.sparkline('html', {
//      type       : 'pie',
//      height     : $this.data('height') ? $this.data('height') : '90',
//      sliceColors: $this.data('color')
//    });
//  });
//
//  // ------------------
//  // - SPARKLINE LINE -
//  // ------------------
//  $('.sparkline').each(function () {
//    var $this = $(this);
//    $this.sparkline('html', {
//      type     : 'line',
//      height   : $this.data('height') ? $this.data('height') : '90',
//      width    : '100%',
//      lineColor: $this.data('linecolor'),
//      fillColor: $this.data('fillcolor'),
//      spotColor: $this.data('spotcolor')
//    });
//  });
//});
