<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); // funtion anchor digunakan untukhyperlink ke halam lain misalnya karena tambah data berupa linkn?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;//inisialisai nomer dari angka 1
		foreach($user as $u){//mengganti variabel $user menjadi variabel $ u pada view agar tidak tertukar 
		?>
		<tr>
			<td><?php echo $no++ //agar nomer bisa uruit secara otomatis ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
				  <?php echo anchor('crud/edit/'.$u->id,'Edit');//link ini bertrujuan untuk memanggil function edit dan berisi pengiriman data id pada segment 3 nya
				  // funtion anchor digunakan untukhyperlink ke halam lain misalnya karena edit berupa linkn ?>
							  <?php echo anchor('crud/hapus/'.$u->id,'Hapus');//link ini bertrujuan untuk memanggil function hapus dan berisi pengiriman data id pada segment 3 nya
							  // funtion anchor digunakan untukhyperlink ke halam lain misalnya karena hapus berupa link ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>