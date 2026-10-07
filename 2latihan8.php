<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>
<!-- Menentukan Form Input -->
<form method="POST">
Masukkan Bilangan Pertama : <br>
<input type="text" name="A" size="10"> <br>
Masukkan Bilangan Kedua : <br>
<input type="text" name="B" size="10"> <br>
<input type="submit" value="hitung">
</form>

<!-- membandingkan 2 buah bilangan yang diinput -->
<?php
  // Mengambil data dari form dengan pengaman agar tidak error jika belum disubmit
  $A = $_POST["A"] ?? "";
  $B = $_POST["B"] ?? "";

  // Hanya jalankan perhitungan jika form sudah diisi
  if ($A !== "" && $B !== "") {
      
      // Fungsi-fungsi UDF (User Defined Function)
      function jumlah($A, $B) {
          return $A + $B;
      }
      
      function kurang($A, $B) {
          return $A - $B;
      }
      
      function kali($A, $B) {
          return $A * $B;
      }
      
      function bagi($A, $B) {
          // Mencegah error jika bilangan kedua bernilai 0
          if ($B == 0) {
              return "Tidak terhingga (Pembagi bernilai 0)";
          }
          return $A / $B;
      }

      echo "<br>";
      echo "Bilangan Pertama : " . $A;
      echo "<br>";
      echo "Bilangan Kedua : " . $B;
      echo "<br><br>";
      
      echo "Hasil Penjumlahan 2 buah bilangan <br>";
      $jumlahbil = jumlah($A, $B);
      printf("Penjumlahan antara : %d + %d = %d <br><br>", $A, $B, $jumlahbil);
      
      echo "Hasil Pengurangan 2 buah bilangan <br>";
      $kurangbil = kurang($A, $B);
      printf("Pengurangan antara : %d - %d = %d <br><br>", $A, $B, $kurangbil);
      
      echo "Hasil Perkalian 2 buah bilangan <br>";
      $kalibil = kali($A, $B);
      printf("Perkalian antara : %d * %d = %d <br><br>", $A, $B, $kalibil);
      
      echo "Hasil Pembagian 2 buah bilangan <br>";
      $bagibil = bagi($A, $B);
      // Menggunakan %s pada printf bagian pembagian agar teks pesan error pembagi 0 bisa tampil aman
      printf("Pembagian antara : %d / %d = %s <br><br>", $A, $B, $bagibil);
  }
?>
</body>
</html>