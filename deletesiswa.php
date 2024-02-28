<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_GET['id'];

    $data[] = $id;

    $sql = 'DELETE FROM siswa WHERE id=?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="admin.php"</script>';
?>