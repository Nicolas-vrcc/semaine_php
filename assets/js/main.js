// creates select
var elem = document.querySelectorAll('select')
var instance = M.FormSelect.init(elem)
elem.forEach((e) =>{
    console.log(e)
    let inst = M.FormSelect.init(e)
})


var elem = document.querySelector('.chips')
var instance = M.Chips.init(elem, {
    autocompleteOptions: {
        data: {
            'Apple': null,
            'Microsoft': null,
            'Google': null
        },
        limit: Infinity,
        minLength: 1
    }
})


const slider = document.querySelector('.carousel');
const instanceSlider = M.Carousel.init(slider, {

indicators:true,
numVisible:1
});