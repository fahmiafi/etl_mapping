<?php
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

function TRANSACTIONID($id)
{
    global $con;
    
    //SMB+YYYYMMDDHHMMSS+Journal_Number
    $q = mysqli_query($con, "SELECT * FROM agen_fin WHERE ID = '$id'");
    $dt = mysqli_fetch_array($q);

    $data = "IBA".str_replace(array('-', ':', ' '), "", $dt['TRANSACTIONDATETIME']).$dt['PARTYACCOUNTNUMBER'];

    if ($data == $dt['TRANSACTIONID']) {
        return true;
    }
    return false;
}

function ERRORCODE($id, $kolom)
{
    global $con;
        
    $q = mysqli_query($con, "SELECT ID, RESPONSECODE, ERRORCODE, ERRORCODEDESC FROM agen_fin WHERE ID = '$id'");
    $dt = mysqli_fetch_array($q);
    if ($dt['RESPONSECODE'] == 'OK') {
        if ($dt[$kolom] == '') {
            return true;
        }
    }
    else{
        if ($dt[$kolom] != '') {
            return true;
        }
    }
    return false;
}

function default_mapping($kolom, $x)
{
    global $default_mapping;

    if ($x == $default_mapping[$kolom]) {
        return true;
    }
    return false;
}

function kolom_mandatory($id, $param, $kolom){
    global $con;
    
    if ($kolom == 'ERRORCODE') {
        $q = mysqli_query($con, "SELECT ID, RESPONSECODE, ERRORCODE FROM sms_fin WHERE ID = '$id'");
        $dt = mysqli_fetch_array($q);
        if ($dt['RESPONSECODE'] == 'ok' && $param == '') {
            return true;
        }
        elseif ($dt['RESPONSECODE'] != '' && $param != ''){
            return true;
        }
    }
    else{
        if ($param != '') {
            return true;
        }
    }
    return false;
}