<?php
return array(
    'db' => 'DataBase.db'
#'db' => 'kapitalp_Proffesors',
#'user' => 'root',
#'pass' => '',
);

function reti($row)
{
    return "<div class ='row'><div class='dv'>" . $row[0] . "</div><div class='dv'>" . $row[1] . "</div></div>";
}