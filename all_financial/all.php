<?php
$channelcode = $_GET['channel'];
include '../config.php';
require '../vendor/autoload.php';
$kolom = [
    'TRANSACTIONID',
    'INCOMINGOROUTGOINGFLAG',
    'PARTYCUSTOMERID',
    'PARTYACCOUNTNUMBER',
    'PARTYVIRTUALACCOUNTNUMBER',
    'COUNTERPARTYCUSTOMERID',
    'COUNTERPARTYACCOUNTNUMBER',
    'COUNTERPARTYVIRTUALACCOUNTNUMBER',
    'COUNTERPARTYBANKCODE',
    'COUNTERPARTYBANKNAME',
    'COUNTERPARTYACCOUNTCOUNTRY',
    'TRANSACTIONDATETIME',
    'TRANSACTIONAMOUNT',
    'ORIGTRANSACTIONAMT',
    'ORIGTRANSACTIONCURRENCYCD',
    'TRANSACTIONTYPE',
    'TRANSACTIONCATEGORY',
    'CHANNELCODE',
    'BILLERID',
    'BILLINGNUMBER',
    'INTERNATIONALINDICATOR',
    'DEVICEID',
    'FINGERPRINTID',
    'IPADDRESS',
    'ONUSFLAG',
    'SOURCEOFFUNDS',
    'USERID',
    'AGENT46ID',
    'RESPONSECODE',
    'ERRORCODE',
    'ERRORCODEDESC',
    'QRCODETYPE',
    'SESSIONID',
    'LATITUDE',
    'LONGITUDE',
    'LANGUAGECODE',
    'REMARK',
    'PARTYCARDNUMBER',
    'CARDNUMBERINDICATOR',
    'MERCHANTID',
    'MERCHANTNAME',
    'MERCHANTCATEGORYCODE',
    'AUTHSOURCE',
    'AUTHID',
    'AVAILABLEBALANCE',
    'POSENTRYMODE',
    'VERIFICATIONMETHOD',
    'TERMINALID',
    'ECOMMERCEINDICATOR',
    'PARTYVIRTUALCARDNUMBER',
    'ATMCAPABILITY',
];

if($channelcode == 'PHB'){
    $name_channel = 'Phone Banking Financial';
}
elseif($channelcode == 'SMB'){
    $name_channel = 'SMS Banking Financial';
}
elseif($channelcode == 'IBR'){
    $name_channel = 'Internet Banking Financial';
}
elseif($channelcode == 'IBA'){
    $name_channel = 'Agen46 Internet Banking Financial';
}
elseif($channelcode == 'MBA'){
    $name_channel = 'Agen46 Mobile Banking Financial';
}


use PhpOffice\PhpSpreadsheet\Spreadsheet;
include '../style_excel.php';

$all_trantype = [
    'PHB' => [
        'Inhouse Transfer' => 'Transfer',
        'Bill Payment' => 'Bill Payment',
        'Purchase' => 'Purchase',
    ],
    'SMB' => [
        'Inhouse Transfer' => 'Transfer',
        'Interbank Transfer' => 'Transfer Antar Bank',
        'Top Up' => 'Top Up',
        'Bill Payment' => 'Pembayaran'
    ],
    'IBR' => [
        'Inhouse Transfer' => 'Inhouse Transfer',
        'Interbank Transfer' => 'Interbank Transfer',
        'Virtual Account Transfer' => 'VA Transfer',
        'Top Up, Bill Payment, Purchase' => 'Bill Payment',
    ],
    'IBA' => [
        'Inhouse Transfer' => 'Transfer',
        'Interbank Transfer' => 'Transfer Antar Bank',
        'Virtual Account Transfer' => 'VA Transfer',
        'Top Up' => 'Top Up',
        'Bill Payment' => 'Pembayaran',
        'Purchase' => 'Pembelian'
    ]
];
$tabel = 'all_financial';
$tran_type = $all_trantype[$channelcode];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $channelcode?></title>
    <style>
        .container{
            overflow:auto;
            height:700px;
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
        <h3><?= $channelcode?></h3>
    </div>
    <br>
    <?php
    include 'jml_data.php';
    ?>
    <form action="" method="post">
        <label for="">Transaction Category</label>
        <select name="tran_type" id="">
            <option value=""></option>
            <?php
            foreach ($tran_type as $key => $value) {
                ?>
                <option value="<?= $value?>" <?= @$_POST['tran_type'] == $value ? 'selected' : ''?>><?= $key?> (<?= $value?>)</option>
                <?php
            }
            ?>
        </select>
        <label for="">Limit</label>
        <input type="text" name="limit" value="<?= @$_POST['limit'] ? @$_POST['limit'] : '50'?>">
        <label for="">Data tampil</label>
        <select name="view_data" id="">
            <option value="all" <?= @$_POST['view_data'] == 'all' ? 'selected' : ''?>>Semua data</option>
            <option value="match" <?= @$_POST['view_data'] == 'match' ? 'selected' : ''?>>Hanya match</option>
            <option value="unmatch" <?= @$_POST['view_data'] == 'unmatch' ? 'selected' : ''?>>Hanya unmatch</option>
        </select>
        <label for="">Kondisi Khusus</label>
        <input type="text" name="where" value="<?= @$_POST['where'] ? @$_POST['where'] : ''?>" style="width: 500px">
        <button type="submit" name="submit">submit</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        include 'get_fun.php';

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
            // $query_where = $q_where_tran_id_match." AND ".$q_where_default." ".$q_where_mandatory;
            $query_where = "(".$q_where_default." ".$q_where_mandatory.")";
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
            // $query_where = "(".$q_where_tran_id_unmatch." OR ".$q_where_default." ".$q_where_mandatory.")";
            $query_where = "(".$q_where_default." ".$q_where_mandatory.")";
        }
        else{
            $query_where = "1=1";
        }

        include 'get_conf.php';
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        include '../content_all_fin.php';
    }
    ?>
</body>
</html>