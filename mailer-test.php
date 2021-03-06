<!doctype html>
<html lang="fr">
<meta charset="utf-8">

<form method="post" action="">
  <div class="row">

    <div class="col-md-6 col-xs-12">
      <label for="nom">Nom</label>
      <input type="text" required class="form-control" name="nom" id="nom" placeholder="Durant">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" required class="form-control" name="email" id="email" placeholder="jean.durant@example.com">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control message" required id="message" rows="6" cols="60" name="message" placeholder="Bonjour, je suis très intéréssé par..."></textarea>

      </div>
    </div>
    <div class="col-lg-offset-8 col-lg-4 col-sm-offset-8 col-sm-4 col-xs-offset-2 col-xs-9">
      <button type="submit" class="btn btn-envoyer right1">envoyer</button>
    </div>
  </div>
</form>

<?php
if(isset($_POST) && !empty($_POST['nom'])
&& !empty($_POST['prenom'])
&& !empty($_POST['message']))
{
  $destinataire = 'jb.hallassou@gmail.com';
  $header="MIME-Version: 1.0\r\n";
  $expediteur = "From:" . $_POST['nom'];
  $header.='Content-Type:text/html; charset="uft-8"'."\n";
  $header.='Content-Transfer-Encoding: 8bit';
  $succes = 'Mail envoyé avec succès';
  $echec = 'Echec envoi de mail';
  $probleme = 'Formulaire non soumis, veuillez complétez les champs manquants s\'il vous plaît';
  $message='
      Vous avez reçu un nouveau message du Formulaire de contact !



        Nom: ' . $_POST['nom'] . '

        Email : ' . $_POST['email'] . '

        

        Message: ' . $_POST['message'] . '
'
  ;
  $mail = mail($destinataire, "Nouveau message de news.pomset.fr", $message, $expediteur, $header);
if($mail) echo $succes; else echo $echec;
}
?>

</html>
