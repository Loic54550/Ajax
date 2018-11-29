window.onload = function() {



document.getElementById('continent').addEventListener('change', function() {
    var continentId = document.getElementById('continent').value;
    $.ajax({
        url: "controller/unScriptpays.php", // le script qui va etre appelé par ajax
        data: "continentId=" + continentId, // les param que tu veux utiliser dans le script
        type: "POST", // la methode
        success: function(html) {
            $("#pays").empty(); // vide la balise $('labalise')
            $("#pays").append(html); // ecrit dans la balise (le html a ecrire)
        }
    });
});

document.getElementById('pays').addEventListener('change', function() {
    var paysId = document.getElementById('pays').value;
    $.ajax({
        url: "controller/unScriptville.php", // le script qui va etre appelé par ajax
        data: "paysId=" + paysId, // les param que tu veux utiliser dans le script
        type: "POST", // la methode
        success: function(html) {
            $("#ville").empty(); // vide la balise $('labalise')
            $("#ville").append(html); // ecrit dans la balise (le html a ecrire)
        }
    });
});



}
