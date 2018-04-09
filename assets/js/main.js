// creates select
var elem = document.querySelector('select')
var instance = M.FormSelect.init(elem)

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