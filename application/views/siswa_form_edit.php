<!DOCTYPE html>
<html>
<head>
	<title>Updating Record</title>
</head>
<body>

<form action="<?php echo base_url('index.php/siswa_con/siswa_update') ?>" method="post">
	<label>NIS Anda: <?php echo $siswa2->siswa_nis ?></label><br>
	<input type="hidden" name="siswa_nis" value=<?php echo $siswa2->siswa_nis ?>><br>
	<label>Kelas</label>
    <select name="kelas_id" required="flags">
    	<?php if(strlen($siswa2->kelas_nama)<1){ ?>
        <option value="">-- Pilih Kelas --</option> <?php } ?>
        <?php 
            foreach($kelas as $value){?>
            <option value="<?php echo $value['kelas_id'] ?>"
                <?php if($siswa2->kelas_id == $value['kelas_id']) echo "selected" ?>
            >
                <?php echo $value['kelas_nama'] ?>
            </option>
            <?php } ?>
    </select>
<!-- 	<select name="kelas_id" <?php if(strlen($siswa2->kelas_nama)<1){ ?> required="flags" <?php } ?>>
 			<option <?php if(strlen($siswa2->kelas_nama)<1){ ?> value="<?php echo $siswa2->kelas_id;?>" <?php } else{  ?> value="" <?php } ?>>
 			<?php if(strlen($siswa2->kelas_nama)<1){ ?>
 			-- Pilih Kelas --
 			<?php } else echo $siswa2->kelas_nama;	 ?>
 			</option>
			<?php 
				foreach($kelas as $value){ if($value['kelas_id']==$siswa2->kelas_id){ echo "selected";} else {?>
				<option value="<?php echo $value['kelas_id']; ?>"><?php echo $value['kelas_nama']; ?></option>	
			<?php }}
			 ?> 
		</select> -->
        <br>
	<label>Nama</label>
	<input type="text" name="siswa_nama" required="flags" value=<?php echo $siswa2->siswa_nama ?>><br>
	<label>Alamat</label>
	<input type="textarea" name="siswa_alamat" required="flags" value=<?php echo $siswa2->siswa_alamat ?>><br>
	<input type="submit" name="submit" value="Submit"><br>


</form>
</body>
</html>

