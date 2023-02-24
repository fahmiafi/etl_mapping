<?php
$mandatory = [
    'TransactionId',
    'PartyCustomerId',
    'TransactionDateTime',
    'TransactionType',
    'ChannelCode',
    'ResponseCode',
    'ErrorCode',
    'PhoneNumber',
];
$default_mapping = [
    'ChannelCode' => 'SMB',
];
$default_mapping_keys = array_keys($default_mapping);

$q_where_tran_id_unmatch = "TRANSACTIONID != CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";
$q_where_tran_id_match = "TRANSACTIONID = CONCAT('SMB', REPLACE(REPLACE(REPLACE(TRANSACTIONDATETIME, ':', ''), '-', ''),' ', ''), PARTYCUSTOMERID)";