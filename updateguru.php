<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];

    $data[] = $nama;
    $data[] = $mapel;
    $data[] = $id;

    $sql = 'UPDATE guru SET nama=?, mapel=? WHERE id = ?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="dataguru.php"</script>';
?>