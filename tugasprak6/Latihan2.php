<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>
<body>
    <h2>Latihan 2 Tabel Perkalian Matriks</h2>
    <table border="1">
        <tr>
            <th>Bilangan</th>
            <?php
            for($i=1; $i <= 10; $i++){
                echo "<th style='background-color: limegreen';>$i</th>";
            }
          ?>
        </tr>
        <?php
          for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                echo "<th style='background-color: limegreen';>$i</th>"; 
                for ($j = 1; $j <= 10; $j++) {
                    $nilai = $i * $j;
                    if ($nilai % 2 == 0) {
                        $warna = "background-color: deepskyblue;";
                    } else {
                        $warna = "background-color: yellow;";
                    }
                echo "<td style='$warna'>$nilai</td>";
                }
            echo "</tr>";
            }
            ?>
    </table>
</body>
</html>