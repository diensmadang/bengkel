<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function login($username, $password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllData($table){
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data){
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key){
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data){
        $this->db->delete($table,$data);
    }

    function insertData($table,$data){
        $this->db->insert($table,$data);
    }
	
	//Kode Barang/Part
    function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(kd_part,3)) as kd_max from sparepart");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "P-".$kd;
    }
	
	//Kode Pelanggan
    public function getKodePelanggan(){		
        $q = $this->db->query("select MAX(RIGHT(kd_pelanggan,3)) as kd_max from pelanggan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "P-".$kd;
    }

    //Kode Pemasok
    public function getKodePemasok(){     
        $q = $this->db->query("select MAX(RIGHT(kd_pemasok,3)) as kd_max from pemasok");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "S-".$kd;
    }

	//Kode Kendaraan
    public function getKodeKendaraan(){     
        $q = $this->db->query("select MAX(RIGHT(kd_kendaraan,3)) as kd_max from kendaraan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "K-".$kd;
    }

	//Kode User
    public function getKodePengguna(){
        $q = $this->db->query("select MAX(RIGHT(kd_user,3)) as kd_max from user");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "K-".$kd;
    }
	
	//Kode Penjualan
    public function getKodePenjualan(){
        $q = $this->db->query("select MAX(RIGHT(kd_transaksi,3)) as kd_max from transaksi_header");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else{
            $kd = "001";
        }
        return "T-".$kd;
    }
	
	//Tampilkan sparepart dengan stok > 0
	function getBarangJual(){
		$this->db->from('sparepart');
		$this->db->where('stok >','0');
		return $this->db->get()->result();
    //  return $this->db->query ("SELECT * from sparepart where stok > 0")->result();
    }
	
	//Kurangi stok sesuai dengan yang di input pada transaksi
	public function getKurangStok($kd_part,$kurangi){
        $q = $this->db->query("select stok from sparepart where kd_part='".$kd_part."'");
        $stok = "";
        foreach($q->result() as $d){
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }
	
	//Tampilkan semua data transaksi
	function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.kd_transaksi, a.tanggal_penjualan, a.biaya_part, a.id_servis,
			    (select count(kd_transaksi) as jum from transaksi_detail where kd_transaksi=a.kd_transaksi) 
				as jumlah
			    from transaksi_header a
			    ORDER BY a.kd_transaksi DESC")->result();
    }
	
	//Tampilkan detail transaksi
    function getDataPenjualan($id){		
		$this->db->from('transaksi_header');
		$this->db->join('pelanggan','transaksi_header.kd_pelanggan=pelanggan.kd_pelanggan');
		$this->db->join('user','transaksi_header.kd_user=user.kd_user');
		$this->db->join('servis','transaksi_header.id_servis=servis.id_servis');
		$this->db->where('transaksi_header.kd_transaksi',$id);
		return $this->db->get()->result();
		
    //    return $this->db->query("SELECT * from transaksi_header a
    //            left join pelanggan b on a.kd_pelanggan=b.kd_pelanggan
    //            left join user c on a.kd_user=c.kd_user
    //            left join servis d on a.id_servis=d.id_servis
    //            where a.kd_transaksi = '$id'")->result();
    }
	
	function getBarangPenjualan($id){
        return $this->db->query("
                select a.kd_part,a.qty,b.nm_part,b.harga
                from transaksi_detail a
                left join sparepart b on a.kd_part=b.kd_part
                where a.kd_transaksi = '$id'")->result();
    }
	
	//Mengembalikan stok sparepart
	public function getTambahStok($kd_part,$tambah){
        $q = $this->db->query("select stok from sparepart where kd_part='".$kd_part."'");
        $stok = "";
        foreach($q->result() as $d){
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }

}