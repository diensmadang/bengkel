<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('MyModel');
        $this->load->helper('currency_format_helper');
    }
	
	function index(){
        $data=array(
            'title'=>'Transaksi',
            'active_penjualan'=>'active',
            'data_penjualan'=>$this->MyModel->getAllDataPenjualan(),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_penjualan');
        $this->load->view('element/footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

	//Ambil data
    function pages_tambah_penjualan(){
        $data=array(
            'title'=>'Tambah Transaksi',
            'active_penjualan'=>'active',
            'kd_transaksi'=>$this->MyModel->getKodePenjualan(),
            'data_barang'=>$this->MyModel->getBarangJual(),
            'data_pelanggan'=>$this->MyModel->getAllData('pelanggan'),
            'data_layanan'=>$this->MyModel->getAllData('servis'),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_add_penjualan');
        $this->load->view('element/footer');
    }
	
	//Tampilkan sparepart efek ajax
	function get_detail_barang(){
        $id['kd_part']=$this->input->post('kd_part');
        $data=array(
            'detail_barang'=>$this->MyModel->getSelectedData('sparepart',$id)->result(),
        );
        $this->load->view('pages/ajax_detail_barang',$data);
    }
	
	//Tampilkan pelanggan efek ajax
    function get_detail_pelanggan(){
        $id['kd_pelanggan']=$this->input->post('kd_pelanggan');
        $data=array(
            'detail_pelanggan'=>$this->MyModel->getSelectedData('pelanggan',$id)->result(),
        );
        $this->load->view('pages/ajax_detail_pelanggan',$data);
    }
	
	//Tampilkan layanan efek ajax
    function get_detail_layanan(){
        $id['id_servis']=$this->input->post('id_servis');
        $data=array(
            'detail_layanan'=>$this->MyModel->getSelectedData('servis',$id)->result(),
        );
        $this->load->view('pages/ajax_detail_servis',$data);
    }
	
	//Hapus sparepart dalam session
    function hapus_barang(){
        $id= $this->uri->segment(3);
        $bc=$this->MyModel->getSelectedData("transaksi_header",$id);
        foreach($bc->result() as $dph){
            $sess_data['kd_transaksi'] = $dph->kd_transaksi;
            $this->session->set_userdata($sess_data);
        }

        $kode = explode("/",$_GET['kode']);
        if($kode[0]=="tambah"){
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
        }
        else if($kode[0]=="edit"){
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
            $hps['kd_transaksi'] = $kode[2];
            $hps['kd_part'] = $kode[3];
            $this->MyModel->deleteData("transaksi_detail",$hps);

            $key_barang['kd_part'] = $hps['kd_part'];
            $d_u['stok'] = $kode[4]+$kode[5];
            $this->MyModel->updateData("sparepart",$d_u,$key_barang);
        }
        redirect('penjualan/'.$this->session->userdata('kd_transaksi'));
    }
	
	//Masukkan data sparepart ke dalam session library cart
	function tambah_penjualan_to_cart(){
        $data = array(
            'id'    => $this->input->post('kd_part'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nm_part'),
        );
        $this->cart->insert($data);
        redirect('penjualan/pages_tambah_penjualan');
    }
	
	//Masukan data dari session ke database
    function simpan_penjualan(){
        $data = array(
            'kd_transaksi'=>$this->input->post('kd_transaksi'),
            'kd_pelanggan'=>$this->input->post('kd_pelanggan'),
            'id_servis'=>$this->input->post('id_servis'),
            'biaya_part'=>$this->input->post('biaya_part'),
            'tanggal_penjualan'=>date("Y-m-d",strtotime($this->input->post('tanggal_penjualan'))),
            'kd_user'=>$this->session->userdata('ID'),
        );
        $this->MyModel->insertData("transaksi_header",$data);
        foreach($this->cart->contents() as $items){
            $kd_part = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'kd_transaksi' => $this->input->post('kd_transaksi'),
                'kd_part'=> $kd_part,
                'qty'=>$qty,
            );
            $this->MyModel->insertData("transaksi_detail",$data_detail);
            $update['stok'] = $this->MyModel->getKurangStok($kd_part,$qty);
            $key['kd_part'] = $kd_part;
            $this->MyModel->updateData("sparepart",$update,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('penjualan');
    }
	
	//Lihat detail transaksi
	function detail_penjualan(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Transaksi',
            'active_penjualan'=>'active',
            'dt_penjualan'=>$this->MyModel->getDataPenjualan($id),
            'barang_jual'=>$this->MyModel->getBarangPenjualan($id),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_detail_penjualan');
        $this->load->view('element/footer');
    }
	
	//Hapus transaksi dan kembalikan stok
    function hapus(){
        $hapus['kd_transaksi'] = $this->uri->segment(3);
        $q = $this->MyModel->getSelectedData("transaksi_detail",$hapus);
        foreach($q->result() as $d){
            $d_u['stok'] = $this->MyModel->getTambahStok($d->kd_part,$d->qty);
            $key['kd_part'] = $d->kd_part;
            $this->MyModel->updateData("sparepart",$d_u,$key);
        }
        $this->MyModel->deleteData("transaksi_header",$hapus);
        $this->MyModel->deleteData("transaksi_detail",$hapus);
        redirect('penjualan');
    }

}