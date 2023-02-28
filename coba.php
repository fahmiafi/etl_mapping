<?php
include 'config.php';

$a = [
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
$b = [
    'Y',
    'Y',
    'Y',
    'Y',
    'N',
    'Y',
    'Y',
    'N',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'N',
    'N',
    'Y',
    'Y',
    'N',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'Y',
    'N',
    'Y',
    'Y',
    'Y',
    'Y',
    'N',
    'N',
    'N',
    'N',
    'N',
    'N',
    'N',
    'Y',
    'N',
    'N',
    'N',
    'N',
    'N',
    'N',
    'N',
];

for ($i=0; $i < count($a); $i++) { 
    if (strtoupper($b[$i]) == 'Y') {
        echo "'".$a[$i]."', <br>";
    }
}

// $no = 1;
// $q = mysqli_query($con, "SELECT DISTINCT(agen_fin.TRANSACTIONID) FROM agen_fin WHERE CHANNELCODE = 'IBA'");
// while ($dt = mysqli_fetch_array($q)) {
//     $q_cek = mysqli_query($con, "SELECT TRANSACTIONID FROM agen_fin WHERE CHANNELCODE = 'IBA' AND TRANSACTIONID = '".$dt['TRANSACTIONID']."'");
//     if(mysqli_num_rows($q_cek) > 1) {
//         echo $no++.". "."<b>".$dt['TRANSACTIONID']."</b><br>";
//         while ($dt_cek = mysqli_fetch_array($q_cek)) {
//             echo $dt['TRANSACTIONID']."<br>";
//         }
//         echo "<br>";
//     }
// }
?>