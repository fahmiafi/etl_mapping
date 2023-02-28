<?php
$channelcode = [
    'PHB',
    'SMB',
    'IBA',
    'MBA',
    'IBR',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dari Satu File data Inject</h3>
    <h3>Financial</h3>
    <ol>
        <?php
        for ($i=0; $i < count($channelcode); $i++) { 
            if ($channelcode[$i] != 'MBA') {
            
            ?>
            <li>
                <a href="all_financial/all.php?channel=<?= $channelcode[$i]?>"><?= $channelcode[$i]?></a>
            </li>
            <?php
            }
        }
        ?>
    </ol>
    <br><br>
    <h3>Finansial</h3>
    <ul>
        <li>
            <a href="smsbanking/sms_fin.php?name=SMS Banking Finansial">SMS Banking Finansial</a>
        </li>
        <li>
            <a href="phonebanking/phone_fin.php?name=Phone Banking Finansial">Phone Banking Finansial</a>
        </li>
        <li>
            <a href="ibanking/ibank_fin.php?name=Internet Banking Finansial">Internet Banking Finansial</a>
        </li>
        <li>
            <a href="agen_ibank/agen_ibank_fin.php?name=Agen46 Internet Banking Finansial">Sedang Perbaikan >> Agen46 Internet Banking Finansial</a>
        </li>
    </ul>
    <h3>NonFinansial</h3>
    <ul>
        <li>
            <a href="smsbanking/sms_nonfin.php?name=SMS Banking Non Finansial">SMS Banking NonFinansial</a>
        </li>
        <li>
            <a href="phonebanking/phone_nonfin.php?name=Phone Banking NonFinansial">Phone Banking NonFinansial</a>
        </li>
        <!-- <li>
            <a href="ibanking/ibank_fin.php?name=Internet Banking Finansial">Internet Banking Finansial</a>
        </li> -->
        <!-- <li>
            <a href="agen_ibank/agen_ibank_fin.php?name=Agen46 Internet Banking Finansial">Sedang Perbaikan >> Agen46 Internet Banking Finansial</a>
        </li> -->
    </ul>
</body>
</html>