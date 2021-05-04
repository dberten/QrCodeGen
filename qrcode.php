<?php
function QR_CODE($content)
{
    $filename = './qrcode_etiquette.png';
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 5;
    QRcode::png($content, $filename,
    $errorCorrectionLevel, $matrixPointSize, 1, false);
    echo '<br /><center id="qr"><h3>Voici votre QR Code:</h3><br /><center><img src="qrcode_etiquette.png" alt="qrcode" /></center></center><br /><br />';
}
?>
<script type="text/javascript" src="./index.js"></script>
<link rel='stylesheet' href='style.css'/>