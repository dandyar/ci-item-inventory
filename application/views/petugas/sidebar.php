<div id="wrapper">
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebarArea">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logoArea" href="#">
                    <img src="<?php echo base_url('images/monitor-3.png'); ?>" alt="LOGO" />&nbsp;&nbsp;SI2B
                </a>
            </div>
        
            <ul class="nav navbar-nav navbar-right top-nav">
                <li class="dropdown">
                    <a id="userArea" href="#" class="navbar-brand dropdown-toggle" data-toggle="dropdown"><img id="userImg" src="<?php echo base_url('images/user.png'); ?>"/><?php echo $user; ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('petugas/logout'); ?>"><i class="fa fa-fw fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="collapse navbar-collapse sidebarArea">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="<?php echo site_url('petugas') ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
                    <li>
                        <a href="<?php echo site_url('petugas/barang') ?>"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('petugas/peminjaman') ?>"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;Peminjaman</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('petugas/pengembalian') ?>"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Pengembalian</a>
                    </li>
                    <li><a href="<?php echo site_url('petugas/laporan') ?>"><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;&nbsp;Laporan</a></li>
                </ul>
            </div>
            
        </div>
    </nav>
