<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class WelcomeTIKU extends CI_Controller{
    public function index(){
        //ambil data
        $data = $this->mymodel->Get('film');
        $data = array('data' => $data);
        
        //Masukkan data kedalam view 'home'
        $this->load->view('home',$data);
    }

    public function pesan(){
        //terima dari view 'home'
        $id_film = $_POST['id_film'];

        //ambil data film berdasarkan id dari view 'home'
        $data['film'] = $this->mymodel->GetWhere('film',array('id_film' => $id_film));

        //ambil judul
        $judul = $data['film'][0]['judul'];

        //set session dengan data judul dan id
        $this->session->set_userdata('judul',$judul);
        $this->session->set_userdata('id_film',$id_film);

        //ambil data semua jadwal
        $data['jadwal'] = $this->mymodel->Get('jadwal');

        //simpan semua data kedalam variable array 'data' lalu masukkan ke view 'pesan'
        $data = array('data' => $data);
        $this->load->view('pesan', $data);
    }

    public function pesan_kursi(){
        //terima tanggal nonton dari view 'pesan'
        $tanggal_nonton=$_POST['tanggal_nonton'];
        //terima jadwal dari view 'pesan'
        $id_jadwal=$_POST['jadwal'];

        //set session dengan data tanggal nonton dan id jadwal
        $this->session->set_userdata('tanggal_nonton',$tanggal_nonton);
        $this->session->set_userdata('id_jadwal',$id_jadwal);

        //ambil semua data jadwal berdasarkan id jadwal dari view 'pesan'
        $data['jadwal']=$this->mymodel->GetWhere('jadwal', array('id_jadwal'=> $id_jadwal));

        //set session dengan data jadwal 
        $jadwal=$data['jadwal'][0]['jadwal'];
        $this->session->set_userdata('jadwal',$jadwal);

        //ambil semua data data kursi
        $data['kursi']=$this->mymodel->Get('kursi');

        //masukkan ke var id_film dengan session data id_film
        $id_film=$this->session->userdata('id_film');

        //ambil data nokur dari tabel pesanan yang
        //id_film nya = id_film dari halaman sebelumnya dan
        //id_jadwal nya = id_jadwal dari halaman sebelumnya dan
        //tanggal_nonton nya = tanggal_nonton dari halaman sebelumnya
        $query_kursi_booked = $this->db->query('SELECT nokur FROM pesanan where 
        id_film = "'.$id_film.'" and id_jadwal="'.$id_jadwal.'" and tanggal_nonton="'.$tanggal_nonton.'"');

        //masukkan ke var array data['kursi_booked'] dengan data hasil querry line 63
        $data['kursi_booked']=$query_kursi_booked->result_array();

        //simpan semua data kedalam variabel array 'data' lalu masukkan ke view 'pesan_kursi'
        $data = array('data' => $data);
        $this->load->view('pesan_kursi',$data);
    }

    public function pesanan(){
        //jika memilih kursi, maka isi $data['kursi]
        if(!empty($_POST['pilihKursi'])){
            $kursi = $_POST['pilihKursi'];
            $this->session->set_userdata('kursi',$kursi);
            $data['kursi']=$kursi;
        }
        //jika tidak memilih kursi, maka $data['kursi] kosong
        else{
            $data['kursi']=[];
        }
        //simpan semua data kedalam variabel array 'data' lalu memasukkan ke view 'pesanan'
        $data = array('data' => $data);
        $this->load->view('pesanan',$data);
    }

    public function hapusKursi($no){
        //masukkan ke var listkursi dengan session kursi
        $listkursi = $this->session->userdata('kursi');

        //hapus salah satu index dari array dengan spesifik variabel no
        unset($listkursi[$no]);

        //masukkan ke var array data kursi dari variabel array listkursi
        $data['kursi'] = array_values($listkursi);

        //mengurutkan index
        $kursi = $data['kursi'];

        //set session dengan data kursi
        $this->session->set_userdata('kursi',$kursi);

        //simpan semua data kedalam variabel array 'data' lalu masukkan ke view 'pesanan'
        $data = array('data' => $data);
        $this->load->view('pesanan',$data);
    }

    public function edit(){
        //masukkan ke var listkursi dengan session kursi, lalu jadikan array ke variabel kursi
        $listkursi = $this->session->userdata('kursi');
        $kursi = array_values($listkursi);

        //masukkan ke masing masing var dengan sessionnya
        $id_film = $this->session->userdata('id_film');
        $id_jadwal = $this->session->userdata('id_jadwal');
        $tanggal_nonton = $this->session->userdata('tanggal_nonton');

        //ambil semua data film berdasarkan id film dari session id_film
        $data['film'] = $this->mymodel->GetWhere('film',array('id_film' => $id_film));

        //ambil semua data kursi
        $data['kursi'] = $this->mymodel->Get('kursi');

        //ambil data kursi untuk kursi yang sudah dipilih sebelumnya
        $data['kursi_checked'] = $kursi;

        //ambil kursi terbooking dan masukkan ke var array
        $query_kursi_booked = $this->db->query('SELECT nokur FROM pesanan where
        id_film ="'.$id_film.'" and id_jadwal="'.$id_jadwal.'" and tanggal_nonton="'.$tanggal_nonton.'"');
        $data['kursi_booked'] = $query_kursi_booked->result_array();

        //simpan semua data kedalam variabel array 'data' lalu masukkan ke view 'edit'
        $data = array('data' => $data);
        $this->load->view('edit',$data);
    }

    public function bayar(){
        //masukkan ke var listkursi dengan session kursi, lalu jadikan array ke variabel kursi
        $listkursi = $this->session->userdata('kursi');
        $data['kursi'] = array_values($listkursi);

        //hitung isi data kursi
        $jum_kursi = count($data['kursi']);
        $j=0;

        //insert data kursi ke database berdasarkan jumlahnya
        foreach($data['kursi'] as $k){
            $data_insert = array(
                'id_film' => $this->session->userdata('id_film'),
                'tanggal_nonton' => $this->session->userdata('tanggal_nonton'),
                'id_jadwal' => $this->session->userdata('id_jadwal'),
                'nokur' => $k
            );
        }

        //simpan semua data kedalam variabel array 'data' lalu masukkan ke view 'edit'
        $data = array('data' => $data);
        $this->load->view('tiket',$data);
    }
}