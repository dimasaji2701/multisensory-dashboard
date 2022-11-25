
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Model ini dibuat untuk menampilkan data terbaru pada card information di dashboard
class M_Monitoring extends CI_Model
{
    //Pilih semua data yang terdapat pada tabel tb_sensor1
    public function getDataSensor()
    {   
        //select * from multisensor order by id desc;
        $this->db->select('*');
        $this->db->from('tb_sensor1');
        $this->db->order_by('id','desc');

        //kembalikan hasil nya dalam bentuk row untuk mengambil baris data terbaru 
        $query = $this->db->get();
        return $query->row();
        
    }
    
    //Pilih semua data yang terdapat pada tabel tb_sensor2
    public function getDataTurbidity()
    {
        //select * from kekeruhan order by id desc;
        $this->db->select('*');
        $this->db->from('tb_sensor2');
        $this->db->order_by('id','desc');

        //kembalikan hasil nya dalam bentuk row untuk mengambil baris data terbaru
        $query = $this->db->get();
        return $query->row();
    }

    //lakukan insert data pada tabel tb_sensor1
    public function UpdateData($DataUpdate)
    {
        $this->db->insert('tb_sensor1',$DataUpdate);
    }

    //lakukan insert data pada tabel tb_sensor2
    public function UpdateDataKekeruhan($DataUpdateKekeruhan)
    {
        $this->db->insert('tb_sensor2',$DataUpdateKekeruhan);
    }
    
}
?>