<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Nilai Mahasiswa</title>
  <style>
    table {
      border-collapse: collapse;
      width: 60%;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 8px 12px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h2>Daftar Nilai Mahasiswa</h2>

  <table>
    <tr>
      <th>NO</th>
      <th>NPM</th>
      <th>NAMA MAHASISWA</th>
      <th>NILAI</th>
      <th>KETERANGAN</th>
    </tr>

    <?php
      // Data array mahasiswa
      $mahasiswa = [
        ["npm" => "001", "nama" => "Chayra", "nilai" => 80],
        ["npm" => "002", "nama" => "Archelia", "nilai" => 75],
        ["npm" => "003", "nama" => "Lalan", "nilai" => 50],
        ["npm" => "004", "nama" => "Fuji", "nilai" => 90],
        ["npm" => "005", "nama" => "Dhani", "nilai" => 65],
      ];

      $no = 1;
      foreach ($mahasiswa as $data) {
        // Tentukan keterangan lulus atau tidak
        $keterangan = ($data["nilai"] >= 70) ? "Lulus" : "Tidak Lulus";

        // Tampilkan baris data
        echo "<tr>
                <td>$no</td>
                <td>{$data['npm']}</td>
                <td>{$data['nama']}</td>
                <td>{$data['nilai']}</td>
                <td>$keterangan</td>
              </tr>";
        $no++;
      }
    ?>
  </table>
</body>
</html>
