<?php
//Model ini dibuat untuk menampilkan grafik dari tabel multisensor dan kekeruhan pada dashboard
class Chart_model extends CI_Model{

    //ambil seluruh data dari tabel tb_sensor1
    public function chart_sensor() {
        return $this->db->get('tb_sensor1')->result();
    }
    //ambil seluruh data datri tabel tb_sensor2
    public function chart_kekeruhan(){
        return $this->db->get('tb_sensor2')->result();
    }
    
}
