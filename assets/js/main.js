//Set URL
let url = document.location.href

// MODALS
var modals = document.querySelectorAll('.modal');
modals.forEach((e) => {
	M.Modal.init(e);
})
// scroll reveal
if(url.match('user_list')){
	window.sr = ScrollReveal()
	sr.reveal(document.querySelectorAll('.scrollAppear'))

}

// pop-up mail
var modal = document.querySelector('.modal');
var instanceModal = M.Modal.init(modal);


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

/* // Google autocomplete
if(url.match('edit_profile') || url.match('inscription')){
var input = document.querySelector('.autocompleted');
var options = {
    componentRestrictions: { country: 'fr' }
};
	const autocomplete = new google.maps.places.Autocomplete(input, options)
} */

const slider = document.querySelector('.carousel');
const instanceSlider = M.Carousel.init(slider, {

indicators:true,
numVisible:1
});


//Map in hero profile
if(url.match('hero_profile')){
	function initMap() {
		//Set latitude and longitude from hero_profile datas
		const latitude = coord[0]
		const longitude = coord[1]
		const latlng = new google.maps.LatLng(latitude, longitude)
		
		//Generate the map
		var map = new google.maps.Map(document.getElementById('map'), {
			center: latlng,
			zoom: 11
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
			radius: 5*1000 //convert kilometers to meters as required by Google
		});
	}
}

//FILESTACK
if(url.match('hero_profile')){
	const fsClient = filestack.init('A9EkyH78NTrKHwJFFWKbWz');
	function openPicker() {
		fsClient.pick({
			fromSources:["local_file_system","facebook","instagram"],
			transformations:{
			crop:true},
			accept:["image/*"],
			maxSize:3000000,
			maxFiles:1,
			lang:"fr"
		}).then(function(response) {
			const url = response.filesUploaded[0].url
			window.location.href = "/dashboard/edit_profile?profilepicture1=" + url
		});
	}
}