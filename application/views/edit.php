<!DOCTYPE html>
<html lang="en">
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
        $this->load->view('header');
    ?>
    <h2 align="center">Edit  Kursi</h2>
    <div class="content">
    <!--Buat Form-->
    <form method="post" action="<?php echo base_url();?>index.php/WelcomeTIKU/pesanan">
        <!--Set judul dari session-->
        <b>Film :</b>
        <?php echo $this->session->userdata("judul");?>
        <br>
        <!-- Tanggal jadwal diconver -->
        <b>Tanggal/Jadwal : </b>
        <?php $tn=$this->session->userdata("tanggal_nonton");
            echo date('l',strtotime($tn)).", ".$tn."/ ".$this->session->userdata("jadwal");?>
        <br>
        <b>Tempat Duduk</b>
        <Table id = "seatsBlock">
            <tr>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
            <tr>
                <?php
                    $k=0;
                    for($i='A';$i<='E';$i++){ ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <!-- Tampilkan kursi terpilih sebelumnya -->
                            <?php for($j=1; $j<=4;$j++){
                                $ij=$data['kursi'][$k]['nokur']?>
                            <td>
                                <input name="pilihKursi[]" type="checkbox" value="<?php echo $ij; ?>"
                                <?php foreach($data['kursi_checked'] as $kursi){
                                    if($ij==$kursi)
                                        echo "checked";
                                }
                                for($x=0; $x<count($data['kursi_booked']);$x++){
                                    if($ij==$data['kursi_booked'][$x]['nokur'])
                                        echo "disabled";
                                }
                                ?>
                                <?php ?>
                                >
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
</div>
</body>
</html>