    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php site_url('petugas')?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li class="active">Laporan</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                        <div id="pengembalian">
                            <h1 style="margin:0; display: inline;">Pengembalian</h1>
                            <button onclick="refresh()" style="margin-left: 10px; margin-bottom: 15px;" type="button" class="btn btn-default">Refresh</button>
                        </div>
                        <hr>
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Bidang</th>
                                    <th>Tujuan</th>
                                    <th width="80px">Tanggal Pinjam</th>
                                    <th width="80px">Tanggal Kembali</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    foreach($laporan as $row){
                                ?>
                                    <tr>
                                        <td><?php $no++; echo $no; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->bidang; ?></td>
                                        <td><?php echo $row->tujuan; ?></td>
                                        <td><?php echo $row->tgl_pinjam; ?></td>
                                        <td><?php echo $row->tgl_kembali; ?></td>
                                        <td>
                                            <button onclick="myItems('<?php echo $row->id ?>')" class="btn btn-default btn1"><?php echo $row->status; ?></button>
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
        
        $(".btn1:contains('SELESAI')").attr('disabled', '');

        $('#myTable').dataTable();
    });

    function refresh()
    {
        location.reload();
    }
    
	function myItems(id){
		var url = "<?php echo site_url('petugas/pengembalian_barang') ?>/" + id;
		window.open(url, "", "left=350, top=20, width=600,height=500");
	}
	
    function hapus(kode)
    {
        if(confirm("Hapus Data?"))
        {
            $.ajax({
                url: "<?php echo site_url('petugas/hapus_laporan/') ?>" + kode,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    alert("Error");
                }
            });
        }
    }
    
    function form_pengembalian(id)
	{
		$('#form')[0].reset();

		$.ajax({
			url: "<?php echo site_url('petugas/pengembalian_barang/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{	
				$('#modal_form').modal('show');
				$('.modal-title').text('Edit Data');	
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				alert('Error');
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
					<div class="form-group">
                        <div class="col-md-4">
                            <label for="barang">Barang</label>
                            <select class="form-control" name="barang[]">
                                <option selected=""></option>
                                <?php foreach($barang as $row) { ?>
                                    <option value="<?php echo $row->nama; ?>">[ID <?php echo $row->kd_barang; ?>]&nbsp;<?php echo $row->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>ID</label>
                            <input type="text" name="kd_brg[]" class="form-control" placeholder="[ID Barang]" required="">
                        </div>
                        <div class="col-md-2">
                            <label>Jumlah</label>
                            <input type="text" name="jml[]" class="form-control" placeholder="Jumlah">
                        </div>
                        <div class="col-md-3">
                            <label>Penanggung Jawab</label>
                            <input type="text" name="pj[]" class="form-control" placeholder="Penanggung Jawab">
                        </div>
                        <div class="col-md-1">
                            <a href="javascript:void(0)" class="btn btn-success addButton"><i class="glyphicon glyphicon-plus"></i></a>
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

