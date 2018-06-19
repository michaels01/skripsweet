<?php
include "config.php";
  function autoNumber($id, $table){
  	$query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
  	$result = mysql_query($query) or die(mysql_error());
  	$data = mysql_fetch_array($result);
  	$id_max = $data['max_id'];
  	$sort_num = (int) substr($id_max, 1, 4);
  	$sort_num++;
  	$new_code = sprintf("%04s", $sort_num);
  	return $new_code;
	}
	if($_POST){
    $id_roti = $_POST['id_roti'];
    $nama_roti = $_POST['nama_roti'];
    $harga = $_POST['harga'];
    echo $id_roti.','.$nama_roti.','.$harga.','.$_POST['id_bahan[0]'];
    for($n=0;$n<=5;$n++){
      echo $_POST['id_bahan[$n]'];
    }
    $Qry = "INSERT INTO roti_hdr (id_roti, nama_roti, harga)  VALUES ('".$id_roti."','".$nama_roti."','".$harga."')";
    for($n=0;$n<=5;$n++){
    //  $data2=array($_POST['id_bahan[$n]'].' => '.$_POST['$qty[$n]']);
    };
    foreach($data2 as $j => $k){
    //  $Qry2 = "INSERT INTO roti_dtl (id_roti, id_bahan, qty_bahan) VALUES ('".$id_roti."','". $j."','".$k."')";
    };
		//$Res = mysql_query($Qry) or die(mysql_error());
		//$Res2 = mysql_query($Qry2) or die(mysql_error());
		if ($Res && $Res2){
			$message = "<div class='success'>Berhasil menambah record baru..</div>";
		} else {
			$message = "<div class='error'>".mysql_error()."</div>";
		}
		$_SESSION['msg'] = $message;
		
	}
  ?>