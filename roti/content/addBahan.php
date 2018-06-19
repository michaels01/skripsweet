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
		$Qry = "INSERT INTO bahanbaku (id_bahan, id_roti, nama_bahan, harga_bahan, jumlah_bahan)
			VALUES ('".$id_bahan."', '".$id_roti."', '".$nama_bahan."', '".$harga_bahan."', '".$jumlah_bahan."')";
		$Res = mysql_query($Qry);
		if($Res){
			$message = "<div class='success'>Berhasil menambah record baru..</div>";
		} else {
			$message = "<div class='error'>".mysql_error()."</div>";
		}
		$_SESSION['msg'] = $message;
		header("Location: index.php?p=bahanbaku");
	}
?>
<span class="page-title">Tambah Bahan Baku</span>
<div class="inner">
<form id="formContent" name="formContent" method="post" action="" onsubmit="return validateForm('formContent')">
  <table width="480" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="151">ID Bahan</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" name="id_bahan" id="id_bahan" readonly = "readonly" value="<?php echo autoNumber('id_bahan','bahanbaku');?>" /></td>
    </tr>
     <tr>
      <td width="151">Nama Roti</td>
      <td width="3">:</td>
      <td width="242">
        <select name="id_roti">
          <option>[Nama Roti]</option>
          <?php
            $sql="SELECT * FROM roti order by id_roti";
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
      <td width="242"><input type="text" class="input required" name="nama_bahan" id="nama_bahan" /></td>
    </tr>
    <tr>
      <td width="151">Harga Bahan</td>
      <td width="3">:</td>
      <td width="242"><input type="text" class="input required" name="harga_bahan" id="harga_bahan" /></td>
    </tr>
    <tr>
      <td>Jumlah Bahan</td>
      <td>:</td>
      <td><input type="text"  class="input required" name="jumlah_bahan" id="jumlah_bahan" /></td>
    </tr>
  </table>
  <hr />
  <input type="button" value="Cancel" class="button" onclick="window.location='index.php?p=bahanbaku';" />
  <input type="submit" value="Simpan" class="button" />
</form>
<div class="clr"></div>
</div>