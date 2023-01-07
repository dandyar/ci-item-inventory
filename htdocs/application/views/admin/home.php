    <div id="mainArea">
        <ul class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</li>
            <li></li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-primary newUser">
                        <div class="panel-heading">
                            <h5>User Baru</h5>
                        </div>
                        <div class="panel-body">
                            <h4>Petugas</h4>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($new_user_petugas as $petugas){ ?>
                                    <tr>
                                        <td><?php echo $petugas->uid; ?></td>
                                        <td><?php echo $petugas->name; ?></td>
                                        <td><?php echo $petugas->username; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h4>Admin</h4>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($new_user_admin as $admin){ ?>
                                    <tr>
                                        <td><?php echo $admin->uid; ?></td>
                                        <td><?php echo $admin->name; ?></td>
                                        <td><?php echo $admin->username; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="dcalendar"></div>
                </div>
            </div>
        </div>
    </div>
    
</div> <!-- End of div#wrapper -->
<script>
    $(document).ready(function(){
        $('#dcalendar').dcalendar({theme: 'red'});    
    });
</script>