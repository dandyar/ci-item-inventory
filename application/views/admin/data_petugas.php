    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li><a href="javascript:void(0)">User</a></li>
            <li class="active">Petugas</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                    <button style="margin-bottom: 10px;" onclick="add_petugas()" class="btn btn-default">Tambah Petugas</button>
                    <hr>
					<br>
                    <table id="tbl_user" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th width="50px">NO</th>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th width="150px">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach($data_petugas as $row) {
                            ?>
                            <tr>
                                <td><?php $no++; echo $no; ?></td>
                                <td><?php echo $row->uid; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td>
                                    <button onclick="update_admin(<?php echo $row->uid; ?>)" class="btn btn-warning btn-sm">Edit</button>
                                    <button onclick="hapus_data(<?php echo $row->uid; ?>)" class="btn btn-danger btn-sm">Hapus</button>
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
    
</div> 

<script>
    $(document).ready(function(){
        $('#tbl_user').dataTable();
    });
    var simpan;

	function add_petugas()
	{
		simpan = 'tambah';

		$('#form')[0].reset();
		$('#modal_form').modal('show');
		$('.modal-title').text('Tambah Petugas');
	}


	function update_admin(id)
	{
		$('#form')[0].reset();

		$.ajax({
			url: "<?php echo site_url('admin/select_by_id/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
                $('[name="id"]').val(data.uid);
				$('[name="name"]').val(data.name);
				$('[name="username"]').val(data.username);
                $('[name="password"]').val(data.password);

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
				url: "<?php echo site_url('admin/hapus_data/') ?>" + id,
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
			url = "<?php echo site_url('admin/add_petugas') ?>"; 
		}
		else
		{
			url = "<?php echo site_url('admin/update_data') ?>"; 
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
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Barang</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="form">
                    <input type="hidden" name="id" value="">
					<div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input name="username" type="text" class="form-control" placeholder="Masukan Nama Pengguna">
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input name="password" type="text" class="form-control" placeholder="Masukan Kata Sandi">
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