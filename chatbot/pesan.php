<?php 
   // pesiapan koneksi ke database
   $koneksi = mysqli_connect("localhost", "root", "", "lat_chatbot") or die ("Database Eror");

   // ambil pesan dari ajax
   $pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);

   // cek pertanyaan ke dalam tabel
   $cek_data = mysqli_query($koneksi, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$pesan%' ");

   // jika pertanyaan/data di temukan, maka tampilkan jawaban
   if (mysqli_num_rows($cek_data) > 0) {
      // hasil query tampung ke dalam variabel data
      $data = mysqli_fetch_assoc($cek_data);
      // tampung jawaban ke dalam variabel untuk di kirim kembali ke ajax;
      $balasan = $data['jawaban'];
      echo $balasan;
   }else {
      echo "Maff, saya belum menemukan jawaban yang kamu maksud, :( ";
   }
?>