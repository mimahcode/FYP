<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Nineth Group</a>.</strong> All rights
    reserved.
  </footer>
           <script>
function myFunction() {
    window.print();
}
</script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jvectormap  -->
<script src="JS/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="JS/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<?php
      include "dbconnect.php";
// $query = "SELECT id, name, type FROM crop";
$query = "SELECT district.id as district_id, district.name as district_name, crop.* FROM district LEFT JOIN cropdistrict ON district.id=cropdistrict.districtid LEFT JOIN crop ON cropdistrict.cropid=crop.id WHERE crop.type='seasonal'";
$query1 = "SELECT district.lat as lat, district.lng as lng,district.name as district_name, crop.name as cropname FROM district LEFT JOIN cropdistrict ON district.id=cropdistrict.districtid LEFT JOIN crop ON cropdistrict.cropid=crop.id";
$result = $conn->query( $query);
$result1 = $conn->query( $query1);
      ?>
<script>
$(function () { 
  'use strict';
     var rows= <?php 
    $districts = array();
    while($row = $result->fetch_assoc()) {
        $districts[] = $row;
    }
    echo json_encode($districts)?>;
    console.log(rows);
    // debugger;
     var rows1= <?php 
    $districts1 = array();
    while($row1 = $result1->fetch_assoc()) {
        $districts1[] = $row1;
    }
    echo json_encode($districts1)?>;
    var tz_map = L.map('world-map-markers', {
        scrollWheelZoom: false
    });
    var clickedRegion = null;
	// set the position and zoom level of the map
	tz_map.setView(new L.LatLng(-6.17221, 35.73947),6.3);
  $.getJSON('JS/regions-districts.json', function(regions){
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
    function onEachFeature(feature, layer) {
        //Does this feature have a property named popupContent?
        if (feature.properties && feature.properties.name){
            var crops = '';
            for (let i = 0; i < rows.length; i++) {
                var district = rows[i];
                crops += "<br> id: "+ district.district_id+ " - Name: "+ district.district_name + " " +district.type+"<br>"; 
        }
var crops1='';
            for (var row of rows1) {
                if(row.district_name ===feature.properties.name ){
        crops1 = row;
    }
            }
            var content =  `<div class="leaflet-popup-info">
            <div class="popup">
             <h5> ${feature.properties.name}</h5><br>
             <strong>Crops grown : </strong>  ${crops1.cropname}<br>
             <strong>Season to grow : </strong>  Rainy season <br>
             <strong>Start planting : </strong>  March to April <br>
             <strong>Harvest after : </strong>  3 months <br>
             <strong>Seeds to use : </strong>  Canadian wonder, SUA 90}<br>
             <strong>Soil type : </strong> loam soil <br>
             <strong>Fertilizer to use : </strong>  DAP or TSP <br>
             <strong>Pesticide to use : </strong> Galex, Stomp, Dual gold<br>
             </div>
             
             <div>
            
</div>
             `;
            // layer.bindPopup(content);
              var center = layer.getBounds().getCenter();
        var label = L.marker(center, {
          icon: L.divIcon({
            className: 'label',
            html: feature.properties.name,
            iconSize: [100, 40]
          })
        }).addTo(tz_map);

        var cropIcon = L.Icon.extend({
            options: {
                iconSize: [24,24],
                iconAnchor: [12,22],
                popupAnchor: [0,-24]
    }
});   
var district_information = null;
for (var row of rows1) {
    if(row.district_name ===feature.properties.name ){
        district_information = row;
    }
}
if(district_information){
    var crop_name = district_information.cropname;
    if(crop_name) {   
        var iconUrl =`Images/plantIcons/${crop_name}.png`;
        var icon = new cropIcon({iconUrl});
        L.marker(center, {icon}).addTo(tz_map).bindPopup(content);
    } 
}  
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
        
    }
    });
    function getColor(d) {
    return d > 1000 ? '#800026' :
           d > 500  ? '#BD0026' :
           d > 200  ? '#E31A1C' :
           d > 100  ? '#FC4E2A' :
           d > 50   ? '#FD8D3C' :
           d > 20   ? '#FEB24C' :
           d > 10   ? '#FED976' :
                      '#FFEDA0';
}
});        
</script>
<script src="dist/leaflet/leaflet.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="require.js" ></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>