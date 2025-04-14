<?php
    $this->load->view('header');
?>
    
    <h2 align="center">Pesan Kursi</h2>
    <!--Buat Form-->
    <form method="post" action="<?php echo base_url();?>index.php/WelcomeTIKU/pesanan">
        <!--Set judul dari session-->
        <b>Film : </b>
        <?php echo $this->session->userdata("judul");?>
        <br>
        <!-- Tanggal jadwal diconver -->
        <b>Tanggal/Jadwal : </b>
        <?php $tn=$this->session->userdata("tanggal_nonton");
            echo date('l',strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal");?>
        <br>
        <b>Tempat Duduk : </b>
        <Table id ="seatBlock">
            <tr>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
            <tr>
                <!-- Menampilkan kursi untuk diinput -->
                <?php
                    $k=0;
                    for($i='A';$i<='E';$i++){ ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <?php for($j=1; $j<=4;$j++){
                                $ij=$data['kursi'][$k]['nokur']?>
                            <td>
                                <!-- selain menampilkan inpu, menampilkan yang
                                dibooking dengan data dari controller -->
                                <input name="pilihKursi[]" type="checkbox" value="<?php echo $ij; ?>"
                                <?php
                                    for($x=0; $x<count($data['kursi_booked']);$x++){
                                        if($ij==$data['kursi_booked'][$x]['nokur'])
                                            echo "disabled";
                                    }
                                ?>>
                            </td>
                            <?php $k++;} ?>
                        </tr>                  
                    <?php } ?>
            </tr>
        </table>
<br>
Harga Rp 60.000,00/tiket
<br><br>
<button type ="submit">Submit</button>
</form>
</div> <!--content-->

</html>