<?php

include 'connector.php';
include '../blocks/reg_header.php';

/*
    Kapitalist
    kapitalp
*/
?>
    <div class="registerForm">
        <?php
        if(isset($_GET['mess']))
        {
            echo "<p class='error'>".$_GET['mess']."</p>";
        }
        if(isset($_GET['modal']))
        {
            echo '<form name="registration_form" method="post" action="php/authorization.php">';
        }
        else
        {
            echo '<form name="registration_form" method="post" action="authorization.php">';
        }
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
                        echo '<td><a href="register.php">Register?</a></td><td id="c701">
<a href="../index.php" class="btn-primary btn">Back</a></td></tr>
<tr><td><a href="forgot.php">Forgot your password?</a></td>';
                    }
                    ?>
            </tr>
        </table>
    </div>

    <script src="../js/register.js"></script>
<?php
include "../blocks/reg_footer.php";
?>