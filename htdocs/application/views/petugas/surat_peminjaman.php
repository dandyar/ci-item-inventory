<!DOCTYPE html>
<html>
<head>
	<title>Report Table</title>
	<style type="text/css">
		@page{
			size: a4 portrait;
		}
		body{
			font-family: sans-serif;
		}
		#kop-surat, td{
			border: 1px solid #000;
		}
		.company-name{
			border: none;
			text-align: center;
			font-size: 10px;
		}
		.no-kopsurat{
			font-size: 12px;
		}
		.center{
			text-align: center;
		}
		.container{
			padding: 0 15px;
		}
		center h4{
			line-height: 25px;
		}
		
		#data_pemohon{
			margin-bottom: 20px;
		}
		
		.bottom p{
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body>
		<table id="kop-surat" width="100%" cellspacing="0">
			<tr>
				<td width="120px" class="company-name" rowspan="4"><img width="100px" src="<?php echo base_url('images/pusjatan.png'); ?>"></td>
				<td width="330px" class="center" rowspan="3" colspan="3"><b>FORMULIR<br>SISTEM INTEGRASI</b></td>
				<td width="100px" class="no-kopsurat">No. Bagian</td>
				<td class="no-kopsurat">&nbsp;:&nbsp;02</td>
				
				
			</tr>
			<tr>
				<td class="no-kopsurat">Terbitan/ Revisi</td>
				<td class="no-kopsurat">&nbsp;:&nbsp;1/0</td>
				
				
			</tr>
			<tr>
				<td class="no-kopsurat">Nomer ID Doc</td>
				<td class="no-kopsurat">&nbsp;:&nbsp;DSIP/F-PJS-02-01-06</td>
				

			</tr>
			<tr>
				<td class="center" rowspan="2" colspan="3"><b>DAFTAR PERMINTAAN DOKUMEN</b></td>
				<td class="center" style="font-size: 12px;" rowspan="2" colspan="2">Halaman 1 Dari 1</td>
				
			</tr>
			<tr>
				<td class="company-name">PUSJATAN - KEMENPU</td>
			</tr>
		</table>
		
		<div class="container">
			<CENTER>
				<h4>
					PERMOHONAN<BR>
					PERMINTAAN/PEMINJAMAN/PENGADAAN BARANG *)<BR>
					<U>DATA PEMOHON</U>
				</h4>
			</CENTER>
			
		<table id="data_pemohon" width="100;" border="0" cellpadding="4">
			<tr>
				<td width="180px">Nama</td>
				<td>:</td>
				<td width="200px"><?php echo $data_peminjam->nama; ?></td>
			</tr>
			<tr>
				<td>Bagian/Bidang/Balai</td>
				<td>:</td>
				<td><?php echo $data_peminjam->bidang; ?></td>
			</tr>
			<tr>
				<td>Tujuan Permohonan</td>
				<td>:</td>
				<td><?php echo $data_peminjam->tujuan; ?></td>
			</tr>
			<tr>
				<td>Tanggal Peminjaman</td>
				<td>:</td>
				<td><?php echo $data_peminjam->tgl_pinjam; ?></td>
			</tr>
			<tr>
				<td>Tanggal Dikembalikan</td>
				<td>:</td>
				<td><?php echo $data_peminjam->tgl_kembali; ?></td>
			</tr>

		</table>
		
		<table id="data_barang" cellspacing="0" width="100%" border="1">
			<tr>
				<th>NO</th>
				<th>Barang</th>
				<th>Jumlah</th>
				<th>Penanggung Jawab</th>
			</tr>
			<?php
				$no = 0;
				foreach($barang_peminjam as $row){
			?>
				<tr>
					<td><?php $no++; echo $no; ?></td>
					<td><?php echo $row->nama_barang ?></td>
					<td><?php echo $row->jml ?></td>
					<td><?php echo $row->penanggung_jawab ?></td>
				</tr>
			<?php } ?>
		</table><br>
		
		<div class="bottom">
			<p>Dengan dipenuhinnya permintaan/peminjaman/penggandaan*) barang tersebut di atas, saya menyatakan tidak
			akan menyalahgunkan barang tersebut dan bertanggung jawab jika terjadi penyalahgunaan dokumen tersebut dan bersedia
			diproses sesuai hukum yang berlaku.</p><br>
			<p style="margin-bottom: 15px;">Permohonan dipenuhi/ditolak *)</p>

			<table border="0" id="bottom" width="100%">
				<tr>
					<td width="50%"></td>
					<td width="50%">
						<p style="padding-left: 100px; margin-bottom: 5px;">Bandung, </p>
						<span style="text-align: center;">
							<p>Pemohon</p>
							<br>
							<br>
							<br>
							<p>Tanda tangan dan nama lengkap </p>
						</span>
					</td>
				</tr>
			</table><br>
			<p>Catatan : *) coret yang tidak diperlukan</p>
		</div>
		
		</div>
</body>
</html>