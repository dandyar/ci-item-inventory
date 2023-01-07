    <div class="container-fluid">
        <center>
            <h3>Data Barang</h3>
            <hr>
        </center>
        <table class="table table-bordered table-condensed table-responsive">
            <form action="<?php echo site_url('petugas/proses_pengembalian/'.$data_peminjam->id)?>" id="form" method="POST">
			<thead>
				<th>NO</th>
				<th>Barang</th>
                <th width="40">ID</th>
				<th width="40">Jml</th>
				<th>Penanggung Jawab</th>
			</thead>
            <tbody>
			<?php
				$no = 0;
				foreach($barang_peminjam as $row){
			?>
				<tr>
					<td><?php $no++; echo $no; ?><input value="<?php echo $row->kode ?>" type="hidden" name="kd_peminjaman[]"></td>
					<td><input value="<?php echo $row->nama_barang ?>" type="text" name="barang[]"></td>
                    <td><input value="<?php echo $row->kd_barang ?>" class="kd_barang" type="text" name="kd_brg[]"></td>
					<td><input value="<?php echo $row->jml ?>" class="jml" type="text" name="jml[]"></td>
					<td><input value="<?php echo $row->penanggung_jawab ?>" type="text" name="pj[]"></td>
				</tr>
			<?php } ?>
            </tbody>
		</table>
    </div>
        <div class="footer">
            <div class="container">

                <input class="btn btn-success btn-block" type="submit" value="submit"><br>
                <button type="button" onclick="closeWin()" class="btn btn-danger btn-block">Cancel</button>
            </div>
        </div>
        </form>
<script>
    function closeWin()
    {
        var x = "<?php echo site_url('petugas/pengembalian'); ?>";
        window.close();
        x.reload();
    }
</script>