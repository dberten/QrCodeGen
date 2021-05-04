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
?>