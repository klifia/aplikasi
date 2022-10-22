<?php

$anda = 0;
$lawan = 0;
$nama ="";

function cetakAngka($poin)
{
    $angka = 15;
    return $angka * $poin;
}


function cetakSkor($anda, $lawan)
{
    $selisih = abs($anda - $lawan);
    $hasilAnda = $anda;
    $hasilLawan = $lawan;

    if ($anda >= 60 || $lawan >= 60) {
        if ($selisih >= 30) {
            if ($anda > $lawan) {
                $hasilAnda = 'Game';
            } else if ($anda < $lawan) {
                $hasilLawan = 'Game';
            }
        }
    }
    $skor = "{$hasilAnda}-{$hasilLawan}";
    return $skor;
}

if (isset($_GET['anda'])) {
    $poinAnda = $_GET['skor_anda'];
    $poinAnda++;
    // if ($poinAnda > 4) {
    //     $poinAnda = 0;
    // }
    $skorAnda = cetakAngka($poinAnda);
} else {
    $poinAnda = isset($_GET['skor_anda']) ? $_GET['skor_anda'] : $anda;
    $skorAnda = cetakAngka($poinAnda);
}

if (isset($_GET['lawan'])) {
    $poinLawan = $_GET['skor_lawan'];
    $poinLawan++;
    // if ($poinLawan > 4) {
    //     $poinLawan = 0;
    // }
    $skorLawan = cetakAngka($poinLawan);
} else {
    $poinLawan = isset($_GET['skor_lawan']) ? $_GET['skor_lawan'] : $lawan;
    $skorLawan = cetakAngka($poinLawan);
}

function getDeuce($poinAnda, $poinLawan)
{
    $pesan = "";
    if ($poinAnda >= 3 || $poinLawan >= 3) {
        if ($poinAnda == $poinLawan)
            $pesan = "(Deuce)";
    }
    return $pesan;
}

$deuce = getDeuce($poinAnda, $poinLawan);

$hasilSkor = cetakSkor($skorAnda, $skorLawan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Skor Tennis</title>
</head>

<body>
    <p>Nama Anda : <input type="text" name="nama"></a></p>
    <p>Nama Lawan :  <input type="text" name="nama"></a></p>
    <p><?php echo "Point Anda : {$poinAnda}" ?> <a href="index.php?skor_anda=<?= $poinAnda ?>&skor_lawan=<?= $poinLawan ?>&anda"> <button>Tambah Skor</button></a></p>
    <p><?php echo "Point Lawan : {$poinLawan}" ?><a href="index.php?skor_anda=<?= $poinAnda ?>&skor_lawan=<?= $poinLawan ?>&lawan"> <button>Tambah Skor</button></a></p>
    <p><?php echo "Skor : {$hasilSkor} {$deuce}" ?></p>
    <p><a href="index.php"> <button>Reset</button></a></p>

    <h3>Hasil Match</h3>

    <form action="" method="post">
    <table border="1">
        <tr>
            <th>no</th>
            <th>nama anda</th>
            <th>nama lawan</th>
            <th>poin anda</th>
            <th>poin lawan</th>
            <th>skor</th>
        </tr>
    </table>

</form>

</body>

</html>