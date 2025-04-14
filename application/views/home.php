    <?php
        $this->load->view('header');
    ?>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="<?php echo base_url();?>assets/images/julien-unsplash.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="<?php echo base_url();?>assets/images/jeremyd-unsplash.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="<?php echo base_url();?>assets/images/karen-unsplash.png" style="width:100%">
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    <marquee>Harga Rp 60.000,00/tiket setiap hari</marquee>
    <br><h2 align="center">Film Terbaru<h2><br>
    <div class="content">
    <!-- Buat Form-->
    <form method="post" action="<?php echo base_url();?>index.php/WelcomeTIKU/pesan">
        <table>
        <tr><!--Membuat Perulangan keterangan file-->
        <?php foreach ($data as $film){ ?>
        <td>
            <center>
            <img height="450px" src="<?php echo base_url(); ?>assets/images/<?php echo $film['foto'];?>">
            <h5><?php echo $film['judul'];?></h5>
            </center>
            <p><?php echo $film['sinopsis'];?></p>
            <button name="id_film" value="<?php echo $film['id_film'];?>" type="submit" class="btn">Pesan</button>
            <small><?php echo $film['keterangan']; ?> </small>
            <br><br>
        </td>
        <?php } ?>
        </tr>
    </form>
    </div> <!-- content-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/tiku_slider.js"></script>
    <!-- javascript untuk slider -->
</body>
</html>