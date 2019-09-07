$.ajaxSetup({ cache: false });
function getStates() {
    $.ajax({
        url: `/api/country/${$('#country').val()}`,
        success: function(res) {
            $('#state').empty();
            $('#city').empty();
            $.each(res, function(index, value) {
                // Set Tamilnadu as default
                if (value.id == 35) {
                    $('#state').append(`<option value="${value.id}" selected>${value.name}</option>`)
                }else{
                    $('#state').append(`<option value="${value.id}">${value.name}</option>`)
                }
            });
        },
        error: function(err) {
            console.log(err.responseText);
        }
    }).done(() => {
        getCities();
    });
}

function getCities() {
    $.ajax({
        url: `/api/state/${$('#state').val()}`,
        success: function(res) {
            $('#city').empty();
            $.each(res, function(index, value) {
                // Set Chennai as default
                if (value.id == 3659) {
                    $('#city').append(`<option value="${value.id}" selected>${value.name}</option>`)                
                } else {
                    $('#city').append(`<option value="${value.id}">${value.name}</option>`)
                }
            });
        },
        error: function(err) {
            console.log(err.responseText);
        }
    });
}

$('#country').change(getStates);
$('#state').change(getCities);

//Initialize Select2 Elements
$('.select2_country').select2()
$('.select2_state').select2()
$('.select2_city').select2()


// change default value of country, state,city
$('.select2_country').val(101).trigger('change');
// $('.select2_state').val(35).trigger('change');
// $('.select2_city').val(3659).trigger('change');