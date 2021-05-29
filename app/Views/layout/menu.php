<!-- ini adalah view partial-->
<!-- view partial adalah view yang bisa digunakan kembali -->
<!-- view partial bisa kita include-kan di dalam layout maupun view -->
<!-- fungsinya untuk memilah-milah bagian halaman layout atau view -->
<!-- view partial biasanya digunakan agar mempermudah proses maintenance file layout/view -->
<!-- contohnya halaman layout dapat dipisahkan menjadi navbar, header & footer -->
<!-- view partial ini merupakan main menu(side menu) pada halaman layout -->
<!-- =site_url('gawe') akan mengarahkan ke url 'localhost:8080/gawe', dimana akan diarahkan ke controler Gawe function index -->
<!-- site_url biasanya digunakan untuk mengakses controller tertentu,  -->
<!-- sedangkan base_url untuk mengakses resource yg ada di direktori root web -->

<li class="menu-header">Main Menu</li>
<li class="active"><a class="nav-link" href="<?=site_url()?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
</li>
<li class="active"><a class="nav-link" href="<?=site_url('gawe')?>"><i class="far fa-calendar"></i> <span>Gawe /
            Acara</span></a></li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="far fa-address-book"></i><span>Kontak</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="">Group Kontak</a></li>
        <li><a class="nav-link" href="">Kontak Saya</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-envelope"></i>
        <span>Undangan</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="">Saya Mengundang</a></li>
        <li><a class="nav-link" href="">Saya diundang</a></li>
    </ul>
</li>