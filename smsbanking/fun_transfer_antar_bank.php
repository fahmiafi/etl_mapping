<?php
$mandatory = [
    'TRANSACTIONID',
    'INCOMINGOROUTGOINGFLAG',
    'PARTYCUSTOMERID',
    'PARTYACCOUNTNUMBER',
    'COUNTERPARTYACCOUNTNUMBER',
    'COUNTERPARTYBANKCODE',
    'COUNTERPARTYBANKNAME',
    'TRANSACTIONDATETIME',
    'TRANSACTIONAMOUNT',
    'TRANSACTIONTYPE',
    'TRANSACTIONCATEGORY',
    'CHANNELCODE',
    'INTERNATIONALINDICATOR',
    'DEVICEID',
    'ONUSFLAG',
    'RESPONSECODE',
    // 'ERRORCODE',
    'AUTHID',
];

$default_mapping = [
    'INCOMINGOROUTGOINGFLAG' => 'D',
    'TRANSACTIONCATEGORY' => 'Transfer Antar Bank',
    'CHANNELCODE' => 'SMB',
    'INTERNATIONALINDICATOR' => 'D',
    'ONUSFLAG' => 'OnUs'
];
$default_mapping_keys = array_keys($default_mapping);

$q_where_tran_id_unmatch = "TRANSACTIONID != CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";
$q_where_tran_id_match = "TRANSACTIONID = CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";