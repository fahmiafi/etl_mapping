<?php
if($channelcode == 'PHB'){
    if ($_POST['tran_type'] == 'Transfer') {
        include '../phonebanking/fun_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Bill Payment') {
        include '../phonebanking/fun_bill_payment.php';
    }
    else if ($_POST['tran_type'] == 'Purchase') {
        include '../phonebanking/fun_purchase.php';
    }
    else{
        exit;
    }
}
elseif($channelcode == 'SMB'){
    if ($_POST['tran_type'] == 'Transfer') {
        include '../smsbanking/fun_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Transfer Antar Bank') {
        include '../smsbanking/fun_transfer_antar_bank.php';
    }
    else if ($_POST['tran_type'] == 'Top Up') {
        include '../smsbanking/fun_topup.php';
    }
    else if ($_POST['tran_type'] == 'Pembayaran') {
        include '../smsbanking/fun_pembayaran.php';
    }
    else{
        exit;
    }
}
elseif($channelcode == 'IBR'){
    if ($_POST['tran_type'] == 'Inhouse Transfer') {
        include '../ibanking/fun_inhouse_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Interbank Transfer') {
        include '../ibanking/fun_interbank_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Virtual Account Transfer') {
        include '../ibanking/fun_virtual_account_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Bill Payment') {
        include '../ibanking/fun_bill_payment.php';
    }
    else{
        exit;
    }
}
elseif($channelcode == 'IBA'){
    if ($_POST['tran_type'] == 'Transfer') {
        include '../agen_ibank/fun_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Transfer Antar Bank') {
        include '../agen_ibank/fun_transfer_antar_bank.php';
    }
    else if ($_POST['tran_type'] == 'Virtual Account Transfer') {
        include '../agen_ibank/fun_virtual_account_transfer.php';
    }
    else if ($_POST['tran_type'] == 'Top Up') {
        include '../agen_ibank/fun_topup.php';
    }
    else if ($_POST['tran_type'] == 'Pembayaran') {
        include '../agen_ibank/fun_pembayaran.php';
    }
    else{
        exit;
    }
}
?>