<div class="snow">
    <table class="table table-bordered" style="margin: 10px; width: 99%;">
        <tbody><tr>
            <th>ID</th>
            <th>Назва</th>
        </tr>
        <?php
            $result = $pdo->query("select ID, descipline_name from Disciplines");

        while ($row = $result->fetch(PDO::FETCH_LAZY))
        {
        echo '<script>function gr'.$row[0].'(){
 location= "../index.php?side=Professors&cc="+vso +"&cc2='.$row[0].'&openInfo='.$_GET['openInfo'].'&id='.$_GET['id'].'";
    }</script>';
            echo '<tr onclick="gr'.$row[0].'()" class="tra"><th>'.$row[0].'</th>';
            echo '<th>'.$row[1].'</th>';
        }
        ?>
        </tbody>
    </table>
</div>

<script>

</script>