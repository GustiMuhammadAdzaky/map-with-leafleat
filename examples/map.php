<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=1024, user-scalable=no">
  <style>
    html {
      height: 100%
    }

    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #map {
      width: 800px;
      height: 500px;
    }

    .info {
      padding: 6px 8px;
      font: 14px/16px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    .info h4 {
      margin: 0 0 5px;
      color: #777;
    }

    .legend {
      text-align: left;
      line-height: 18px;
      color: #555;
    }

    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.7;
    }
  </style>
  <link rel="stylesheet" href="leaflet.css" />
  <script src="bintuni4.js"></script>
  <script src="leaflet-src.js"></script>
  <title>Leaflet AJAX</title>
</head>

<body>
  <div id="map"></div>
  <script type="text/javascript">
    var m = L.map('map').setView([-2.104146, 133.522358], 8);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
      maxZoom: 18,
      attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
      id: 'mapbox.light'
    }).addTo(m);

    geojson = L.geoJson(statesData, {
      style: getStyle
    }).addTo(m);

    function getStyle(feature) {
      return {
        weight: 1,
        opacity: 1,
        color: '#fff',
        fillOpacity: 0.7,
        // fillColor: getColor(feature.properties.density)
        // TopoJSON used in this example doesn't have any data attributes
        // so throwing in some random colors
        fillColor: getColor(Math.random() * 1000)
      };
    }

    m.attributionControl.addAttribution('Population data © <a href="http://census.gov/">Ngasal doang</a>');

    var legend = L.control({
      position: 'bottomright'
    });
    legend.onAdd = function(map) {

      var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 10, 20, 50, 100, 200, 500, 1000],
        labels = [],
        from, to;

      for (var i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];

        labels.push(
          '<i style="background:' + getColor(from + 1) + '"></i> ' +
          from + (to ? '–' + to : '+'));
      }

      div.innerHTML = labels.join('<br>');
      return div;
    };

    function getColor(d) {
      return d > 1000 ? '#800026' :
        d > 500 ? '#BD0026' :
        d > 200 ? '#E31A1C' :
        d > 100 ? '#FC4E2A' :
        d > 50 ? '#FD8D3C' :
        d > 20 ? '#FEB24C' :
        d > 10 ? '#FED976' :
        '#FFEDA0';
    }
    legend.addTo(m);


    {
      "type": "FeatureCollection",
      "name": "area",
      "crs": {
        "type": "name",
        "properties": {
          "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
        }
      },
      "features": [{
          "type": "Feature",
          "properties": {
            "id": 1
          },
          "geometry": {
            "type": "MultiPolygon",
            "coordinates": [
              [
                [
                  [109.945472124041842, 0.395565729271471],
                  [109.956610158667161, 0.395789979654697],
                  [109.960273002268735, 0.384652203363997],
                  [109.962440807665629, 0.375831672208697],
                  [109.941659776619773, 0.372393157638922],
                  [109.936427142903185, 0.395640479399886],
                  [109.945472124041842, 0.395565729271471]
                ]
              ]
            ]
          }
        },
        {
          "type": "Feature",
          "properties": {
            "id": 2
          },
          "geometry": {
            "type": "MultiPolygon",
            "coordinates": [
              [
                [
                  [109.956759662487627, 0.395864729781093],
                  [109.962590311486082, 0.375682171603295],
                  [109.998770236040784, 0.378821683778208],
                  [109.982623823429577, 0.400349736127014],
                  [109.956759662487627, 0.395864729781093]
                ]
              ]
            ]
          }
        },
        {
          "type": "Feature",
          "properties": {
            "id": 3
          },
          "geometry": {
            "type": "MultiPolygon",
            "coordinates": [
              [
                [
                  [109.936501894813404, 0.395490979142383],
                  [109.941809280440225, 0.372243656974943],
                  [109.833194754865985, 0.37725192783234],
                  [109.834615041160475, 0.400573986380142],
                  [109.936501894813404, 0.395490979142383]
                ]
              ]
            ]
          }
        }
      ]
    }
  </script>
</body>

</html>