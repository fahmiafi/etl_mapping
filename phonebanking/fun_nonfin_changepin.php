<?php
$mandatory = [
    'TransactionId',
    'PartyCustomerId',
    'PartyAccountNumber',
    'PartyCardNumber',
    'TransactionDateTime',
    'TransactionType',
    'ChannelCode',
    'DeviceId',
    'ResponseCode',
    'SessionId',
    'PhoneNumber',
];
$default_mapping = [
    'ChannelCode' => 'PHB',
];
$default_mapping_keys = array_keys($default_mapping);

$q_where_tran_id_unmatch = "TRANSACTIONID != CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";
$q_where_tran_id_match = "TRANSACTIONID = CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";