google.charts.load('current', {
    'packages': ['geochart'],
    // Note: Because markers require geocoding, you'll need a mapsApiKey.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
  });
  google.charts.setOnLoadCallback(drawMarkersMap);

   function drawMarkersMap() {
   var data = google.visualization.arrayToDataTable([
     ['City',   'Population', 'Area'],
     ['Sao Paulo',      2761477,    1285.31],
   ]);

   var options = {
     region: 'BR',
     displayMode: 'markers',
     colorAxis: {colors: ['green', 'blue']}
   };

   var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
   chart.draw(data, options);
 };