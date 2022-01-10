<head>
    <script src="https://kit.fontawesome.com/6440c9a3af.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body id="body">
<div class="container rounded bg-light mt-3" >
    <div class="row">
        <div class="col-md-4 border-right">

            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php
                if ($data['sexe']=='madame'): ?>
                    <img class="rounded-circle mt-5" src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mb-4" alt=""  width="90" />
                <?php else: ?>
                    <img class="rounded-circle mt-5" src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mb-4" alt="" width="90" />
                <?php endif; ?>
                <?= $data['nom'] ?> <?= $data['prenom'] ?><span class="font-weight-bold"></span><span class="text-black-50"><?= $data['login'] ?></span><span><?= $data['ville'] ?></span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mr mb-1"></i>
                        <a href="index.php?module=ModProfil&action=Profil" class="btn btn-info" role="button">Revenir Au profil</a>
                    </div>
                </div>
                <div class="mt-3 btn-group-vertical">
                    <button type="submit" class="btn btn-danger "><a id="mesMatchs" href='?module=ModMatchs&action=MesMatchs&id=<?= $data['idUtilisateur']?>'>Mes Matchs</a></button>
                    <button type="submit" class="btn btn-success "><a id="rechercherMatchs" href='?module=ModMatchs&action=RechercherTousLesMatchs&id=<?= $data['idUtilisateur']?>'>Rechercher Matchs</a></button>
                    <button type="submit" class="btn btn-warning "><a id="creerMatch" href='?module=ModMatchs&action=FormulaireCreationMatch'>Creer Un Match</a></button>
                    <button type="submit" class="btn btn-primary "><a id="ajouterPhotos" href='?module=ModMatchs&action=FormAjouterPhotosMatchs'>Ajouter des photos</a></button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        agenda de nos amis
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Agenda des matches auxquels participent nos amis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?=include_once('agenda.php'); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>