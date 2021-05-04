<?php
    include 'qrcode.php';
    require_once '../lib/tcpdf/tcpdf_min/tcpdf_import.php';
    
    ob_start(); 
    if (isset($_POST['create_pdf'])) {
        $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("Creation d'etiquette"); 
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 12);
        $obj_pdf->AddPage();
        $content = ob_get_clean();
        $content .= '  
        <h3 align="center">Votre QR Code:</h3><br /><br />  
        <center>
            <img align="auto" src="images/qrcode_etiquette.png" alt="qrcode"/>
        </center>
        ';
        $obj_pdf->writeHTML($content);
        ob_end_clean();
        $obj_pdf->Output('etiquette.pdf', 'I'); 
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' href="../style/generate_pdf.css" />
        <title>Etiquette Generateur</title>
    </head>
    <header>
        <h3 align="center">Voici votre QR Code:</h3>
    </header>
    <body>
        <br /><br />        
       <center><img src="images/qrcode_etiquette.png" alt="qrcode"/></center>
        <br />  
        <form method="post" class='create_pdf'>
            <p>Cliquez pour generer votre pdf</p>
            <input type="submit" name="create_pdf" value="Create PDF" />
        </form>
    </body>
</html>


