<?php
$name_channel = $_GET['name'];
include '../config.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$char = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
$char_kap = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
$style_col = [
    'font' => ['bold' => true], // Set font nya jadi bold
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];

$tabel = 'phone_nonfin';
$channelcode = 'PHB';
$tran_type = [
    'Phone Banking Change PIN' => 'Phone Banking Change PIN',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name_channel?></title>
    <style>
        .container{
            overflow:auto;
            height:480px;
            margin-left: 50px;
            margin-right: 50px;
            border: 1px solid black;
        }
        #tbl_data td, #tbl_data th {
            border: 1px solid #000;
            font-size: 15px;
            padding: 2px;
        }

        #tbl_data td:first-child, #tbl_data th:first-child {
            position:sticky;
            left:0;
            z-index:1;
        }
    </style>
</head>
<body>
    <a href="../index.php">HOME</a>
    <div style="text-align: center;">
        <h3><?= $name_channel?></h3>
    </div>
    <br>

    <?php
    include '../jml_data_nonfin.php';
    ?>

    <br>

    <a href="../export_excel.php?name=<?= $name_channel?>">Hasil Export Excel</a>
    <br><br>
    <?php
    include '../form.php';

    if (isset($_POST['submit'])) {
        if ($_POST['tran_type'] == 'Phone Banking Change PIN') {
            include 'fun_nonfin_changepin.php';
        }
        else{
            exit;
        }

        if ($_POST['view_data'] == 'unmatch') {
            $q_where_default = "";
            foreach ($default_mapping as $key => $value) {
                $q_where_default .= $key." != '".$value."' OR ";
            }

            $q_where_mandatory = "";
            for ($i=0; $i < count($mandatory); $i++) { 
                $q_where_mandatory .= $mandatory[$i]." = '' OR ";
            }
            $q_where_mandatory = rtrim($q_where_mandatory, " OR ");
            $query_where = "(".$q_where_tran_id." OR ".$q_where_default." ".$q_where_mandatory.")";
        }
        else{
            $query_where = "1=1";
        }

        if ($_POST['view_data'] == 'match') {
            $q_where_default = "";
            foreach ($default_mapping as $key => $value) {
                $q_where_default .= $key." = '".$value."' AND ";
            }
    
            $q_where_mandatory = "";
            for ($i=0; $i < count($mandatory); $i++) { 
                $q_where_mandatory .= $mandatory[$i]." != '' AND ";
            }
            $q_where_mandatory = rtrim($q_where_mandatory, " AND ");
            $query_where = $q_where_tran_id_match." AND ".$q_where_default." ".$q_where_mandatory;
        }
        elseif ($_POST['view_data'] == 'unmatch') {
            $q_where_default = "";
            foreach ($default_mapping as $key => $value) {
                $q_where_default .= $key." != '".$value."' OR ";
            }
    
            $q_where_mandatory = "";
            for ($i=0; $i < count($mandatory); $i++) { 
                $q_where_mandatory .= $mandatory[$i]." = '' OR ";
            }
            $q_where_mandatory = rtrim($q_where_mandatory, " OR ");
            $query_where = "(".$q_where_tran_id_unmatch." OR ".$q_where_default." ".$q_where_mandatory.")";
        }
        else{
            $query_where = "1=1";
        }

        include 'phone_nonfin_conf.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        include '../content_nonfin.php';
    }
    ?>
</body>
</html>