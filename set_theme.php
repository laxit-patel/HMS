<?php

if (isset($_GET["theme"]) && isset($_GET["loc"])) {
        $theme = $_GET["theme"];
        $loc = $_GET["loc"];

    setcookie("theme",$theme,time() + (10 * 365 * 24 * 60 * 60));
    setcookie("alert_true","Theme Applied",time() + (10 * 365 * 24 * 60 * 60));
    header("LOCATION:$loc");
    }
    else
    {
        setcookie("alert_false","Invalid Parameters",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:$loc");
    }




?>