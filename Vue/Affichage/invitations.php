<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
<?php
$liste = $data;
if (!empty($liste)): ?>
<div class="container mt-5">
    <table class="table table-striped borderStyleTable">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Confirmation</th>
            <th scope="col">Refuse</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $value): ?>
            <tr>
                <td><?= $value['nom'] ?> </td>
                <td><?= $value['prenom']?></td>
                <td><button type="submit" class="btn btn-success "><a id="accepterDemande" href='?module=ModAmis&action=AccepterDemande&id=<?= $value['idUtilisateur']?>'>Accepter</a></button></td>
                <td><button type="submit" class="btn btn-danger"><a id="refuserDemande" href='?module=ModAmis&action=RetirerAmi&id=<?= $value['idUtilisateur']?>'>Refuser</a></button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Aucun Demandes d'ami</div>
    <?php endif; ?>
</body>