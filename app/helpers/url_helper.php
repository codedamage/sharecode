<?php
//Redirect to page
function redirect($location)
{
    header('Location: '.URLROOT.''.$location);
}