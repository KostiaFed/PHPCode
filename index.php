<?php
include 'blocks/reg_header.php';
?>

<script>
    const arr = [];
</script>

<style>
    <?php
    if(isset($_SESSION['login']))
    {
    echo'
    .ane
{
    display: inline-block;
    text-align: left;
    width: 90%;
    color: white;
}';
    }
    else
        {
            echo'
    .ane
{
    display: inline-block;
    text-align: left;
    width: 95%;
    color: white;
}';
    }
?>
.graay
{
    background-color: #5e5e5e;
    border: #5e5e5e;
}
.graay:hover
{
    background-color: #777777;
}
</style>

<?php
include "php/AddNew.php";

include "php/ScriptedModal.php";
?>

<div id="rgt">
    <div class="ane">
        <a class="graay btn btn-primary" href="index.php">Головна</a>|
        <a class="graay btn btn-primary" href="index.php?side=Professors">Професори</a>|
        <a class="graay btn btn-primary" href="index.php?side=Desciplines">Дисципліни</a>
    </div>
<?php

if(isset($_SESSION['login']))
{
    echo '<b class="short_marginator cloud">'.$_SESSION['login'].'</b><a href="php/destroy.php" class="btn-primary btn">Вихід</a>';
}
else
{
    echo '<button id="btn_modal_window1" onclick="modal(this.id)" style="border:none;" class="btn btn-primary">
Вхід
</button>';
   }
?>
</div>

<?php
if(isset($_GET['side']))
{
if($_GET['side'] == "Professors")
{
    include "php/Professors.php";
}
    if($_GET['side'] == "Desciplines")
    {
        include "php/Desciplines.php";
    }
}
else
{
    include "php/Updates.php";
}
?>

<?php
include "blocks/reg_footer.php";
?>
