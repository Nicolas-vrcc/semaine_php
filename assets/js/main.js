// scroll reveal
window.sr = ScrollReveal()

sr.reveal(document.querySelectorAll('.scrollAppear'))
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
function initMap() {
	//Set latitude and longitude from hero_profile datas
  const latitude = coord[0]
  const longitude = coord[1]
	const latlng = new google.maps.LatLng(latitude, longitude)
	
	//Generate the map
  var map = new google.maps.Map(document.getElementById('map'), {
    center: latlng,
    zoom: 9
	});

	//Create the circle around number of kilometers that can drive the profile
	var cityCircle = new google.maps.Circle({
		strokeColor: '#00B7DB',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#00B7DB',
		fillOpacity: 0.35,
		map: map,
		center: latlng,
		radius: 30*1000 //convert kilometers to meters as required by Google
	});
}

// MODALS
var elem = document.querySelectorAll('.modal');
var instance = M.Modal.init(elem);

// pop-up mail
var modal = document.querySelector('.modal');
var instanceModal = M.Modal.init(modal, options);