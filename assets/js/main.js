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
console.log(input)


const slider = document.querySelector('.carousel');
const instanceSlider = M.Carousel.init(slider, {

indicators:true,
numVisible:1
});
