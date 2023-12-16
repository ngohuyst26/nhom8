<?php
function decentralization( $uri = false)
{   $uri = 'false';
    $uri = $uri != 'false' ? $uri : $_SERVER['REQUEST_URI'];
    $data_checks = $_SESSION['admin']['check'];
    $data_check = implode("|",$data_checks);
    preg_match('/'.$data_check.'/',$uri,$matches);
    return !empty($matches);
}
?>