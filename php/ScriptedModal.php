<script>
    var vso = 0;
</script>

<div id="my_modal1" class="mdl">
    <div class="modal_content">
        <span id="close_modal_window1" class="close_modal_window" onclick="clos(this.id)">×</span>

        <div class="registerForm">
            <?php
            if(isset($_GET['mess']))
            {
                echo "<p class='error'>".$_GET['mess']."</p>";
            }
            echo '<form name="registration_form" method="post" action="php/authorization.php">';
            ?>
            <label for="userLogin">Login:</label>
            <input name="userLogin" type="text" id="userLogin" class="form-control" required>
            <label for="userPassword">Password:</label>
            <div style="display: flex">
                <input name="userPassword" type="password" id="userPassword" class="form-control" required"><img id="showPass" alt="show" src="../img/visible.png" onclick="showHide(this.id)"/>
            </div>
            <input name="auth" type="submit" value="Authorization" class="btn btn-success form-control">
            </form>
            <table><tr>
                    <?php
                    if(isset($_GET['modal']))
                    {
                        echo '<td><a href="php/register.php">Register?</a></td><td id="c700">
<a href="../index.php" class="btn-primary btn">Back</a></td></tr>
            <tr><td><a href="php/forgot.php">Forgot your password?</a></td>';
                    }
                    else
                    {
                        echo '<td><a href="php/register.php">Register?</a></td><td id="c701">
<a href="index.php" class="btn-primary btn">Back</a></td></tr>
<tr><td><a href="php/forgot.php">Forgot your password?</a></td>';
                    }
                    ?>
                </tr>
            </table>
        </div>

        <script src="../js/register.js"></script>
    </div>
</div>

<div id="my_modal2" class="mdl">
</div>

<?php

include "ConnectCreator.php";

echo '<script>
    function clos(id) {
        var id1 = id.substr(18);
        var span="close_modal_window"+id1
        var mod=\'my_modal\'+id1;
        var modal = document.getElementById(mod);
        var span = document.getElementById(span);

        modal.style.display = "none";
    }    
    function ProfileLobbier(id, vc) {
        location = "../index.php?side=Professors&openInfo=" + vc + "&id=" + id;
    }
'; ?>

<?php
include "modalJS.php";

echo '</script>';