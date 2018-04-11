// creates select
var elem = document.querySelectorAll('select')
var instance = M.FormSelect.init(elem)
elem.forEach((e) =>{
    console.log(e)
    let inst = M.FormSelect.init(e)
})


// carousel 
var elem = document.querySelector('.carousel');
var instance = M.Carousel.init(elem, {

indicators:true
});

// Google autocomplete
var input = document.querySelector('.autocompleted');
var options = {
    componentRestrictions: { country: 'fr' }
};

autocomplete = new google.maps.places.Autocomplete(input, options)



const slider = document.querySelector('.carousel');
const instanceSlider = M.Carousel.init(slider, {

indicators:true,
numVisible:1
});

//Map in hero profile
const latitude = coord[0]
const longitude = coord[1]

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: latitude, lng: longitude},
      zoom: 12
    });

    var drawingManager = new google.maps.drawing.DrawingManager({
      drawingMode: google.maps.drawing.OverlayType.MARKER,
      drawingControl: true,
      drawingControlOptions: {
        position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
      },
      markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
      circleOptions: {
        fillColor: '#ffff00',
        fillOpacity: 1,
        strokeWeight: 5,
        clickable: false,
        editable: true,
        zIndex: 1
      }
    });
    drawingManager.setMap(map);
  }