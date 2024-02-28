<?php
	@ob_start();
	session_start();
	require 'config.php';
    $id = $_GET['id'];

    $data[] = $id;

    $sql = 'DELETE FROM guru WHERE id=?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>window.location="dataguru.php"</script>';
?>