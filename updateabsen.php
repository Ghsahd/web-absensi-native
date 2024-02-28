<?php
	@ob_start();
	session_start();
	require 'config.php';
    $nama = $_POST['nama'];
    $kehadiran = $_POST['kehadiran'];
    $id = $_POST['id'];

    $data[] = $nama;
    $data[] = $kehadiran;
    $data[] = $id;

    $sql = 'UPDATE data_absen SET nama=?, kehadiran=? WHERE id = ?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="absen.php"</script>';
?>