<form name="form1" method="post" action="../index.php?side=Desciplines" style="margin: 5px; width: 99%;">
    <table style="width: 30%; display: inline;" >
        <tr class="brd">
            <td>
                <label>Пошук за назвою</label>
            </td>
            <td>
                <input type="text" name="SHC"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="Шукати" class="btn btn-danger" name="search">
    <a href="../index.php?side=Desciplines" class="btn-primary btn">Всі</a>
    <a href="primer.php?side=Desciplines" class="btn-primary btn">Звіт</a>
</form>
<div class="marginator">
    <?php
    if(isset($_SESSION['role'])) {
        if($_SESSION['role'] == "Admin") {
            echo '<button id="btn_modal_window3" onclick="modal(this.id)" style="border:none;" class="btn btn-primary">
        Додати нову дисципліну
        </button>';
        }
    }
    ?>
</div>

<div class="snow">
    <table class="table table-bordered" style="margin: 10px; width: 99%;">
        <tbody><tr>
            <th>ID</th>
            <th>Назва</th>
        </tr>
        <?php

        if (isset($_POST['add'])) {

            if(strval($_POST['DN']) == "")
            {
                ?>
                <script>alert ("Поле імені не може бути пустим!");</script>
            <?php
            }
            else {
                $str = "insert into Disciplines (descipline_name) Values ('" . $_POST['DN']."')";
                $pdo->query($str);
            }
        }

        if (isset($_POST['delete'])) {
            $str = "delete from Disciplines where ID = ".$_GET['viclim'];
            $pdo->query($str);
        }

        if (isset($_POST['search'])) {
            $result = $pdo->query("select ID, descipline_name from Disciplines where descipline_name Like '%".$_POST['SHC']."%' ORDER BY ID");
        }
        else {
            $result = $pdo->query("select ID, descipline_name from Disciplines");
        }

        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
            echo '<tr class="tra"><th>'.$row[0].'</th>';
            echo '<th>'.$row[1].'</th>';
            if(isset($_SESSION['role'])) {
                if($_SESSION['role'] == "Admin") {
                    echo '<th><button id="btn_modal_window2" onclick="modal(this.id, ' . $row[0] . ')" style="border:none;" class="btn lsnow">
<img src="img/delete.png" width="10px" />
</button></th>';
                }}
                   }

        ?>
        </tbody>
    </table>
</div>
