<!DOCTYPE html>
<html>
<head>
  <title>jVectorMap demo</title>
  <link rel="stylesheet" href="jquery-jvectormap-2.0.1.css" type="text/css" media="screen"/>
  <script src="jquery.js"></script>
  <script src="JS/now/jquery-jvectormap-2.0.1.min.js"></script>
  <script src="JS/now/jquery-jvectormap-world-mill.js"></script>
</head>
<body>
  <div id="world-map" style="width: 600px; height: 400px"></div>
  <script>
    $(function(){
      $('#world-map').vectorMap({map: 'world_mill'});
    });
  </script>
</body>
</html>