// Simulateurs
// 
// Simulateur - Retirer le sumbit par l'entrée
$('#formGroupExampleInput').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});


// Simulateur - Calcul de ce que doit le locataire
$("#InputLocataire").on("change paste keyup", function() {
    var besoin_de_garantie = $("#InputLocataire").val();
    var frais_raw = besoin_de_garantie * 0.05;

    // En Dessous ce qui va être utilisé pour l'affichage
    var frais = frais_raw.toFixed(2);
    var total_du = parseFloat(frais);

    // Affichage dynamique
    $(".simu_loc").text(total_du);
});


// Simulateur - Calcul de ce que doit l'investisseur
$("#InputInvestisseur").on("change paste keyup", function() {
    var besoin_de_garantie = $("#InputInvestisseur").val();
    var frais_raw = besoin_de_garantie * 0.08;

    // En Dessous ce qui va être utilisé pour l'affichage
    var frais = frais_raw.toFixed(2);
    var total_du = parseFloat(frais);

    // Affichage dynamique
    $(".simu_inv").text(total_du);
});



// COLLASPE

$('.cardcollapse').click( function(e) {
    $('.collapse').collapse('hide');
});

//INSCRIPTION

$( ".invcard" ).on( "click", function() {
    $('.invcard').toggleClass("s-active-title");
    if ($(".loccard").hasClass("s-active-title")) {
        $('.loccard').toggleClass("s-active-title");
    };
});

$( ".loccard" ).on( "click", function() {
    $('.loccard').toggleClass("s-active-title");
    if ($(".invcard").hasClass("s-active-title")) {
        $('.invcard').toggleClass("s-active-title");
    };
});

/**** FORM TRICKS SF ****/

//send form
$('.click-sf').click(function (event) {

    event.preventDefault();
    var type        = $(this).attr('id');
    console.log(type);

    if (type === 'investor') {
        // get value for investor
        var lastname    = $('#sf-lastname').val();
        var firstname   = $('#sf-firstname').val();
        var email       = $('#sf-email').val();
        var pass        = $('#sf-pass').val();
        var passconfirm = $('#sf-pass-confirm').val();
        var birthday    = $('#sf-date').val();

        //set var to sf form for investor
        $('#fos_user_registration_form_email').val(email);
        $('#fos_user_registration_form_username').val(email);
        $('#fos_user_registration_form_plainPassword_first').val(pass);
        $('#fos_user_registration_form_plainPassword_second').val(passconfirm);
        $('#fos_user_registration_form_lastname').val(lastname);
        $('#fos_user_registration_form_firstname').val(firstname);
        $('#fos_user_registration_form_birthday').val(birthday);
        $('#fos_user_registration_form_type').val(type);
    }


    //set var to sf form for tenant
    if (type === 'tenant') {
        // get value for tenant
        var lastname_loc    = $('#sf-lastname-loc').val();
        var firstname_loc   = $('#sf-firstname-loc').val();
        var email_loc       = $('#sf-email-loc').val();
        var pass_loc        = $('#sf-pass-loc').val();
        var passconfirm_loc = $('#sf-pass-confirm-loc').val();
        var type_loc        = $(this).attr('id');
        var birthday_loc    = $('#sf-date-loc').val();
        var relation_loc    = $('#sf-relation-loc').val();
        var status_loc      = $('#sf-status-loc').val();
        var worktype_loc    = $('#sf-worktype-loc').val();
        var child_loc       = $('#sf-child-loc').val();
        var bail_loc        = $('#sf-bail-loc').val();
        var rent_loc        = $('#sf-rent-loc').val();
        var qsp_loc         = $('#sf-qsp-loc').val();

        $('#fos_user_registration_form_email').val(email_loc);
        $('#fos_user_registration_form_username').val(email_loc);
        $('#fos_user_registration_form_plainPassword_first').val(pass_loc);
        $('#fos_user_registration_form_plainPassword_second').val(passconfirm_loc);
        $('#fos_user_registration_form_lastname').val(lastname_loc);
        $('#fos_user_registration_form_firstname').val(firstname_loc);
        $('#fos_user_registration_form_birthday').val(birthday_loc);
        $('#fos_user_registration_form_relation').val(relation_loc);
        $('#fos_user_registration_form_status').val(status_loc);
        $('#fos_user_registration_form_worktype').val(worktype_loc);
        $('#fos_user_registration_form_child').val(child_loc);
        $('#fos_user_registration_form_bail').val(bail_loc);
        $('#fos_user_registration_form_rent').val(rent_loc);
        $('#fos_user_registration_form_qsp').val(qsp_loc);
        $('#fos_user_registration_form_type').val(type_loc);
    }

    $('.sf-form-send').click();
});
