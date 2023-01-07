    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('petugas'); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li class="active">Peminjaman</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                        <h4>Data Pemohon</h4>
                        <hr>
                        
                        <form action="<?php echo site_url('petugas/tambah_peminjaman') ?>" method="POST" class="form-horizontal" id="form-peminjaman">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Bagian/Bidang/Balai</label>
                                <div class="col-md-9">
                                    <input required="" type="text" name="bidang" class="form-control" placeholder="Masukan Bagian/Bidang/Balai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tujuan Permohonan</label>
                                <div class="col-md-9">
                                    <input required="" type="text" name="tujuan" class="form-control" placeholder="Tujuan Permohonan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Peminjaman</label>
                                <div class="col-md-9">
                                    <input required="" type="text" name="tgl_pinjam" class="form-control" placeholder="YYYY/MM/DD">
                                </div>
                            </div>
                            <br>
                            <h4 style="display: inline; margin-right: 10px;">Data Barang</h4>
                            <hr>
                            <div class="formBarang">
                            <div class="myDiv">
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
                            </div>
                            </div>
                            
                            <hr>
                            <br>
                            <center>
                                <button class="btn btn-primary" type="submit">SIMPAN</button>&nbsp;
                                <button type="reset" class="btn btn-danger">BATAL</button>
                            </center>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div> <!-- End of div#wrapper -->

<script>
    $(document).ready(function(){
        var tgl_pinjam = $('input[name="tgl_pinjam"]');
        var tgl_kembali = $('input[name="tgl_kembali"]');
        var container = $('.mainContent .form-peminjaman').length>0 ? $('div.mainContent .form-peminjaman').parent() : "body";
        var option = {
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        var max_fields = 10;
        var wrapper = $('.formBarang');
        var add = $('.addButton');
        var fields = '<div class="myDiv"><div class="form-group"><div class="col-md-4"><label>Barang</label><select class="form-control" name="barang[]"><option selected=""></option><?php foreach($barang as $row) { ?><option value="<?php echo $row->nama; ?>">[ID <?php echo $row->kd_barang; ?>]&nbsp;<?php echo $row->nama; ?></option><?php } ?></select></div><div class="col-md-2"><label>ID</label><input type="text" name="kd_brg[]" class="form-control" placeholder="[ID Barang]" required=""></div><div class="col-md-2"><label>Jumlah</label><input type="text" name="jml[]" class="form-control" placeholder="Jumlah"></div><div class="col-md-3"><label>Penanggung Jawab</label><input type="text" name="pj[]" class="form-control"placeholder="Penanggung Jawab"></div><div class="col-md-1"><button class="btn btn-danger remove_button"><i class="glyphicon glyphicon-remove"></i></button></div></div></div>' ;
        
        var x = 1;
        
        $(add).click(function(e){
           e.preventDefault();
           if(x < max_fields){
            x++;
            $(wrapper).append(fields);
           }
        });
        
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
                $(this).parentsUntil(wrapper).remove();
            x--;
        });
        
        tgl_pinjam.datepicker(option);
        tgl_kembali.datepicker(option);
        
        $('#tbl_user').dataTable();

    });
    
</script>