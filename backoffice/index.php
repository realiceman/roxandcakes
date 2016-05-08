<?php
include('../bdd.php');
$menuFr = fopen('frmenu.txt', 'r+');
$menuEn = fopen('enmenu.txt', 'r+');
if(!empty($_POST)){
    extract($_POST);
    ftruncate($menuFr, 0);
    fputs($menuFr, $nouveauFr);
    header('Location: index.php');
}


if(!empty($_GET)){
    extract($_GET);
	ftruncate($menuEn, 0);
	fputs($menuEn, $nouveauEn);
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style.css">
        <title>Espace administrateur</title>
    </head>
    <body>
        <h1>Consulter les réservations</h1>
        <table>
            <tr>
                <th>Jour/heure de la réservation</th>
                <th>Nom</th>
                <th>Nombre de couverts</th>
                <th>Adresse e-mail</th>
                <th>Suppression</th>
            </tr>
            <?php
            $select = $bdd->query("SELECT * FROM reservations ORDER BY jour");
            while($donnees_select = $select->fetch()){
                ?>
                <tr>
                    <td>
                    <?php
                    $jour = $donnees_select['jour'];
                    $jour = str_split($jour,1);
                    echo $jour[8].''.$jour[9].'/'.$jour[5].''.$jour[6].'/'.$jour[0].''.$jour[1].''.$jour[2].''.$jour[3].' à '.$jour[11].''.$jour[12].':'.$jour[14].''.$jour[15];
                    ?>
                    </td>
                    <td><?php echo $donnees_select['nom']; ?></td>
                    <td><?php echo $donnees_select['couverts']; ?></td>
                    <td><?php echo $donnees_select['email']; ?></td>
                    <td><a href="supprimer.php?reservation=<?php echo $donnees_select['annulation']; ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form method="post" action="index.php">
            <h1>Modifier le menu français</h1>
            <textarea name="nouveauFr"><?php while($ligne = fgets($menuFr))echo $ligne;fclose($menuFr); ?></textarea>
            <input type="submit" value="MODIFIER" />
        </form>
		  <form method="get" action="index.php">
            <h1>Modifier le menu US/UK</h1>
            <textarea name="nouveauEn"><?php while($ligne = fgets($menuEn))echo $ligne;fclose($menuEn); ?></textarea>
            <input type="submit" value="MODIFIER" />
        </form>
    </body>
</html>