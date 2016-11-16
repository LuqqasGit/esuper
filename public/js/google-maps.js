// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.
var autocomplete;
var componentForm = {
street_number: 'short_name',
route: 'long_name',
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
postal_code: 'short_name'
};
var pos;
var map;

function initAutocomplete() {
// Create the autocomplete object, restricting the search to geographical
// location types.
autocomplete = new google.maps.places.Autocomplete(
  /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
  {types: ['geocode'],componentRestrictions: {country: "ar"}});

// When the user selects an address from the dropdown, call another function
autocomplete.addListener('place_changed', fillInAddress);
}

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.549, lng: -58.443},
    zoom: 14
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

// [START region_fillform]
function fillInAddress() {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();
// Get each component of the address from the place details
console.log(place.address_components);
  for (var i = 0; i < place.address_components.length; i++) {
    console.log(place.address_components[i].types[0]);
    console.log(place.address_components[i][componentForm]);
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

function initialize() {
  initMap();
  initAutocomplete();
}
