<script>
    function ArrOC(id)
    {
        if(arr.indexOf(id) == -1)
        arr.push(id);
        else
            arr.splice(arr.indexOf(id), 1);
    }

</script>

<form name="form1" method="post" action="../index.php?side=Professors" style="margin: 5px; width: 99%;">
    <table style="width: 30%; display: inline;" >
        <tr class="brd">
            <td>
                <label>Пошук за іменем</label>
            </td>
            <td>
                <input type="text" name="SHC"/>
            </td>
        </tr>

        <tr class="brd">
            <td>
                <label>Тільки кадрові</label>
            </td>
            <td>
                <input type="checkbox" name="CADET" value="Yes"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="Шукати" class="btn btn-danger" name="search">
    <a href="../index.php?side=Professors" class="btn-primary btn">Всі</a>
    <a href="primer.php?side=Professors" class="btn-primary btn">Звіт</a>
</form>
<div class="marginator">
    <?php
echo '<script>function modalko(id, vc) {
        vso = vc;
        var id1=id.substr(16);
        var cn=\'btn_modal_window\'+id1;
        var mod=\'my_modal\'+id1;
        var modal = document.getElementById(mod);

        var btn = document.getElementById(cn);
        modal.style.display = "block";
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }</script>
';
    if(isset($_SESSION['role'])) {
        if($_SESSION['role'] == "Admin") {
            echo '<button id="btn_modal_window3" onclick="modalko(this.id)" style="border:none;" class="btn btn-primary">
        Додати нового професора
        </button>';
        }
    }
    ?>
</div>

<div class="snow">
    <table class="table table-bordered" style="margin: 10px; width: 99%;">
        <tbody><tr>
            <?php
            if(isset($_SESSION['role'])) {
            if($_SESSION['role'] == "Admin") {
            echo '<th></th>';
            }}
            ?>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Адреса</th>
            <th>Телефон</th>
            <th>Кадровість</th>
            <th>Напрацьовані години</th>
            <th>Дата народження</th>
        </tr>

        <?php

        if(isset($_GET['cc']))
        {
            $str = 'SELECT * FROM ProfessorDisciplines WHERE ID_Professor = '.$_GET['cc'].' && ID_Discipline = '.$_GET['cc2'];
            $result = $pdo->query($str);
            $count = 0;

            while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                $count++;
            }

            if($count > 0)
            {
                echo '<script>alert("У цього професора вже є така дисципліна!");</script>';
                $count = 0;
            }
            else {
                $str = "insert into ProfessorDisciplines (ID_Professor, ID_Discipline) Values (" . $_GET['cc'] . "," . $_GET['cc2'] . ")";
                $pdo->query($str);
            }
        }
        if (isset($_POST['add'])) {

            if(strval($_POST['PN']) == "")
            {
                ?>
                <script>alert ("Поле імені не може бути пустим!");</script>
            <?php
            }
            else if(strval($_POST['PH']) == "")
            {
            ?>
                <script>alert ("Поле номеру телефона не може бути пустим!");</script>
            <?php
            }
            else {
            $str = 'SELECT * FROM `Professors` WHERE Phone = "'.$_POST['PH'].'"';
            $result = $pdo->query($str);
            $count = 0;

            while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                $count++;
            }

            if($count > 0)
            {
                echo '<script>alert ("Номер телефону мусить бути унікальним!!!");</script>';
                $count = 0;
            }
            else {
                try {
                        $wh=$_POST['WH'] + 0;
                        $bd="0001-01-01";
                        if(strval($_POST['BD']) != "")
                        {
                            $bd=$_POST['BD'];
                        }
                $str = "insert into Professors (Name_Professor, Adress, Phone, ID_ScienceRank, ID_Staff, WorkingHours, BirthDate) Values ('" . $_POST['PN'] . "', '" . $_POST['AD'] . "', '" . $_POST['PH'] . "', '" . $_POST['Rnk'] . "', '" . $_POST['Stf'] . "', '" . $wh . "', '" . $bd . "')";
                $pdo->query($str);
                echo '<script>location = "../index.php?side=Professors"</script>';
                }
                catch (Exception $e)
                {
                    echo 'Помилка додавання новго професора: ', $e->getMessage(), "\n";
                }
            }
            }
        }

        if (isset($_POST['delete'])) {
            if(is_int($_GET['viclim'])) {
                $str = "delete from Professors where ID_Professor = " . $_GET['viclim'];
                $pdo->query($str);
            }
            else
            {
                $pst = explode(",", $_GET['viclim']);
                foreach($pst as $el)
                    {
                        $str = "delete from Professors where ID_Professor = ".$el;
                        $pdo->query($str);
                    }
            }
        }

        if (isset($_POST['search'])) {
            if($_POST['CADET'] == 'Yes')
                $cadet = 2;
            else
                $cadet = 0;
            $result = $pdo->query("select p.ID_Professor, p.Name_Professor, p.Adress, p.Phone st.Name_Staff, p.WorkingHours, p.BirthDate from Staff st, Professors p where p.ID_Staff = st.ID_Staff && p.ID_Staff !=".$cadet." && p.Name_Professor Like '%".$_POST['SHC']."%' ORDER BY p.ID_Professor");
        }
        else {
            $result = $pdo->query("select p.ID_Professor, p.Name_Professor, p.Adress, p.Phone, st.Name_Staff, p.WorkingHours, p.BirthDate from Staff st, Professors p where p.ID_Staff = st.ID_Staff  ORDER BY p.ID_Professor");
        }

        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
            echo '<tr class="tra">';
        if(isset($_SESSION['role'])) {
        if($_SESSION['role'] == "Admin") {
            echo '<th><input type="checkbox" id="chkbox'.$row[0].' /></th>" onchange="ArrOC('.$row[0].')"</th>';
        }}
            echo '<th>'.$row[0].'</th>';
            echo '<th>'.$row[1].'</th>';
            echo '<th>'.$row[2].'</th>';
            echo '<th>'.$row[3].'</th>';
            echo '<th>'.$row[4].'</th>';
            echo '<th>'.$row[5].'</th>';
            echo '<th>'.$row[6].'</th>';



            if(isset($_SESSION['role'])) {
                if($_SESSION['role'] == "Admin") {
                    echo '<th><button id="btn_modal_window2" onclick="modal(this.id, ' . $row[0] . ')" style="border:none;" class="btn lsnow">
<img src="img/delete.png" width="10px" />
</button></th>';
                }}
            echo '<th><button id="btn_modal_window5" onclick="ProfileLobbier(this.id, ' . $row[0] . ')" style="border:none;" class="btn lsnow">
<img src="img/MoreInfo.png" width="10px" />
</button></th>';
        }

        ?>
        </tbody>
    </table>
    <?php
    if(isset($_SESSION['role'])) {
        if($_SESSION['role'] == "Admin") {
            echo '<th><button id="btn_modal_window2" onclick="modal(this.id, arr)" style="border:none;" class="btn btn-danger short_marginator">
Видалити усі обрані
</button></th>';
        }}
    ?>
</div>
<?php
//CONSTANT PLACE
    if(isset($_GET['openInfo'])) {
        include "Profile.php";
    }
    ?>
