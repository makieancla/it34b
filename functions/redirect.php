<?php

function redirect($path){
    header("location:" . BASE_URL . $path);
    exit;
}
?>