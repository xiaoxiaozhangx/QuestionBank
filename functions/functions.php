<?php
function get_header(){
    require_once './includes/header.php';
}
function get_footer(){
    require_once './includes/footer.php';
}

function get_part($addpart){
    include_once('./views/'.$addpart);	
}