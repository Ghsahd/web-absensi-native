<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_GET['id'];

    $data[] = $id;

    $sql = 'DELETE FROM data_absen WHERE id=?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="absen.php"</script>';
?>