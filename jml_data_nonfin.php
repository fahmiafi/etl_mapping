<?php
$q_jml_where = '1=1';
if ($channelcode == 'IBA') {
    $q_jml_where .= " AND CHANNELCODE = 'IBA'";
}
$jml_channelcode = mysqli_fetch_array(mysqli_query($con, "SELECT count(id) as jml_channelcode FROM $tabel WHERE $q_jml_where"));
?>
<p>Jumlah data channel code <b><?= $channelcode?></b> : <b><?= $jml_channelcode['jml_channelcode']?></b></p>
<?php
$all_tran_cat = 0;
foreach ($tran_type as $key => $value) {
    $jml_tran_cat = mysqli_fetch_array(mysqli_query($con, "SELECT count(id) as jml_tran_cat FROM $tabel WHERE $q_jml_where AND TransactionType = '".$value."'"));
    ?>
    <p>Jumlah data TransactionCategory <b><?= $key?> (<?= $value?>)</b> : <b><?= $jml_tran_cat['jml_tran_cat']?></b></p>
    <?php
    $all_tran_cat += $jml_tran_cat['jml_tran_cat'];
}
?>
<p>Jumlah data TANPA TransactionCategory, channel code <b><?= $channelcode?></b> : <b><?= $jml_channelcode['jml_channelcode'] - $all_tran_cat ?></b></p>