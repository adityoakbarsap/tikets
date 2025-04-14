<!DOCTYPE html>
<head>
    <title>TIKU</title>
</head>
<body>
    <ul>
        <li>
            <a href = "<?php echo base_url();?>index.php">Home</a>
        </li>
        <li>
            <a href = "<?php echo base_url();?>index.php/WelcomeTIKU/tentang_kami">Tentang Kami</a>
        </li>
    </ul>

    <?php
        $this->load->view('header')
    ?>
    <!-- Tampilkan data yang diperlukan dari session-->
    <h2 align="center">Pesanan Tiket</h2>
    <h5><?php echo $this->session->userdata("judul"); ?></h5>
    <p><?php $tn=$this->session->userdata("tanggal_nonton");
        echo date('l', strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal"); ?></p>
    <hr width="25%" align="left">

    <!-- Menampilkan kursi yang telah dipilih -->
    <ul>
        <?php $i=0;foreach($data['kursi'] as $kursi){?>
        <li>
            <form method="post" action="<?php echo base_url()."index.php/WelcomeTIKU/hapusKursi/$i"; ?>">
                <?php echo $kursi;?>
                <button type="submit" name="submit" class="btn hapus">Hapus </button>
            </form>
        </li>
        <?php $i++;}?>
    </ul>
    <hr width="25%" align="left">
    <p>Total : <?php echo number_format(count($data['kursi'])*60000,2,',','.');?></p>
    <hr width="25%" align="left">

    <!--Pilihan Edit Kursi -->
    <form method="post" action="<?php echo base_url()."index.php/WelcomeTiku/edit"; ?>">
            <button type ="submit" name="submit" class="btn edit">Edit Kursi </button>
    </form>
    <!--Pilihan Hapus Semua Kursi -->
    <form method="post" action="<?php echo base_url(); ?>">
            <button type ="submit" name="submit" class="btn hapus">Hapus Semua </button>
    </form>
    <!--Pilihan Bayar -->
    <form method="post" action="<?php echo base_url()."index.php/WelcomeTiku/bayar"; ?>">
            <button type ="submit" name="submit" class="btn">Bayar </button>
    </form>
    <br>
</div>
</body>
</html>