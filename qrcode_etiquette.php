<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function QR_CODE_ETIQUETTE($content, $path)
    {
        $errorCorrectionLevel = 'H';
        $matrixPointSize = 3;
        QRcode::png($content, $path,
        $errorCorrectionLevel, $matrixPointSize, 2);
    }
?>

