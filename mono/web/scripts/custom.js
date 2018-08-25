
mapboxgl.accessToken = 'pk.eyJ1Ijoic2FjcmVkbGFuZCIsImEiOiJjaXhnbnp5dDYwMDJ0MnRtdGxoa3Y5YTBiIn0.6UJdCzagdlQa1azzuxZ4Jw';
var bounds = [
    [-21,26], // Southwest coordinates
    [8,38]  // Northeast coordinates
];

var center = {
    lat:9.19742242441731,
    lng:1.494855274291524
}
// Initialize map
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/light-v9', //stylesheet location
    maxBounds: bounds,
    center:center,
   
});

// Initialize places
var places = {
    "type": "FeatureCollection",
    "features": [
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-6.390395,34.301933] 
        },
        properties: {
            idzone : "1",
            id : "pan-p2iKenitra",
            title: "ATLANTIC FREE ZONE P2I",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-5.659571,35.651960] 
        },
        properties: {
            idzone : "7",
            id : "pan-p2iJouama",
            title: "Tanger Automotive city",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-5.914078,35.723939] 
        },
        properties: {
            idzone : "9",
            id : "tfz",
            title: "Tanger Free Zone",
            'icon': "commercial",
            'marker-color': "#bd0f8a"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-1.934795,34.775425] 
        },
        properties: {
            idzone : "19",
            id : "pan-technopole-oujda",
            title: "P2I Technopole d'Oujda",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.56443,33.374549] 
        },
        properties: {
            idzone : "17",
            id : "pan-midparc",
            title: "MIDPARC",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-6.717625,33.994754] 
        },
        properties: {
            idzone : "18",
            id : "p2iTechnopolis",
            title: "P2I Rabat Technopolis",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.619284,32.981038] 
        },
        properties: {
            idzone : "26",
            id : "pan-settaPark",
            title: "PI SETTAPARK",
            'icon': "industrial",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.661029,33.287857] 
        },
        properties: {
            idzone : "10",
            id : "pan-Ecoparc",
            title: "Ecoparc Berrechid",
            'icon': "industrial",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-2.9022578,35.0595624] 
        },
        properties: {
            idzone : "22",
            id : "selouane",
            title: "PI de Sélouane",
            'icon': "industrial",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-8.595858,33.146894] 
        },
        properties: {
            idzone : "24",
            id : "p2iJorf",
            title: "PI Jorf Lasfar",
            'icon': "industrial",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
          geometry: {
            type: 'Point',
          coordinates: [-5.4939898,35.5660034] },
                      properties: {
             idzone : "27",
            id : "tetouan-park",
            title: "Tetouan Park",
            'icon': "park",
            'marker-color': "#0f86bd"
  }
        },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.941449,31.9327] 
        },
        properties: {
            idzone : "36",
            id : "pan-p2iBouothmane",
            title: "ZI Sidi Bou Othmane",
            'icon': "industrial",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.819403,33.426411] 
        },
        properties: {
            idzone : "16",
            id : "pan-sahel",
            title: "OMRANE SAHEL",
            'icon': "commercial",
            'marker-color': "#ff9c00"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-5.07708,33.986798] 
        },
        properties: {
            idzone : "32",
            id : "pan-raselma",
            title: "Zi Miftah El Kheir RAS EL MA",
            'icon': "commercial",
            'marker-color': "#e11c1c"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.40933,33.66362] 
        },
        properties: {
            idzone : "33",
            id : "pan-zi-mohammedia",
            title: "ZI MOHAMMEDIA - OMRANE (casa)",
            'icon': "commercial",
            'marker-color': "#e11c1c"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-8.73901,31.550606] 
        },
        properties: {
            idzone : "29",
            id : "pan-zaeEnnasr",
            title: "ZAE d'Ennasr",
            'icon': "commercial",
            'marker-color': "#ff9c00"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-3.975956,35.15974] 
        },
        properties: {
            idzone : "28",
            id : "pan-zaeKamra",
            title: "ZAE Ait Kamra",
            'icon': "commercial",
            'marker-color': "#ff9c00"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-2.3504444,35.0339264] 
        },
        properties: {
            idzone : "11",
            id : "pan-Agropole-berkane",
            title: "Agropole de Berkane",
            'icon': "industrial",
            'marker-color': "#76d324"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-5.475928,33.840775] 
        },
        properties: {
            idzone : "13",
            id : "pan-Agropole-meknes",
            title: "Agropolis Meknes",
            'icon': "industrial",
            'marker-color': "#76d324"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-1.937037,34.769777] 
        },
        properties: {
            idzone : "43",
            id : "",
            title: "Oujda Shore Park",
            'icon': "city",
            'marker-color': "#0f86bd"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-5.3078342,35.651961] 
        },
        properties: {
            idzone : "41",
            id : "pan-tetouanshore",
            title: "Tetouan Shore",
            'icon': "industrial",
            'marker-color': "#ff9c00"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-4.960217,34.008783] 
        },
        properties: {
            idzone : "44",
            id : "fes-shore-park",
            title: "Fes Shore Park",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-6.722016,33.991623] 
        },
        properties: {
            idzone : "45",
            id : "technopolis-park",
            title: "Technopolis Park",
            'icon': "city",
            'marker-color': "#004463"
        }
    },
    {  
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [-7.6420098,33.5299122] 
        },
        properties: {
            idzone : "42",
            id : "casanearshore-park",
            title: "Casanearshore Park",
            'icon': "commercial",
            'marker-color': "#0f86bd"
        }
    },
    ]
}

function addMarkers() {
    places.features.forEach(function(marker) {
        // create a DOM element for the marker
        var el = document.createElement('div');
        
        el.style.width = '30px';
        el.style.height = '45px';
        el.style.backgroundSize = "cover";
        el.style.backgroundImage = 'url(https://a.tiles.mapbox.com/v4/marker/pin-m-' + marker.properties.icon + '+' + marker.properties["marker-color"].split('#')[1]+'@2x.png?access_token='+mapboxgl.accessToken+')';
        el.setAttribute('data-title', marker.properties.title);

        el.addEventListener('mouseenter', function(e) {
            el.style.cursor = 'pointer';
        });

        el.addEventListener('mouseleave', function() {
            el.style.cursor = '';
        });

        el.addEventListener('click', function(e) {
            document.getElementById("homePopUp").style.display = "block";
            document.getElementsByClassName("panel-title")[0].innerHTML = marker.properties.title;

        });
        // add marker to map
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);
    });
}

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl(({position: 'bottom-left'})));

map.on('load', function() {
    var mapCanvas = document.getElementsByClassName('mapboxgl-canvas')[0];
    mapCanvas.style.width = '60%';
    mapCanvas.style.height = '35%';
    mapCanvas.style.marginLeft = '20%';
    

    
    
    
    addMarkers();

    document.getElementById("close-popup").addEventListener("click",function() {
        document.getElementById("homePopUp").style.display = "none";
    });
});
