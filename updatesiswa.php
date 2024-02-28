<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $data[] = $nama;
    $data[] = $kelas;
    $data[] = $id;

    $sql = 'UPDATE siswa SET nama=?, kelas=? WHERE id = ?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="admin.php"</script>';
?>