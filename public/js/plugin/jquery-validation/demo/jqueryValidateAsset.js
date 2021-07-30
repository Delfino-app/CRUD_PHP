jQuery.extend(jQuery.validator.messages, {
  required: "This field is required.",
  remote: "Please fix this field.",
  email: "Please enter a valid email address.",
  url: "Please enter a valid URL.",
  date: "Please enter a valid date.",
  dateISO: "Please enter a valid date (ISO).",
  number: "Please enter a valid number.",
  digits: "Please enter only digits.",
  creditcard: "Please enter a valid credit card number.",
  equalTo: "Please enter the same value again.",
  accept: "Please enter a value with a valid extension.",
  maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
  minlength: jQuery.validator.format("Please enter at least {0} characters."),
  rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
  range: jQuery.validator.format("Please enter a value between {0} and {1}."),
  max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
  min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});




$(document).ready(function(){
    $("#registration").validate({
      // Specify validation rules
      rules: {
        firstname: "required",
        lastname: "required",
        email: {
          required: true,
          email: true
        },      
        phone: {
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 10,
        },
        password: {
          required: true,
          minlength: 5,
        }
      },
      messages: {
        firstname: {
        required: "Please enter first name",
       },      
       lastname: {
        required: "Please enter last name",
       },     
       phone: {
        required: "Please enter phone number",
        digits: "Please enter valid phone number",
        minlength: "Phone number field accept only 10 digits",
        maxlength: "Phone number field accept only 10 digits",
       },     
       email: {
        required: "Please enter email address",
        email: "Please enter a valid email address.",
       },
      },
   
    });
  });
  