    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('petugas'); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li class="active">Barang</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                    <button onclick="tambah_barang()" class="btn btn-default">Tambah Barang</button>
                    <hr>                    
                    <table id="tbl_user" class="table table-striped table-bordered table-hover">
                        <thead>
							<th width="40">No.</th>
                            <th>BARANG</th>
							<th>ID</th>	
                            <th>KATEGORI</th>
                            <th>STOK</th>
							<th></th>
                        </thead>
                        <tbody>
                            <?php
								$no = 0;
								foreach($data_barang as $row) {
							?>
                            <tr>
								<td><?php $no++; echo $no; ?></td>
                                <td><?php echo $row->nama; ?></td>
								<td><?php echo $row->kd_barang; ?></td>
                                <td><?php echo $row->kategori; ?></td>
                                <td><?php echo $row->stok; ?></td>
								<td align="center">
                                    <button onclick="form_barang(<?php echo $row->kd_barang; ?>)" class="btn btn-warning btn-sm">Edit</button>
                                    <button onclick="hapus_data(<?php echo $row->kd_barang; ?>)" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div> <!-- End of div#wrapper -->

<script>
    $(document).ready(function(){
        $('#tbl_user').dataTable();
    });
                        
                        
	var simpan;

	function tambah_barang()
	{
		simpan = 'tambah';

		$('#form')[0].reset();
		$('#modal_form').modal('show');
		$('.modal-title').text('Tambah Barang');
	}


	function form_barang(id)
	{
		$('#form')[0].reset();

		$.ajax({
			url: "<?php echo site_url('admin/get_by_id/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{	
				$('[name="id"]').val(data.kd_barang);
				$('[name="barang"]').val(data.nama);
                $('[name="kategori"]').val(data.kategori);
				$('[name="stok"]').val(data.stok);

				$('#modal_form').modal('show');
				$('.modal-title').text('Edit Data');	
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				alert('Error');
			}
		});
	}

	function hapus_data(id)
	{
		if(confirm('Hapus Data?'))
		{
			$.ajax({
				url: "<?php echo site_url('admin/hapus_barang') ?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.reload();
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					alert("Terjadi Kesalahan, Silahkan Coba Lagi");
				}
			});
		}
	} 

	function simpan_data()
	{
		var url;
		if(simpan == 'tambah')
		{
			url = "<?php echo site_url('admin/tambah_barang') ?>"; 
		}
		else
		{
			url = "<?php echo site_url('admin/update_barang') ?>"; 
		}

		$.ajax({
			url: url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data)
			{
				alert('Data Berhasil Disimpan');
				$('#modal_form').modal('hide');
				location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				alert('Terjadi Kesalahan Ketika Menyimpan Data');
			}
		});
	}
    
</script>

<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Barang</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="form" class="form-horizontal">
					<input type="hidden" name="id" value="">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Barang</label>
							<div class="col-md-9">
								<input type="text" name="barang" class="form-control" placeholder="Masukan Nama Barang" required="">
							</div>
						</div>
                        <div class="form-group">
							<label class="control-label col-md-3">Kategori</label>
							<div class="col-md-9">
								<select name="kategori" class="form-control">
									<option selected=""></option>
									<option>Elektronik</option>
									<option>Otomotif</option>
									<option>Kesehatan</option>
									<option>Software</option>
									<option>Buku</option>
									<option>Office & Stationery</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">stok</label>
							<div class="col-md-9">
								<input type="text" name="stok" class="form-control" placeholder="Masukan Stok Barang" required="">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="simpan_data()">Simpan</button>
				<button class="btn btn-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>	
</div>