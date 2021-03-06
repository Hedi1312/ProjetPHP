<?php

require_once './Connexion.php';

class ModeleProfil extends Connexion
{

    public function __construct()
    {

    }

    function getProfil($login)
    {
            $sql = 'select * from utilisateur natural join identifiants where login = ?';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($login));
            return $req->fetch();
    }

    function modifierProfil($nomNv, $prenomNv, $ageNv, $sexeNv, $posteNv,$emailNv,$villeNv,$passwordNv,$login)
    {
            $ChangementLogin=false;
            if (!empty($_POST['nomNv'])) {
                $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.nom=? WHERE b.login =? ';
                $req = self::$bdd->prepare($sql);
                $req->execute(array($nomNv, $login));
            }
            if (!empty($_POST['prenomNv'])) {
                $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.prenom=? WHERE b.login =? ';
                $req = self::$bdd->prepare($sql);
                $req->execute(array($prenomNv, $login));
            }
            if(!empty($_POST['ageNv'])) {
                $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.age=? WHERE b.login =? ';
                $req = self::$bdd->prepare($sql);
                $req->execute(array($ageNv, $login));
            }
            if (!empty($_POST['civiliteNv'])) {
                $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.sexe=? WHERE b.login =? ';
                $req = self::$bdd->prepare($sql);
                $req->execute(array($sexeNv, $login));
            }
            if (!empty($_POST['posteNv'])) {
            $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.posteMatch=? WHERE b.login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($posteNv, $login));
            }
            if (!empty($_POST['villeNv'])) {
            $sql = 'UPDATE  utilisateur a INNER JOIN identifiants b ON a.idLogin = b.idLogin SET a.ville=? WHERE b.login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($villeNv, $login));
            }
            if (!empty($_POST['emailNv'])) {
            $sql = 'UPDATE  identifiants a SET a.login=? WHERE a.login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($emailNv, $login));
            Vue::render("Affichage/messageAlerte.php");
            $ChangementLogin=true;
            }
            if (!empty($_POST['passwordNv'])) {
            $sql = 'UPDATE  identifiants a SET a.password=? WHERE a.login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($passwordNv, $login));
            Vue::render("Affichage/messageAlerte.php");
            $ChangementLogin=true;
            }
            if($ChangementLogin!=true){
                Vue::render("Affichage/profil.php", ["nom" => $this->getProfil($login)['nom'], "prenom" => $this->getProfil($login)['prenom'], "age" => $this->getProfil($login)['age'],
                "sexe" => $this->getProfil($login)['sexe'],"posteMatch" => $this->getProfil($login)['posteMatch'],"ville" => $this->getProfil($login)['ville'],"login" => $this->getProfil($login)['login']] );

            }

        }
        function supprimerLeProfil($login){


            $sql = 'DELETE FROM participer where idUtilisateur IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($login));

            $sql1 = 'DELETE FROM notification where idUtilisateur IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ';
            $req1= self::$bdd->prepare($sql1);
            $req1->execute(array($login));

            $sql2 = 'DELETE FROM invitationMatch where idUtilisateur IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) or idUtilisateur_1 IN(SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) ';
            $req2= self::$bdd->prepare($sql2);
            $req2->execute(array($login,$login));

            $sql3 = 'DELETE FROM espaceDiscussion where idUtilisateur IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)';
            $req3= self::$bdd->prepare($sql3);
            $req3->execute(array($login));

            $sql4 = 'DELETE FROM avoirNote where idUtilisateur IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?) or idUtilisateur_1 IN (SELECT idUtilisateur from utilisateur natural join identifiants where login= ?)';
            $req4= self::$bdd->prepare($sql4);
            $req4->execute(array($login,$login));

            $sql5 = 'DELETE FROM etreAmi WHERE idUtilisateur IN (select idUtilisateur from utilisateur INNER JOIN identifiants ON identifiants.idLogin = utilisateur.idLogin WHERE identifiants.login = ?)';
            $req5 = self::$bdd->prepare($sql5);
            $req5->execute(array($login));

            $sql7 = 'DELETE FROM etreAmi WHERE idUtilisateur_1 IN (select idUtilisateur from utilisateur INNER JOIN identifiants ON identifiants.idLogin = utilisateur.idLogin WHERE identifiants.login = ?)';
            $req7 = self::$bdd->prepare($sql7);
            $req7->execute(array($login));

            $sql8 = 'DELETE utilisateur, identifiants FROM utilisateur INNER JOIN identifiants ON identifiants.idLogin = utilisateur.idLogin WHERE identifiants.login = ?';
            $req8 = self::$bdd->prepare($sql8);
            $req8->execute(array($login));

        }
        function getUtilisateur($idUtilisateur){
            $req = self::$bdd->prepare("SELECT * FROM utilisateur natural join identifiants where idUtilisateur=:idUtilisateur");
            $req->bindParam('idUtilisateur', $idUtilisateur);
            $req->execute();
            $res = $req->fetch();
            return $res;
        }



}
?>