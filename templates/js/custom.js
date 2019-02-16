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
