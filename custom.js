/*global $,alert,console */

$(function() {

    'use strict';
//setting error status
var usererrors = true, 
    emailerrors =true,
    msgerrors =true;

/*
function checkerrors() {
   if( usererrors === true || emailerrors === true || msgerrors === true ){
    console.log('there is errors in form')
   }else{
    console.log('form is valid')

   }
}
*/

    $('.username').blur(function () {

        if ($(this).val().length <  4 ){  //show error

           $(this).css('border', '1px solid red')
           $(this).parent().find('.custom-alert').fadeIn(100);
           $(this).parent().find('.asterisx').fadeIn(100);
           usererrors = true;
        }else{  //no errors

            $(this).css('border', '1px solid green')
            $(this).parent().find('.custom-alert').fadeOut(100);
            $(this).parent().find('.asterisx').fadeOut(100);
            usererrors = false;

        }
        /*
        checkerrors();
*/
    });


    $('.email').blur(function () {

        if ($(this).val() === '' ){

           $(this).css('border', '1px solid red')
           $(this).parent().find('.custom-alert').fadeIn(100);
           $(this).parent().find('.asterisx').fadeIn(100);
           emailerrors = true;
        }else{

            $(this).css('border', '1px solid green')
            $(this).parent().find('.custom-alert').fadeOut(100);
            $(this).parent().find('.asterisx').fadeOut(100);
            emailerrors = false;

        }
        /*
        checkerrors();
*/
    });



    $('.message').blur(function () {

        if ($(this).val().length <  11  ){

           $(this).css('border', '1px solid red').parent().find('.custom-alert').fadeIn(100).end().find('.asterisx').fadeIn(100);
           msgerrors = true;
        }else{

            $(this).css('border', '1px solid green').parent().find('.custom-alert').fadeOut(100).end().find('.asterisx').fadeOut(100);
            msgerrors = false;

        }
        /*
        checkerrors();
*/
    });

//submit form validation

$('.contact-form').submit(function (e) {

    if( usererrors === true || emailerrors === true || msgerrors === true ){
        e.preventDefault();

        $('.username,.email,.message').blur();

    }
   


});


});


