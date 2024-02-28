<?php
	@ob_start();
	session_start();
	require 'config.php';
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];

    $data[] = $nama;
    $data[] = $mapel;

    $sql = "INSERT INTO guru (nama,mapel) VALUES(?,?)";
    $row = $config -> prepare($sql);
    $row -> execute($data);

    echo '<script>window.location="dataguru.php"</script>';
?>