<?php
    function verifEmail($email) {
        $pattern = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";
        if (preg_match($pattern, $email))
            return true;
         else
            return false;
    }
    function verifTel($tel) {
        $pattern = "#^[0][1376]([0-9]{2}){4}$#";
        if (preg_match($pattern, $tel))
            return true;
        else
            return false;
    }
    function verifUrl($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_NOBODY, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);

        if(!curl_exec($curl))
            return false;
        else 
            return true;
    }    
?>