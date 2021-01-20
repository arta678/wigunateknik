 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <form role="form" method="GET" action="<?= url('barang');?>">
            <div class="input-group custom-search-form sidebar-search">
                <input type="text" class="form-control " placeholder="Cari Barang" name="cari" id="cari" style="font-size: 24px;">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                

            </div>

        </form>
    </div>
</nav>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse ">
        <ul class="nav " id="side-menu">
            <li>
                <a href="<?= url('dashboard')?>"><i class="fa fas fa-home fa-fw" style="font-size: 25px;"></i><strong> Dashboard</strong></a>
            </li>
            <li>
                <a href="<?= url('barang')?>"><i class="fa fas fa-database fa-fw " style="font-size: 25px;"></i> <strong>Barang</strong></a>
            </li>
           <!--  <li>
                <a href="<?= url('kategori')?>"><i class="fa fas fa-database fa-fw " style="font-size: 25px;"></i> <strong>Kategori</strong></a>
            </li> -->
            
            <li>
                <a href="<?= url('keluar')?>"><i class="fa fas fa-cart-arrow-down fa-fw" style="font-size: 25px;"></i> <strong><u>Barang Keluar</u></strong></a>
            </li>
            <li>
                <a href="<?= url('masuk')?>"><i class="fa fas fa-truck fa-fw" style="font-size: 25px;"></i> <strong><u>Barang Masuk</u></strong></a>
            </li>
            <li>
                <a href="<?= url('transaksi')?>"><i class="fa fas fa-history fa-fw" style="font-size: 25px;"></i> <strong>Transaksi</strong></a>
            </li>
             <!-- <li>
                <a href="#"><i class="fa fas fa-chart-pie fa-fw" style="font-size: 25px;"></i> <strong>Laporan</strong></a>
            </li> -->
            <li>
                <a href="<?= url('nota')?>"><i class="fa fas fa-book fa-fw" style="font-size: 25px;"></i> <strong>Nota Supplier</strong></a>
            </li>
            
            <li>
                <a href="<?= url('supplier')?>"><i class="fa fas fa-users fa-fw" style="font-size: 25px;"></i> <strong>Supplier</strong></a>
            </li>
            <!-- <li>
                <a href="<?= url('customer')?>"><i class="fa fas fa-user fa-fw" style="font-size: 25px;"></i> <strong>Konsumen</strong></a>
            </li>
            <li>
                <a href="<?= url('customer')?>"><i class="fa fas fa-user-cog fa-fw" style="font-size: 25px;"></i> <strong>Pegawai</strong></a>
            </li> -->
        </ul>
    </div>
</nav>