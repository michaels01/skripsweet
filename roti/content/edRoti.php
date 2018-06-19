<?php if(!defined('BASEPATH')) die('You are not allowed to access this page'); ?>
<?php
	if($_POST){
		extract(html_entities($_POST));
		$Qry = "UPDATE roti SET nama_roti='".$nama_roti."', harga_roti='".$harga."' WHERE id_roti='".$id."'";
		$Res = mysql_query($Qry);
		if($Res){
			$message = "<div class='success'>Berhasil mengupdate record..</div>";
		} else {
			$message = "<div class='error'>".mysql_error()."</div>";
		}
		$_SESSION['msg'] = $message;
		header("Location: index.php?p=roti");
	}
	
	$doSql = "SELECT * FROM roti WHERE id_roti='".$_GET['id']."'";
	$doQry = mysql_query($doSql);
	$r = mysql_fetch_array($doQry);
?>
<span class="page-title">Edit Roti</span>
<div class="inner">
<form id="formContent" name="formContent" method="post" action="" onsubmit="return validateForm('formContent')">
<input type="hidden" name="id" value="<?php echo $r['id_roti'];?>" />
  <table width="480" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="151">Nama Roti</td>
      <td width="3">:</td>
      <td width="242"><input type="text" value="<?php echo $r['nama_roti'];?>" class="input required" name="nama_roti" id="nama_roti" /></td>
    </tr>
		<tr>
      <td width="151">Harga Roti</td>
      <td width="3">:</td>
      <td width="242"><input type="text" value="<?php echo $r['harga_roti'];?>" class="input required" name="harga" id="harga" /></td>
    </tr>
  </table>
  <hr />
  <input type="button" value="Cancel" class="button" onclick="window.location='index.php?p=roti';" />
  <input type="submit" value="Simpan" class="button" />
</form>
<div class="clr"></div>
</div>