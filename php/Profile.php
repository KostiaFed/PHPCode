<?php

$types = array('image/png', 'image/jpeg');
$path = 'profIMG/';

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    @copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']);
    $result = $pdo->query('update Professors set img="'.$path . $_FILES['picture']['name'].'" where ID_Professor = '.$_GET['openInfo']);

}

$result = $pdo->query("select p.img, p.Name_Professor, p.Adress, p.Phone, sr.Name_SRank, st.Name_Staff, p.WorkingHours, p.BirthDate from Staff st, Professors p, ScienceRank sr where p.ID_Staff = st.ID_Staff && p.ID_ScienceRank = sr.ID_SRank && ID_Professor = ".$_GET['openInfo']);

echo'
<style>
.blue
{
    color: #2a6496;
}
</style>
<div id="my_modal5" class="mdl_l">
<div class="modal_content">
    <span id="close_modal_window5" class="close_modal_window" onclick="clos(this.id)">×</span>
<div class = "form0">
';
while ($row = $result->fetch(PDO::FETCH_LAZY)) {
    if(strval($row[0]) != "") {
        echo '
        <img id="foto" class="profoto" width=200px title="Клікніть, щоб оновити картинку" src="' . $row[0] . '"/>';
    }
    else
    {
        echo '<img id="foto" class="profoto" title="Клікніть, щоб оновити картинку" width=200px src="../img/DefaultProfile.jpg" />';
    }
    echo '<div class="inline"><h1 class = "profile">'.$row[1].'</h1>
<label><b class = blue>Adress: </b>'.$row[2].'</label><br/>
<label><b class = blue>Phone: </b>'.$row[3].'</label><br/>
<label><b class = blue>Science Rank: </b>'.$row[4].'</label><br/>
<label><b class = blue>Staff: </b>'.$row[5].'</label><br/>
<label><b class = blue>Working hours: </b>'.$row[6].'</label><br/>
<label><b class = blue>Birth date: </b>'.$row[7].'</label><br/>
</div>
';
}

$result = $pdo->query("select ds.descipline_name from ProfessorDisciplines pd, Disciplines ds where pd.ID_Discipline = ds.ID && pd.ID_Professor = ".$_GET['openInfo']);
echo '<div class = "inline"><h1 class = "profile">Disciplines</h1>';
$counter2222 = 1;

while ($row = $result->fetch(PDO::FETCH_LAZY)) {
echo '
<label><b class = blue>'.$counter2222.': </b>'.$row[0].'</label><br/>
';
$counter2222++;
}

echo '<script>function modalio(id, vc) {
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
    }
</script>';

echo '<button id="btn_modal_window4" onclick="modalio(this.id, ' .$_GET['openInfo'] . ')" style="border:none;" class="btn lsnow">
<img src="img/Add.png" width="10px" />
</button>';

echo '
</div>
</div>
';
echo '<form method="post" enctype="multipart/form-data"><div class="inline" id="c_9">';
echo '<input type="file" name="picture"><input type="submit" value="Загрузити нове фото"></form>
</div>
</div>
</div>

<script>
var id1 = "'.$_GET['id'].'".substr(16);
        var mod=\'my_modal\'+id1;
        var modal = document.getElementById(mod);

        modal.style.display = "block";
</script>';

