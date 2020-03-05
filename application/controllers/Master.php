<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Anda tidak diperkenankan masuk ke halaman ini !');
            redirect('');
        };

        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'kd_part'=>$this->MyModel->getKodeBarang(),
            'kd_pelanggan'=>$this->MyModel->getKodePelanggan(),
            'kd_pemasok'=>$this->MyModel->getKodePemasok(),
            'kd_user'=>$this->MyModel->getKodePengguna(),
	        'kd_kendaraan'=>$this->MyModel->getKodeKendaraan(),
    		'data_service'=>$this->MyModel->getAllData('servis'),
            'data_barang'=>$this->MyModel->getAllData('sparepart'),
            'data_pelanggan'=>$this->MyModel->getAllData('pelanggan'),
            'data_contact'=>$this->MyModel->getAllData('contact'),
            'data_pegawai'=>$this->MyModel->getAllData('user'),
            'data_pemasok'=>$this->MyModel->getAllData('pemasok'),
            'data_kendaraan'=>$this->MyModel->getAllData('kendaraan'),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_master');
        $this->load->view('element/footer');
    }

//Method Insert
	function tambah_service(){
        $data=array(
            'nm_layanan'=>$this->input->post('nm_layanan'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->insertData('servis',$data);
        redirect("master");
    }
    function tambah_barang(){
        $data=array(
            'kd_part'=>$this->input->post('kd_part'),
            'nm_part'=>$this->input->post('nm_part'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->insertData('sparepart',$data);
        redirect("master");
    }
    function tambah_pelanggan(){
        $data=array(
            'kd_pelanggan'=> $this->input->post('kd_pelanggan'),
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->insertData('pelanggan',$data);
        redirect("master");
    }

    function tambah_pemasok(){
        $data=array(
            'kd_pemasok'=> $this->input->post('kd_pemasok'),
            'nm_pemasok'=>$this->input->post('nm_pemasok'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->insertData('pemasok',$data);
        redirect("master");
    }
     function tambah_kendaraan(){
        $data=array(
            'kd_kendaraan'=> $this->input->post('kd_kendaraan'),
            'no_plat'=>$this->input->post('no_plat'),
            'merk'=>$this->input->post('merk'),
            'tipe'=>$this->input->post('tipe'),
            'tahun'=>$this->input->post('tahun'),
        );
        $this->MyModel->insertData('kendaraan',$data);
        redirect("master");
    }
    function tambah_user(){
        $data=array(
            'kd_user'=> $this->input->post('kd_user'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->MyModel->insertData('user',$data);
        redirect("master");
    }

//Method Edit
	function edit_service(){
        $id['id_servis'] = $this->input->post('id_servis');
        $data=array(
            'nm_layanan'=>$this->input->post('nm_layanan'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->updateData('servis',$data,$id);
        redirect("master");
    }
    function edit_barang(){
        $id['kd_part'] = $this->input->post('kd_part');
        $data=array(
            'nm_part'=>$this->input->post('nm_part'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->MyModel->updateData('sparepart',$data,$id);
        redirect("master");
    }
    function edit_pelanggan(){
        $id['kd_pelanggan'] = $this->input->post('kd_pelanggan');
        $data=array(
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->updateData('pelanggan',$data,$id);
        redirect("master");
    }

    function edit_pemasok(){
        $id['kd_pemasok'] = $this->input->post('kd_pemasok');
        $data=array(
            'nm_pemasok'=>$this->input->post('nm_pemasok'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
            'telp'=>$this->input->post('telp'),
        );
        $this->MyModel->updateData('pemasok',$data,$id);
        redirect("master");
    }
    function edit_kendaraan(){
        $id['kd_kendaraan'] = $this->input->post('kd_kendaraan');
        $data=array(
            'no_plat'=>$this->input->post('no_plat'),
            'merk'=>$this->input->post('merk'),
            'tipe'=>$this->input->post('tipe'),
            'tahun'=>$this->input->post('tahun'),
        );
        $this->MyModel->updateData('kendaraan',$data,$id);
        redirect("master");
    }

    function edit_contact(){
        $id['id'] = 1;
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'desc'=>$this->input->post('desc'),
        );
        $this->MyModel->updateData('contact',$data,$id);
        redirect("master");
    }
    function edit_user(){
        $id['kd_user'] = $this->input->post('kd_user');
        $data=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->MyModel->updateData('user',$data,$id);
        redirect("master");
    }

//Method Delete
	function hapus_service(){
        $id['id_servis'] = $this->uri->segment(3);
        $this->MyModel->deleteData('servis',$id);
        redirect("master");
    }
    function hapus_barang(){
        $id['kd_part'] = $this->uri->segment(3);
        $this->MyModel->deleteData('sparepart',$id);
        redirect("master");
    }
    function hapus_pelanggan(){
        $id['kd_pelanggan'] = $this->uri->segment(3);
        $this->MyModel->deleteData('pelanggan',$id);
        redirect("master");
    }
    function hapus_pemasok(){
        $id['kd_pemasok'] = $this->uri->segment(3);
        $this->MyModel->deleteData('pemasok',$id);
        redirect("master");
    }
    function hapus_kendaraan(){
        $id['kd_kendaraan'] = $this->uri->segment(3);
        $this->MyModel->deleteData('kendaraan',$id);
        redirect("master");
    }
    function hapus_user(){
        $id['kd_user'] = $this->uri->segment(3);
        $this->MyModel->deleteData('user',$id);
        redirect("master");
    }
}