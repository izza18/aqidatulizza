<?php
include "../../conf/conn.php";



// var penjualan
$id_buku    = $_POST['id_buku'];
$kasir   = $_POST['kasir'];
$jumlah  = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

var_dump($id_buku);

$queryBuku = mysqli_query($koneksi, "SELECT harga_jual FROM buku WHERE id_buku = '$id_buku'");
$rowBuku = mysqli_fetch_assoc($queryBuku);
$total = $rowBuku['harga_jual'] * $jumlah;


$queryIdKasir = mysqli_query($koneksi, "SELECT id_kasir FROM kasir WHERE nama = '$kasir'");
$rowKasir = mysqli_fetch_assoc($queryIdKasir);
$id_kasir = $rowKasir['id_kasir'];
$query = "INSERT INTO penjualan2 (id_buku, kasir, jumlah, total, tanggal) VALUES ('$id_buku', '$kasir', '$jumlah', '$total', '$tanggal')";
$query1 = "INSERT INTO penjualan (id_penjualan, id_kasir,  total, tanggal) VALUES ('$id_buku', '$id_kasir', '$total', '$tanggal')";


if ($koneksi->query($query) && $koneksi->query($query1)) {
  // Jika kedua query berhasil dieksekusi, redirect ke halaman index.php
  echo '<script>alert("Data Berhasil Ditambah !!!");';
  echo 'window.location.href="../../index.php?page=data_penjualan";</script>';
} else {
  // Jika salah satu atau kedua query gagal dieksekusi, tampilkan pesan kesalahan
  echo '<script>alert("Data Gagal Ditambah !!!");';
  echo 'window.location.href="../../index.php?page=data_penjualan";</script>';
}





// if ($koneksi->query($query)) {
//   //redirect ke halaman index.php 
//   //header("location: index.php");
//   echo '<script>alert("Data Berhasil Ditambah !!!");
//   window.location.href="../../index.php?page=data_penjualan"</script>';
// } else {
//   //pesan error gagal update data
//   //echo "Data Gagal Disimpan!";
//   echo '<script>alert("Data Gagal Ditambah !!!");
//   window.location.href="../../index.php?page=data_penjualan"</script>';
// }
?>