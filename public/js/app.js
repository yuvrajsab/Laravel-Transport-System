// close alert after 3sec
setTimeout(function() {
    $('.timed-alert').alert('close')
},3000)

// form validation
$("#form").parsley({
    successClass: "has-success",
    errorClass: "has-error",
    classHandler: function(e) {
        return e.$element.closest('.form-group');
    },
    errorsWrapper: "<span class='help-block'></span>",
    errorTemplate: "<span></span>"
});

// jquery-confirm
$('a.deletelink').confirm({
    theme: 'bootstrap',
    draggable: false,
});

$(document).on('click','button.deletebutton',function(e) {
    let context = $(this);
    e.preventDefault();
    $.confirm({
        title: "Delete Customer",
        theme: 'bootstrap',
        draggable: false,
        buttons: {
            OK: function() {
                context.parent().submit();
            },
            Close: function() {}
        }
    });
})

// generate unique id
function guid() {
    function _p8(s) {
        var p = (Math.random().toString(16)+"000000000").substr(2,8);
        return s ? "-" + p.substr(0,4) + "-" + p.substr(4,4) : p ;
    }
    return _p8() + _p8(true) + _p8(true) + _p8();
}
