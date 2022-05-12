<?php
require_once('../PHPExcel-1.8/Classes/PHPExcel.php');
require_once('../PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php');
$pdo = include "connector.php";

$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Назва');
$sheet->setCellValue("B1","Професори");
$sheet->setCellValue("A2","ID");
$sheet->setCellValue("B2","Ім'я");
$sheet->setCellValue("C2","Адреса");
$sheet->setCellValue("D2","Номер телефону");
$sheet->setCellValue("E2","Учений ступінь");
$sheet->setCellValue("F2","Кадровість");
$sheet->setCellValue("G2","Напрацьовані години");
$sheet->setCellValue("H2","Дата народження"); //Тут готово

$bg1 = array(
    'fill'=> array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'B0C4DE'))
);

$border = array(
        'borders'=>array(
                'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '000000')
                )
        )
);

$sheet->getStyle("A2:H2")->applyFromArray($border);

$result = $pdo->query("select * from Professors");
$sheet->getStyle("B2:G2")->applyFromArray($bg1);

$i = 3;
while($row = $result->fetch())
{
    $sheet->setCellValue("A".$i, $row['ID_Professor']);
    $sheet->setCellValue("B".$i, $row['Name_Professor']);
    $sheet->setCellValue("C".$i, $row['Adress']);
    $sheet->setCellValue("D".$i, $row['Phone']);
    $sheet->setCellValue("E".$i, $row['ID_ScienceRank']);
    $sheet->setCellValue("F".$i, $row['ID_Staff']);
    $sheet->setCellValue("G".$i, $row['WorkingHours']);
    $sheet->setCellValue("H".$i, $row['BirthDate']);
    $sheet->getStyle("A".$i.":H".$i)->applyFromArray($border);
    $i++;
}
//$names = ["Name"=>['Масло','Хлеб','Сыр','Молоко'],"Price"=>['50','20','100','12'],"Nums"=>['3','4','8','12']];

/*for($i = 1; $i< 5; $i++)
{
    $C = $i + 3;
    $j = $i - 1;
}
*/
/*$sheet->setCellValue("E9", "=SUM(E4:E7)");*/




$obj = new PHPExcel_Writer_Excel5($xls);
$filename = 'new.xls';
if(file_exists($filename)){
    unlink($filename);
}
$obj->save($filename);

header('Content-type: application/download');
header('Content-disposition: attachment; filename='.$filename);
header("Content-Length: " . filesize($filename));
$fp = fopen($filename, "r");
fpassthru($fp);
//readfile($filename);

?>
<script>alert ("Звіт сформовано");</script>
<html>
    <a href="http://kapital.pp.ua/index.php" class="btn-primary btn">Назад</a>
</html>
