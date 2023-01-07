    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php site_url('petugas')?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li class="active">Laporan</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                        <div id="heading1">
                            <h1>Laporan</h1>
                            <br>
                            <hr>
                            <br>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#active">Active</a></li>
                            <li><a data-toggle="tab" href="#menu1">SELESAI</a></li>
                        </ul>

                        <div class="tab-content">
                            <br>
                            <div id="active" class="tab-pane fade in active">
                                <table class="table table-bordered table-striped table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Bidang</th>
                                            <th>Tujuan</th>
                                            <th width="80px">Tanggal Pinjam</th>
                                            <th width="80px">Tanggal Kembali</th>
                                            <th width="100px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            foreach($laporan as $row){
                                        ?>
                                            <tr class="row1">
                                                <td><?php $no++; echo $no; ?></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->bidang; ?></td>
                                                <td><?php echo $row->tujuan; ?></td>
                                                <td><?php echo $row->tgl_pinjam; ?></td>
                                                <td class="tgl_kembali"><?php echo $row->tgl_kembali; ?></td>
                                                <td>
                                                    <a target="_blank" class="btn btn-default" href="<?php echo site_url('admin/pdf/'.$row->id)?>"><i class="fa fa-print"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <table class="table table-bordered table-striped table-hover" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Bidang</th>
                                            <th>Tujuan</th>
                                            <th width="80px">Tanggal Pinjam</th>
                                            <th width="80px">Tanggal Kembali</th>
                                            <th width="100px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            foreach($laporan2 as $row){
                                        ?>
                                            <tr>
                                                <td><?php $no++; echo $no; ?></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->bidang; ?></td>
                                                <td><?php echo $row->tujuan; ?></td>
                                                <td><?php echo $row->tgl_pinjam; ?></td>
                                                <td><?php echo $row->tgl_kembali; ?></td>
                                                <td>
                                            
                                                    <a target="_blank" class="btn btn-default" href="<?php echo site_url('admin/cetakpdf/'.$row->id)?>"><i class="fa fa-print"></i></a>
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
    </div>
    
</div> <!-- End of div#wrapper -->

<script>
    $(document).ready(function(){

        $('#myTable').dataTable();
        $('#myTable1').dataTable();

    });
    
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
</script>

