var pos;
var map;
var markets = [];

$.ajax({
  url: '/getMarkets',
  type: 'get',
  success: function (msg) {
    markets = msg;
    initMap();
    setTimeout(function(){
      google.maps.event.trigger(map, 'resize');
    }, 400);
  },
  error: function () {
    alert('Error');
  }
});

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.567950, lng: -58.457611},
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    scrollwheel: false,
    mapTypeControl: false,
    styles: [
      { featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }] },
      { featureType: "transit", elementType: "labels", stylers: [{ visibility: "off" }] }
    ]
  });
  var infoWindow = new google.maps.InfoWindow({
    map: map,
    maxWidth: 350
  });

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {lat: position.coords.latitude, lng: position.coords.longitude};
      map.setCenter(pos);
      map.setZoom(15);
    }, function() {
      // handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    // handleLocationError(false, infoWindow, map.getCenter());
  }

  setMarkers(map, markets, infoWindow);
  infoWindow.close();
}

function setMarkers (map, markets, infoWindow) {
  for (var i = 0; i < markets.length; i++) {
    var market = markets[i];
    var marker = new google.maps.Marker({
      position: {lat: market.lat, lng: market.lng},
      map: map,
      title: market.name,
      icon: "/img/markets/" + market.name_id + ".png"
    });

    // var content = "<div id=\"iw-container\"><div class=\"iw-title\">"+ market.name +"</div><br><h6>"+ market.address +"</h6><br><br><a href=\"/market/" + market.name_id + "/" + market.id + "\">Ir a este Market</a></div>";

    var content = '<div id="iw-container">' +
                      '<div class="iw-title">'+ market['name']+ ' - '+ market['address'] +'</div>' +
                      '<div class="iw-content">' +
                        '<div class="iw-subTitle"><a href="/market/'+market['name_id']+'/'+market['id']+'">Ver Productos</a></div>' +
                        '<img src="img/markets/'+market['name_id']+'.jpg" alt="Porcelain Factory of Vista Alegre" width="100">' +
                        '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur perferendis modi asperiores explicabo provident atque aspernatur saepe nobis tempore nisi, sit quia excepturi odio ut in maxime eveniet animi totam!</p>' +
                        '<div class="iw-subTitle">Subtitulo</div>' +
                        '<p>Lorem ipsum dolor.<br>Sit amet, consectetur<br>'+
                      '</div>' +
                      '<div class="iw-bottom-gradient"></div>' +
                    '</div>';

    google.maps.event.addListener(marker, 'click', (function(marker, content, infoWindow) {
        return function() {
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
        };
    })(marker, content, infoWindow));
  }

  /* Closes infoWindow when click on map */
  google.maps.event.addListener(map, 'click', function() {
    infoWindow.close();
  });

  google.maps.event.addListener(infoWindow, 'domready', function() {

    // Reference to the DIV that wraps the bottom of infoWindow
    var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();

    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infoWindow 115px to the right.
    iwOuter.parent().parent().css({left: '115px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Moves the arrow 76px to the left margin.
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Changes the desired tail shadow color.
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

    // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({display: 'none'});

    // If the content of infoWindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });
  });
}

// function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//   infoWindow.setPosition(pos);
//   infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
//   infoWindow.open(map);
// }
