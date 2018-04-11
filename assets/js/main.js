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
	
  var map = new google.maps.Map(document.getElementById('map'), {
    center: latlng,
    zoom: 12
	});
	
}