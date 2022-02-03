<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Maps</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="leaflet.ajax.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <style type="text/css">
        #map {
            height: 550px;
            margin-top: 10px;
        }

        .margin {
            margin-top: 5px;
        }
    </style>
</head>

<body class="dark-edition">

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
            <div class="logo">
                <a href="#" class="simple-text logo-normal"> Sma Ngabang </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active" onClick="pusat_kota()">
                        <a class="nav-link" href="#">
                            <i class="material-icons">location_ons</i>
                            <p>Pusat Kota</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sma Terdekat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onClick="smansa()">Smansa Ngabang</a>
                            <a class="dropdown-item" href="#" onClick="man()">Man Ngabang</a>
                            <a class="dropdown-item" href="#" onClick="pelita()">Sma Pelita</a>
                            <a class="dropdown-item" href="#" onClick="maniamas()">Sma Maniamas</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sma Jalur Medium
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onClick="smataq()">Sma Taqasus Ngabang</a>
                            <a class="dropdown-item" href="#" onClick="smangga()">Sma 3 Ngabang</a>
                            <a class="dropdown-item" href="#" onClick="smar()">Sma Arastamar Ngabang</a>
                            <a class="dropdown-item" href="#" onClick="sst()"> Sma Santo Tomas</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sma Jalur Terjauh
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onClick="smak()">Sma Makedonia</a>
                            <a class="dropdown-item" href="#" onClick="smandu()">Sma 2 Ngabang</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <h1 class="margin text-center">Peta SMA di Ngabang</h1>
            <div id="map"></div>
        </div>
    </div>
    <script>
        // awal script





        // map beserta kondisi awal map
        var map = L.map('map').setView([0.396725, 109.950126], 13);


        // layer dan akses token
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYWR6YWt5IiwiYSI6ImNreTRlbng0aTBiZWIycHF2cTRsZHZxanoifQ.xCL1gkcePx0MyT9qK5Ciww'
        }).addTo(map);


        // method pupUp
        function popUp(f, l) {
            var out = [];
            if (f.properties) {
                for (key in f.properties) {
                    out.push(key + ": " + f.properties[key]);
                }
                l.bindPopup(out.join("<br />"));
            }
        }


        // data------------------------------------------------------------------


        // Jalur
        var jSTD = new L.GeoJSON.AJAX(["jalur sma terdekat dari pusat kota.geojson"], {
            // onEachFeature: popUp,
            style: function() {
                return {
                    color: 'green'
                }
            }
        }).addTo(map)

        var jSMDK = new L.GeoJSON.AJAX(["jalur sma medium dari kota.geojson"], {
            // onEachFeature: popUp,
            style: function() {
                return {
                    color: 'yellow'
                }
            }
        }).addTo(map)

        var jSTFK = new L.GeoJSON.AJAX(["jalur sma terjauh dari kota.geojson"], {
            // onEachFeature: popUp,
            style: function() {
                return {
                    color: 'red'
                }
            }
        }).addTo(map)





        // data GeoJson point
        var tLS = new L.GeoJSON.AJAX(["titik lokasi sekolah.geojson"], {
            // pointToLayer: function(feature, latlng) {
            //     var smallIcon = new L.Icon({
            //         iconSize: [50, 50],
            //         iconAnchor: [13, 27],
            //         popupAnchor: [1, -24],
            //         iconUrl: 'house-icon.png'
            //     });
            //     return L.marker(latlng, {
            //         icon: smallIcon
            //     });
            // },
            onEachFeature: function(feature, layer) {
                layer.bindPopup('</h1><p>Nama Sma : ' + feature.properties.t_sekolah + '</p>');
            }
        }).addTo(map)


        // Data Geojson dari Polygon
        var polygonSekolah = new L.GeoJSON.AJAX(["area sekolah.geojson"], {
            onEachFeature: popUp,
        }).addTo(map)

        var merah = {
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
            }]
        }


        var hijau = {
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
            }]
        }
        kuning = {
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
            }]
        }

        areaJauh = L.geoJSON(merah, {
            style: function() {
                return {
                    color: 'red'
                }
            }
        }).addTo(map);

        areaDekat = L.geoJSON(hijau, {
            style: function() {
                return {
                    color: 'green'
                }
            }
        }).addTo(map);

        areaSedang = L.geoJSON(kuning, {
            style: function() {
                return {
                    color: 'yellow'
                }
            }
        }).addTo(map);










        // akkhir data--------------------------------------------------------


        // Layer Kontrol
        var baseLayers = {};

        var overlays = {
            'Area Sekolah': polygonSekolah,
            'Titik Lokasi Sekolah': tLS,
            'Jalur Sma Terdekat ke pusat kota': jSTD,
            'Jalur Sma medium ke pusat kota': jSMDK,
            'Jalur Sma Terjauh ke pusat kota': jSTFK,
            'Area Jauh': areaJauh,
            'Area Sedang': areaSedang,
            'Area Dekat': areaDekat
        };

        var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
        // Akhir Layer Kontrol



        // Maps Button
        function pusat_kota() {
            map.flyTo([0.385750, 109.959256], 18);
        }

        // Jalur dekat

        function smansa() {
            map.flyTo([0.388085124126045, 109.956699994682765], 18);
        }

        function man() {
            map.flyTo([0.378973309840852, 109.95593383212011], 18);
        }

        function pelita() {
            map.flyTo([0.386298843095967, 109.956454746012071], 18);
        }

        function maniamas() {
            map.flyTo([0.386820777541551, 109.953507054191817], 18);
        }
        // Akhir Maps Button

        // medium
        function smataq() {
            map.flyTo([0.383843215489789, 109.969025805521127], 18);
        }

        function smangga() {
            map.flyTo([0.389716470720396, 109.970138751329344], 18);
        }

        function smar() {
            map.flyTo([0.380609967234559, 109.989992275256839], 18);
        }

        function sst() {
            map.flyTo([0.383314136052009, 109.974454492024165], 18);
        }

        // Jauh

        function smak() {
            map.flyTo([0.385831808243084, 109.854196178527147], 18);
        }

        function smandu() {
            map.flyTo([0.390553379383271, 109.852947502658594], 18);
        }



        // Akhir script


        var marker = L.marker([0.385750, 109.959256]).addTo(map);
    </script>
</body>

</html>