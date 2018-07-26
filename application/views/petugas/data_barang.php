    <div id="mainArea">
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('petugas'); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li class="active">Data Barang</li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainContent">
                    <h3 style="display: inline;">Data Barang</h3>&nbsp;
                    <hr>                    
                    <table id="tbl_user" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>ID</th>
                            <th>BARANG</th>
                            <th>KATEGORI</th>
                            <th>STOK</th>
                        </thead>
                        <tbody>
                            <?php foreach($data_barang as $row) { ?>
                            <tr>
                                <td><?php echo $row->kd_barang; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->kategori; ?></td>
                                <td><?php echo $row->stok; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $('#tbl_user').dataTable();
    });
</script>
