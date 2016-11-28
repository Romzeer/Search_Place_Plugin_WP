var service;
var map;
var infowindow;
var lat;
var lng;



console.log('trou');
function initMap() {

   document.getElementById('valider').onclick = function () {

  navigator.geolocation.getCurrentPosition(function(position) {
    var lati = position.coords.latitude;
    var lngi = position.coords.longitude;
      
      var paris = {lat: lati, lng: lngi};
      console.log(paris);
      var mapProp = {
            center: paris,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
    map = new google.maps.Map(document.getElementById('map'), mapProp);
    infowindow = new google.maps.InfoWindow();
;
var trou = document.getElementById("champ").value;
      var request = {
        location: paris,
        radius: '500',
        query: trou
      };

    var service = new google.maps.places.PlacesService(map);
    service.textSearch(request, callback);
  });
  event.preventDefault();
   }
      }
 

function callback(results, status) {


  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}


function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}