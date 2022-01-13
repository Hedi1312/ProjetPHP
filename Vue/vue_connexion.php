<?php

require_once "./Vue/Vue.php";
class VueConnexion {

    function form_connexion() {
        Vue::render("Affichage/connexion.php",["titre"=>"Connexion"]);
    }

    function form_profil() {
        Vue::render("Affichage/profil.php",["titre"=>"Mon Profil"]);
    }


    function alerte_message($message,$alerte,$url) {
        Vue::alerte_message($message,$alerte,$url);
    }
}

?>