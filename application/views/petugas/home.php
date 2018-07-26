    <div id="mainArea">
        <ul class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</li>
            <li></li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Laporan Terbaru</h4>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Tgl. Pinjam</th>
                                            <th>Tgl. Kembali</th>

                                        </thead>
                                        <tbody>
                                            <?php foreach($laporan_terbaru as $row){?>
                                                <tr>
                                                    <td><?php echo $row->id; ?></td>
                                                    <td><?php echo $row->nama; ?></td>
                                                    <td><?php echo $row->tgl_pinjam; ?></td>
                                                    <td><?php echo $row->tgl_kembali; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <table align="left" id="dcalendar" class="calendar"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div> <!-- End of div#wrapper -->

<script>
    $(document).ready(function(){
        $('#tbl_user').dataTable();
        $('#dcalendar').dcalendar({theme: ''});
    });
</script>