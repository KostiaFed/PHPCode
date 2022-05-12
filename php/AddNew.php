<div id="my_modal3" class="mdl">
    <div class="modal_content">
        <span id="close_modal_window3" class="close_modal_window" onclick="clos(this.id)">×</span>
        <?php
        if($_GET['side'] == "Desciplines")
        {
            echo '
        <form class="marginator" method="post" action="../index.php?side=Desciplines">
                    <table>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <input type="text" id="DN" name="DN" class = "elms">
                    </td>
                </tr>
                </table>';
        }
        if($_GET['side'] == "Professors")
        {
            echo '
        <form class="marginator" method="post" action="../index.php?side=Professors">
            <table>
                <tr>
                    <td>
                        Professor name
                    </td>
                    <td>
                        <input type="text" id="PN" name="PN" class = "elms">
                    </td>
                </tr>
                <tr>
                    <td>
                        Adress
                    </td>
                    <td>
                        <input type="text" name="AD" class = "elms">
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone
                    </td>
                    <td>
                        <input type="text" name="PH" class = "elms">
                    </td>
                </tr>
                <tr>
                    <td>
                        Working Hours
                    </td>
                    <td>
                        <input type="number" name="WH" class = "elms">
                    </td>
                </tr>
                <tr>
                    <td>
                        Birthdate
                    </td>
                    <td>
                        <input type="date" name="BD" class = "elms">
                    </td>
                </tr>
                <tr>
                    <td>
<select size="1" class = "elms" name="Rnk">
        <option disabled>Choose rank</option>';

                        $str = "SELECT * FROM `ScienceRank` WHERE 1";

                        $result = $pdo->query($str);

                        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                        }
                        echo '</select>
                    </td>
                    <td>
                    <select size="1" class = "elms" name="Stf">
        <option disabled>Choose staffication</option>';

                        $str = "SELECT * FROM `Staff` WHERE 1";

                        $result = $pdo->query($str);

                        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                        }
                        echo '</select>
                    </td>
                </tr>
            </table>
            ';
            }
        ?>
            <div class = "righter">
                <input class="btn-primary btn" name="add" type="submit" value="Додати">
            </div>
        </form>
    </div>
</div>