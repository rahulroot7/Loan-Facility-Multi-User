
$(function () {
    $("#incentive_form").validate({
        rules: {
            name: {
                required: true,                        
            },
            from_amount:{
                required: true,
                number: true
            },
            to_amount:{
                required: true,
                greaterThan: '#from_amount',
                number: true
            },
            percentage:{
                required: true,
                maxlength: 2,
                number: true
            }
        },
        messages: {
            name: {
                required: "The Name field is required.",                        
            },
            from_amount: {
                required: "The From Amount field is required.",  
                number: "The from amount must be a number."                                              
            },
            to_amount: {
                required: "The To Amount field is required.", 
                number: "The to amount must be a number."                                             
            },
            percentage: {
                required: "The Percentage Amount field is required.",                                                
                maxlength: "The percentage must not be greater than 100."
            }
        }
    });
    
    $.validator.addMethod("greaterThan",

    function (value, element, param) {
    var $min = $(param);
    if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
        $(element).valid();
        });
    }
    return parseInt(value) > parseInt($min.val());
    }, "To Amount  must be greater than From Amount");
});


// document validation


$(function () {
    $("#document_form").validate({
        rules: {
            name: {
                required: true,                        
            },
            type: {
                required: true,                        
            }
        },
        messages: {
            name: {
                required: "The Name field is required.",                        
            },
            type: {
                required: "The type field is required.",                                                                       
            }
        }
    });
});

