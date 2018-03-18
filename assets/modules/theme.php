<?php

function theme($for)
{
    if($for == "color") {
        if ($_COOKIE["theme"] == 'Professional') {
            echo "style='background-color:#319997'";

        } elseif ($_COOKIE["theme"] == 'Casual') {
            echo "";
        }
        else
        {
            echo "";
        }
    }
    elseif($for == "image")
    {
         if ($_COOKIE["theme"] == 'Professional') {
            echo "background-image:url(assets/img/HMS_BG.jpg);";
        }
        elseif($_COOKIE["theme"] == 'Casual')
        {
            echo "background-image:url(assets/img/casual.jpg);";
        }
        else
        {
            echo "";
        }
    }
    elseif($for == "class")
    {
        if ($_COOKIE["theme"] == 'Professional') {
            echo "color_professional";
        }
        elseif($_COOKIE["theme"] == 'Casual')
        {
            echo "color_casual";
        }
        else
        {
            echo "";
        }
    }
    elseif($for == "class_header")
    {
        if ($_COOKIE["theme"] == 'Professional') {
            echo "header-professional";
        }
        elseif($_COOKIE["theme"] == 'Casual')
        {
            echo "header-casual";
        }
        else
        {
            echo "header-primary";
        }
    }
    elseif($for == "class_btn")
    {
        if ($_COOKIE["theme"] == 'Professional') {
            echo "btn-professional";
        }
        elseif($_COOKIE["theme"] == 'Casual')
        {
            echo "btn-casual";
        }
        else
        {
            echo "btn-primary";
        }
    }
    elseif($for == "class_filter")
    {
         if ($_COOKIE["theme"] == 'Professional')
         {
             echo "header-filter-professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           echo "header-filter-casual";
        }
         else
        {
            echo "header-filter";
        }
    }
    elseif($for == "gradient")
    {
        if ($_COOKIE["theme"] == 'Professional')
        {
            echo "background: linear-gradient(-100deg,rgba(49, 153, 151, 0.4),rgba(49, 153, 151, 0.2));";
        }
        elseif($_COOKIE["theme"] == 'Casual')
        {
            echo "background: linear-gradient(-100deg,rgba(156, 39, 176, 0.4),rgba(156, 39, 176, 0.2));";
        }
        else
        {
            echo "";
        }
    }
    elseif($for == "class_sidebar")
    {
         if ($_COOKIE["theme"] == 'Professional')
         {
             echo "sidebar-professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           echo "sidebar-casual";
        }
         else
        {
            echo "";
        }
    }
    elseif($for == "class_table")
    {
         if ($_COOKIE["theme"] == 'Professional')
         {
             echo "full-color-professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           echo "full-color-casual";
        }
         else
        {
            echo "full-color-purple";
        }
    }
    elseif($for == "class_moving_tab")
    {
         if ($_COOKIE["theme"] == 'Professional')
         {
             echo "professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           echo "casual";
        }
         else
        {
            echo "purple";
        }
    }
    elseif($for == "id_btn")
    {
         if ($_COOKIE["theme"] == 'Professional')
         {
             echo "btn_professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           echo "btn_casual";
        }
         else
        {
            echo "";
        }
    }

}



?>