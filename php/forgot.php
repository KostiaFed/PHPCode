<?php
include 'connector.php';
include '../blocks/reg_header.php';
?>
    <div class="registerForm">
        <?php
        if(isset($_GET['mess']))
        {
            echo "<p class='error'>".$_GET['mess']."</p>";
        }
        ?>
        <form name="registration_form" method="post" action="forgotization.php">
        <label for="userLogin">Login:</label>
        <input name="userLogin" type="text" id="userLogin" class="form-control" required/>
        <label for="userEmail">Email:</label>
        <div style="display: flex">
            <input name="userEmail" type="email" id="userEmail" class="form-control" required/>
        </div>
        <input name="auth" type="submit" value="Send" class="btn btn-success form-control">
        </form>
        <div id="c702"><a href="../index.php" class="btn-primary btn">Back</a></div>
    </div>
<?php
include "../blocks/reg_footer.php";
?>