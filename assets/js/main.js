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