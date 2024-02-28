<?php
	@ob_start();
	session_start();
	require 'config.php';
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $data[] = $nama;
    $data[] = $kelas;

    $sql = "INSERT INTO siswa (nama,kelas) VALUES(?,?)";
    $row = $config -> prepare($sql);
    $row -> execute($data);

    echo '<script>window.location="admin.php"</script>';
?>