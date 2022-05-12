<?php
include "../blocks/reg_header.php";
?>
<div class="registerForm">
    <form name="registration_form" method="post" action="authorization.php">
        <label for="userName">Name:</label>
        <input name="userName" type="text" id="userName" class="form-control" required>
        <label for="userLogin">Login:</label>
        <input name="userLogin" type="text" id="userLogin" class="form-control" required>
        <label for="userEmail">Email:</label>
        <input name="userEmail" type="email" id="userEmail" class="form-control" required>
        <label for="userPassword">Password:</label>
        <div style="display: flex">
            <input name="userPassword" type="password" id="userPassword" class="form-control" required onkeyup="check()"><img id="showPass" alt="show" src="../img/visible.png" onclick="showHide(this.id)"/>
        </div>
        <label for="userPasswordConfirm">Confirm password:</label>
        <div style="display: flex">
            <input name="userPasswordConfirm" type="password" id="userPasswordConfirm" class="form-control" required onkeyup="check()"><img id="showConfPass" alt="show" src="../img/visible.png" onclick="showHide(this.id)"/>
        </div>
        <div id="passMatch"></div>
        <label for="userStaff">Staff:</label>
        <select name="userStaff" id="userStaff" class="form-control">
            <option>Visitor</option>
            <option>Admin</option>
        </select>
        <input name="register" type="submit" value="Register" class="btn btn-success form-control">
        <div id="c702"><a href="../index.php" class="marginator btn-primary btn">Back</a></div>
    </form>
</div>
<script src="../js/register.js"></script>
<?php
include "../blocks/reg_footer.php";
?>