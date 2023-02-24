<?php
$kolom = [
    'TransactionId',
    'PartyCustomerId',
    'PartyAccountNumber',
    'PartyCardNumber',
    'TransactionDateTime',
    'TransactionType',
    'ChannelCode',
    'DeviceId',
    'FingerprintId',
    'IPAddress',
    'UserId',
    'ResponseCode',
    'ErrorCode',
    'ErrorCodeDesc',
    'SessionId',
    'PhoneNumber',
];

function TRANSACTIONID($id)
{
    return true;
    global $con;
    
    //SMB+YYYYMMDDHHMMSS+Journal_Number
    $q = mysqli_query($con, "SELECT * FROM sms_fin WHERE ID = '$id'");
    $dt = mysqli_fetch_array($q);

    $data = "SMB".str_replace(array('-', ':', ' '), "", $dt['TRANSACTIONDATETIME']).$dt['PARTYCUSTOMERID'];

    if ($data == $dt['TRANSACTIONID']) {
        return true;
    }
    return false;
}

function ERRORCODE($id)
{
    global $con, $tabel;
    
    $q = mysqli_query($con, "SELECT ID, ResponseCode, ErrorCode FROM $tabel WHERE ID = '$id'");
    $dt = mysqli_fetch_array($q);
    if ($dt['ResponseCode'] == 'ok') {
        if ($dt['ErrorCode'] == '') {
            return true;
        }
    }
    else{
        if ($dt['ErrorCode'] != '') {
            return true;
        }
    }
    return false;
}

function default_mapping($kolom, $data)
{
    global $default_mapping;

    if ($data == $default_mapping[$kolom]) {
        return true;
    }
    return false;
}

function kolom_mandatory($id, $param, $kolom){
    global $con, $tabel;
    
    if ($kolom == 'ErrorCode') {
        $q = mysqli_query($con, "SELECT ID, ResponseCode, ErrorCode, ERRORCODEDESC FROM $tabel WHERE ID = '$id'");
        $dt = mysqli_fetch_array($q);
        if ($dt['ResponseCode'] == 'ok' && $param == '') {
            return true;
        }
        elseif ($dt['ResponseCode'] != '' && $param != ''){
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