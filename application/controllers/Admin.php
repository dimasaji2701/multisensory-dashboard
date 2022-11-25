<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    
    public function index()
    {   
        //Judul halaman
        $data['title']='Dashboard';
        //select * from user where email = email yg disimpan pada session
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

        //tampilkan halaman dashboard
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/footbar',$data);
    }

    public function changePassword()
    {
        //Judul halaman
        $data['title'] = 'Change Password';
        //select * from user where email = $this->session->userdata(email)
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

        //buat rules pada form di halaman login
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New password', 'required|min_length[4]|matches[new_password1]');

        //jika validasi rules tidak lolos maka akan tetap berada di halaman changepassword
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/footbar');
        } 
        else {
            //ambil inputan user pada view dan simpan ke dalam variabel $current_password dan $new_password
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            //Jika current password tidak sesuai dengan yg tersimpan pada database 
            if (!password_verify($current_password, $data['user']['password'])) {
                //buat flashdata dengan nama  'message' yang berisikan pesan Password Salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah</div>');
                //redirect ke halaman changepassword
                redirect('admin/changepassword');
            } else {
                //jika current password = password baru
                if ($current_password == $new_password) {
                    //buat flashdata yang berisikan pesan Password lama dan baru tidak boleh sama
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama dan baru tidak boleh sama</div>');
                    //redirect ke halaman changepassword
                    redirect('admin/changepassword');
                } 
                
                else {
                    /*lakukan hashing pada new password untuk diubah menjadi kode acak dan simpan kedalam variabel
                    $password_hash*/
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    //update password baru ke tabel user dari user yang melakukan changepassword
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    //buat flashdata yang berisikan pesan Password Berhasil dirubah
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password Berhasil dirubah</div>');
                    //redirect ke halaman changepassword
                    redirect('admin/changepassword');
                }
            }
        }
    }

    public function cekwaterlevel()
    {
        //panggil function getDataSensor dari model M_Monitoring dan buat kedalam variabel $recordSensor
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor'=> $recordSensor);

        //kirim ke tampilan cekwaterlevel
        $this->load->view('cekwaterlevel',$data);
    }

    public function cekwaterflow()
    {
        //panggil function getDataSensor dari model M_Monitoring dan buat kedalam variabel $recordSensor
        $recordSensor = $this->M_Monitoring->getDataSensor();

        //buat variabel $data yg berisi variabel array dengan nama data_sensor yang berisi data dari $recordSensor
        $data = array('data_sensor'=> $recordSensor);

        //load file cekwaterflow.php dari folder view dimana isinya adalah isi dari variabel $data
        $this->load->view('cekwaterflow',$data);
    }

    public function cekturbidity()
    {
        //panggil function getDataSensor
        $recordKekeruhan = $this->M_Monitoring->getDataTurbidity();
        $data = array('data_sensor'=> $recordKekeruhan);

        //kirim ke tampilan cekwaterlevel
        $this->load->view('cekturbidity',$data);
    }

    public function kirimdata()
    {   
        //192.168.43.129/admin/kirimdata/waterlevel/waterflow
        //segmen 0 = 192.168.43.129 = ip server
        //segmen 1 = controller admin
        //segmen 2 = function kirimdata
        //segmen 3 = data sensor waterlevel
        //segmen 4 = data sensor waterflow

        //baca nilai waterlevel dan waterflow yang masing2 pada segmen 3 dan 4
        $waterlevel = $this->uri->segment(3);
        $waterflow = $this->uri->segment(4);
        

        //buat variabel array waterlevel dan waterflow yang menampung isi dari variabel $waterlevel dan $waterflow
        $DataUpdate = [
            //'nama_field => nama_variabel'
            'waterlevel' => $waterlevel,
            'waterflow' => $waterflow
            
        ];
		
        //insert data ke tabel tb_sensor1 dengan memanggil function dari Model M_Monitoring 
        $this->M_Monitoring->UpdateData($DataUpdate);
    }

    public function kirimdataturbidity()
    {   
        //192.168.43.129/admin/kirimdataturbidity/turbidity
         //segmen 0 = 192.168.43.129 = ip server
        //segmen 1 = controller admin
        //segmen 2 = function kirimdataturbidity
        //segmen 3 = data sensor turbidity
        
        //baca nilai turbidity pada segment 3 di URL
        
        $turbidity = $this->uri->segment(3);

		//buat variabel turbidity untuk menampung isi dari variabel $turbidity
        $DataUpdateKekeruhan = [
            //'nama_field => nama_variabel'
            'turbidity' => $turbidity
        ];
        
        //insert data ke tabel kekeruhan dengan memanggil function dari Model M_Monitoring
        $this->M_Monitoring->UpdateDataKekeruhan($DataUpdateKekeruhan);
    }

    
    public function chart_wl(){ 
        
        $this->load->view('chart_waterlevel');
       
	}

    public function chart_wf(){
		$this->load->view('chart_waterflow');
	}

    public function chart_turbidity(){
		$this->load->view('chart_turbidity');
	}

    public function chart_datasensor() {
        $datasensor = $this->chart_model->chart_sensor();
        echo json_encode($datasensor);
    }
    public function chart_datakekeruhan(){
		$datakekeruhan = $this->chart_model->chart_kekeruhan();
		echo json_encode($datakekeruhan);
	}

}


   
