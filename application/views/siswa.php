<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<body>
	<h1>Selamat datang <?php echo $this->session->userdata('username'); ?></h1>
	<a href="<?php echo base_url() ?>">Home</a><?php echo "  " ?><a href="<?php echo base_url('index.php/login_con/logout') ?>">
		Logout
	</a>
	<!-- <a href="<?php echo base_url('/views/login.php') ?>">Login</a> -->
	<h2>Data siswa</h2>
	<form action="<?php echo base_url('index.php/siswa_con/siswa_insert') ?>" method="post">
		<label>NIS</label>
		<input type="text" name="siswa_nis" required="flags"><br>
		<label>Kelas</label>
		<select name="kelas_id" required="flags">
			<option value="">-- Pilih Kelas --</option>
			<?php 
				foreach($kelas as $value){ ?>
				<option value="<?php echo $value['kelas_id']; ?>"><?php echo $value['kelas_nama']; ?></option>	
			<?php }
			 ?>
		</select>
		<br>
		<label>Nama</label>
		<input type="text" name="siswa_nama" required="flags"><br>
		<label>Alamat</label>
		<textarea name="siswa_alamat" required="flags"></textarea><br>
		<input type="submit" name="simpan" value="Simpan"><br>
	</form>
	<br>
	<form action="<?php echo base_url('index.php/siswa_con/siswa_search') ?>" method="post">
		<input type="text" name="siswa_cari" placeholder="Cari nama disini">
		<input type="submit" name="submit" value="Search">

	</form>
	<h2>Data Siswa</h2>

	<table width=45% border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>Kelas</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>

		<?php 
		$no =1;
			foreach($siswa1 as $value){ ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $value['siswa_nis']; ?></td>
				<td><?php echo $value['kelas_nama']; ?></td>	
				<td><?php echo $value['siswa_nama']; ?></td>
				<td><?php echo $value['siswa_alamat']; ?></td>
				<td align="center"><a href="<?php echo base_url('index.php/siswa_con/siswa_edit') ?>?siswa_nis=<?php echo $value['siswa_nis'];?>">Edit</a> | 
				<a href="<?php echo base_url('index.php/siswa_con/siswa_delete') ?>?siswa_nis=<?php echo $value['siswa_nis'];?>">Del</a> 
				</td>
			</tr>
		
		<?php	$no++;}
		 ?>

	</table>
	<br>
	
</body>
</html>
