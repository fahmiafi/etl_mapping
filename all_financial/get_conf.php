<?php
if($channelcode == 'PHB'){
    include '../phonebanking/phone_fin_conf.php';
}
elseif($channelcode == 'SMB'){
    include '../smsbanking/sms_fin_conf.php';
}
elseif($channelcode == 'IBR'){
    include '../ibanking/ibank_fin_conf.php';
}
elseif($channelcode == 'IBA'){
    include '../agen_ibank/agen_ibank_fin_conf.php';
}
?>