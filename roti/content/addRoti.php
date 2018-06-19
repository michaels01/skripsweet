<?php if(!defined('BASEPATH')) die('You are not allowed to access this page'); ?>
<?php
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
    extract(html_entities($_POST));
    $Qry = "INSERT INTO roti (id_roti, nama_roti, harga_roti)  VALUES ('".$id_roti."','".$nama_roti."','".$harga."')";
    $Res = mysql_query($Qry) or die(mysql_error());
		if ($Res){
			$message = "<div class='success'>Berhasil menambah record baru..</div>";
		} else {
			$message = "<div class='error'>".mysql_error()."</div>";
		}
		$_SESSION['msg'] = $message;
		header("Location: index.php?p=roti");
	}
?>
<span class="page-title">Tambah Roti</span>
<div class="inner">
<form id="formContent" name="formContent" method="post" action="" onsubmit="return validateForm('formContent')">
  <table width="480" border="0" cellspacing="0" cellpadding="5">
		<tr>
      <td width="151">ID Roti</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" name="id_roti" id="id_roti" readonly = "readonly" value="<?php echo autoNumber('id_roti','roti');?>" /></td>
    </tr>
    <tr>
      <td width="151">Nama Roti</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" name="nama_roti" id="nama_roti" /></td>
    </tr>
		<tr>
      <td width="151">Harga Roti</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" name="harga" id="harga" /></td>
    </tr>
  </table>
  <hr />
  <input type="button" value="Cancel" class="button" onclick="window.location='index.php?p=roti';" />
  <input type="submit" value="Simpan" class="button" />
</form>
<div class="clr"></div>
</div>