<?php
$mandatory = [
    'TRANSACTIONID',
    'INCOMINGOROUTGOINGFLAG',
    'PARTYCUSTOMERID',
    'PARTYACCOUNTNUMBER',
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
    'IPADDRESS',
    'ONUSFLAG',
    'SOURCEOFFUNDS',
    'USERID',
    'AGENT46ID',
    'RESPONSECODE',
    'ERRORCODE',
    'ERRORCODEDESC',
    'SESSIONID',
    'LATITUDE',
    'LONGITUDE',
    'LANGUAGECODE',
];

$default_mapping = [
    'ORIGTRANSACTIONCURRENCYCD' => '360',
    'TRANSACTIONCATEGORY' => 'Top Up',
    'CHANNELCODE' => 'IBA',
    'INTERNATIONALINDICATOR' => 'D',
    'ONUSFLAG' => 'OnUs',
    'LANGUAGECODE' => '002',
];
$default_mapping_keys = array_keys($default_mapping);

$q_where_tran_id_unmatch = "TRANSACTIONID != CONCAT('IBA', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";
$q_where_tran_id_match = "TRANSACTIONID = CONCAT('IBA', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";