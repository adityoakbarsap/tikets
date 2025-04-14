<?php
        $this->load->view('header');
    ?>
    
    <h2 align="center">Pesan Tiker Film</h2>
    <form method="post" action="<?php echo base_url();?>index.php/WelcomeTIKU/pesan_kursi">
        <div class="content">
        <table>
        <tr>
            <td>
        <img src="<?php echo base_url(); ?>assets/images/<?php echo $data['film'][0]['foto'];?>">
            </td>
        <td>
            <h5> <?php echo $data['film'][0]['judul'];?></h5>
            <p><?php echo $data['film'][0]['sinopsis'];?></p>
            <p><small><?php echo $data['film'][0]['keterangan'];?></small></p>
        </td>
        </tr>
        </table>
        <table>
        <tr>
            <td><b>Tanggal</b></td>
        <td>
        <input type="date" name="tanggal_nonton" required>
        </td>
        </tr>
        <tr>
       <td> <b>Jadwal</b></td>
       <td>
        <?php $no=1;
        foreach ($data['jadwal'] as $jdw){?>
            <input type="radio" id="<?php echo $no;?>" name="jadwal" value ="<?php echo $jdw['id_jadwal'];?>" required>
            <label for="<?php echo $no;?>"><?php echo $jdw['jadwal'];?></label>
        <?php $no++; } ?>
        </td>
        </tr>
        <tr>
            <td></td>
            <td>
        <button type="submit">Submit</button>
        </td>
        </tr>
        </table>
    </form>  
            </div><!--content-->

</body>
</html>