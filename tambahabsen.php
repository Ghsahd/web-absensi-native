<?php
	@ob_start();
	session_start();
	require 'config.php';
    $nama = $_POST['nama'];
    $kehadiran = $_POST['kehadiran'];

    $data[] = $nama;
    $data[] = $kehadiran;

    $sql = "INSERT INTO data_absen (nama,kehadiran) VALUES(?,?)";
    $row = $config -> prepare($sql);
    $row -> execute($data);

    echo '<script>window.location="absen.php"</script>';
?>