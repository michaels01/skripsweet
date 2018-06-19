<?php if(!defined('BASEPATH')) die('You are not allowed to access this page'); ?>
<?php
	if($_POST){
		extract(html_entities($_POST));
		$Qry = "UPDATE bahanbaku SET id_roti ='".$id_roti."', nama_bahan='".$nama_bahan."', harga_bahan ='".$harga_bahan."', jumlah_bahan='".$jumlah_bahan."' WHERE id_bahan='".$id."'";
		$Res = mysql_query($Qry);
		if($Res){
			$message = "<div class='success'>Berhasil mengupdate record..</div>";
		} else {
			$message = "<div class='error'>".mysql_error()."</div>";
		}
		$_SESSION['msg'] = $message;
		header("Location: index.php?p=bahanbaku");
	}
	
	$doSql = "SELECT * FROM bahanbaku INNER JOIN roti ON bahanbaku.id_roti = roti.id_roti WHERE id_bahan='".$_GET['id']."'";
	$doQry = mysql_query($doSql);
	$r = mysql_fetch_array($doQry);
	
?>
<span class="page-title">Edit Bahan</span>
<div class="inner">
<form id="formContent" name="formContent" method="post" action="" onsubmit="return validateForm('formContent')">
<input type="hidden" name="id" value="<?php echo $r['id_bahan'];?>" />
  <table width="480" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="151">Nama Roti</td>
      <td width="3">:</td>
      <td width="242">
        <select name="id_roti">
          <option value="<?php echo $r['id_roti']; ?>"><?php echo $r['nama_roti'];?></option>
          <?php
            $sql="SELECT * FROM roti where id_roti not in (select id_roti from bahanbaku) order by id_roti";
            $query=mysql_query($sql);
            while($data=mysql_fetch_array($query)){
              if($data['id_roti']==$id_roti){
                $cek="selected";
              }else{
                $cek="";
              }
            echo "<option value='$data[id_roti]'>$data[nama_roti]</option>";
            }
          ?>
    </select></td>
    </tr>
    <tr>
      <td width="151">Nama Bahan Baku</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" value="<?php echo $r['nama_bahan'];?>" name="nama_bahan" id="nama_bahan" /></td>
    </tr>
    <tr>
      <td width="151">Harga Bahan</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" value="<?php echo $r['harga_bahan'];?>" name="harga_bahan" id="harga_bahan" /></td>
    </tr>
    <tr>
      <td>Jumlah Bahan</td>
      <td>:</td>
      <td><input type="text"  class="input required" value="<?php echo $r['jumlah_bahan'];?>" name="jumlah_bahan" id="jumlah_bahan" /></td>
    </tr>
  </table>
  <hr />
  <input type="button" value="Cancel" class="button" onclick="window.location='index.php?p=bahanbaku';" />
  <input type="submit" value="Simpan" class="button" />
</form>
<div class="clr"></div>
</div>