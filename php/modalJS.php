<?php
echo 'function modal(id, vc) {
        vso = vc;
        var id1=id.substr(16);
        var cn=\'btn_modal_window\'+id1;
        var mod=\'my_modal\'+id1;
        var modal = document.getElementById(mod);
        if(id1 == 2) { {';

if($_GET['side'] == "Professors")
    echo
    'modal.innerHTML = \'<div class="modal_content"><span id="close_modal_window2" class="close_modal_window" onclick="clos(this.id)">×</span><form method="post" action="../index.php?side=Professors&viclim=\' + vc + \'"><div id="c_8"> <label>You are sure?</label> </br> <table> <tr> </td> <input name="delete" type="submit" value="Yes"> <input name="cancel" type="submit" value="No"> </td> </tr> </table> </div> </form></div>\';';
if($_GET['side'] == "Desciplines")
    echo
    'modal.innerHTML = \'<div class="modal_content"><span id="close_modal_window2" class="close_modal_window" onclick="clos(this.id)">×</span><form method="post" action="../index.php?side=Desciplines&viclim=\' + vc + \'"><div id="c_8"> <label>You are sure?</label> </br> <table> <tr> </td> <input name="delete" type="submit" value="Yes"> <input name="cancel" type="submit" value="No"> </td> </tr> </table> </div> </form></div>\';';

echo
'}}
        var btn = document.getElementById(cn);
        modal.style.display = "block";
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
';