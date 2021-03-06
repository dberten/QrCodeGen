<?php
 require 'lib/phpqrcode/phpqrcode/qrlib.php';
 include './src/qrcode.php';
 include './src/check_input.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' href='style/style.css'/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Generez votre QRCode</title>
    </head>
    <body>
        <header>
            <img src="src/images/logoEpi.png" class="logo" alt="logo"/>
            <center>
                <h1>QrCode Gen</h1>
            </center>
        </header>
        <br />
        <section>
            <nav id="menu">
                <h2>Choisissez un type de QRCode: </h2>
                <form id='type' name='type' method='post' action='index.php'>
                    <input type='button' name='btn1' value='Web'/>
                    <input type='button' name='btn2' value='Téléphone'/>
                    <input type='button' name='btn3' value='Recherche internet'/>
                    <input type='button' name="btn4" value="Envoi d'email"/>
                    <input type='button' name='btn5' value='Envoi de sms'/>
                </form> 
            </nav>
            <br />
            <center class="form" id='web_input'>
                   <form action="index.php" method="post">
                       <p>Entrez une url: <input placeholder="http://site.com" type="url" name="data" /></p>
                       <input type="submit" value="Valider"/> 
                   </form>
            </center>
            <?php
               if (isset($_POST['data'])) {
                   $content = $_POST['data'];
                   if (!$content || !verifUrl($content))
                        echo '<center id="error"><br />Veuillez renseigner une url valide.</center>';
                   else
                        QR_CODE($content);
               }
               ?>
            <center class="form" id='tel_input'>
                <form method="post" action="index.php">
                    <p>Numéro de Téléphone: <input placeholder="xxxxxxxxxx" type="tel" name="numero" /></p>
                    <input type="submit" value="Valider"/>
                </form>
            </center>
            <?php
               if (isset($_POST['numero'])) {
                   $phone= $_POST['numero'];
                   $content = "TEL:{$phone}";
                   if (!$phone || !verifTel($phone))
                       echo '<center id="error"><br />Veuillez indiquer un numéro valide.</center>';
                   else
                       QR_CODE($content);
               }
            ?>
             <center class="form" id='text_input'>
                   <form action="index.php" method="post">
                       <p>Entrez un texte: <input placeholder="chat" type="text" name="text" /></p>
                       <input type="submit" value="Valider"/> 
                   </form>
            </center>
               <?php
               if (isset($_POST['text'])) {
                   $content = $_POST['text'];
                   if (!$content)
                       echo '<center id="error"><br />Veuillez indiquer un texte.</center>';
                   else
                    QR_CODE($content);
               }
               ?>
             <center class="form" id='mail_input'>
                   <form action="index.php" method="post">
                    <p>Entrez une adresse mail: <input placeholder="aaaa@gmail.com" type="text" name="email" /></p>
                    <p>Entrez un objet: <input type="text" name="obj" /></p>
                    <p>Entrez votre message: </p>
                    <textarea name="message" rows="8" cols="45" ></textarea><br />
                    <br /><input placeholder="text" type="submit" value="Valider"/> 
                   </form>
            </center>
             <?php
               if (isset($_POST['email']) && isset($_POST['obj']) && isset($_POST['message'])) {
                   $email = $_POST['email'];
                   $objet = $_POST['obj'];
                   $message = $_POST['message'];
                   $content = 'mailto:'. $email . '?subject=' . urlencode($objet) . '&body=' . urlencode($message);
                   if (!$email || !verifEmail($email) || !$objet || !$message)
                       echo '<center id="error"><br />Veuillez remplir des informations valides.</center>';
                   else
                    QR_CODE($content);
               }
               ?>
            <center class="form" id='sms_input'>
                <form method="post" action="index.php">
                    <p>Entrez un numéro de Téléphone: <input placeholder="xxxxxxxxxx" type="text" name="num" /></p>
                    <p>Entrez votre message: </p>
                    <textarea name="msg" rows="4" cols="20" ></textarea><br />
                    <input type="submit" value="Valider"/>
                </form>
            </center>
        </section>
        <?php 
               if (isset($_POST['num']) && isset($_POST['msg'])) {
                   $num = $_POST['num'];
                   $msg = $_POST['msg'];
                   if (!$num || !verifTel($num))
                       echo '<center id="error"><br />Veuillez remplir des informations valides.</center>';
                   else {
                       $content = 'smsto:' . $num . ':' . $msg;
                       QR_CODE($content);
                   }         
               }
        ?>
        <footer>
            <h2><a href="./src/generate_pdf.php">GENERER UN PDF</a></h2>
        </footer>
    </body>
</html>
<script type="text/javascript" src="src/manage_event.js"></script>