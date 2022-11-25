<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function index()
    {
		//membuat rules pada field email dan password pada halaman login
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password1','Password','required');

		//jika validasi rules gagal maka akan tetap berada di halaman login
		if($this->form_validation->run() == false ){
			$data['title'] = 'Login Page';
    		$this->load->view('templates/auth_header',$data);
        	$this->load->view('auth/login');
        	$this->load->view('templates/auth_footer');
		}else{
			//jika validasinya sukses panggil function login()
			$this->login();
		}
    	
    }
	public function login()
	{
		//mengambil inputan user pada view dan disimpan kedalam variabel
		$email = $this->input->post('email');
		$password = $this->input->post('password1');

		//select * from user where email = $email; hasilnya simpan kedalam variabel $user
		$user = $this->db->get_where('user',['email'=>$email])->row_array();
		
		//jika usernya ada pada database
		if($user){
			/*password_verify digunakan untuk membandingkan password inputan dengan password yg telah
			di hash pada database*/
			//Jika password yang diinput sesuai dengan yang tersimpan pada database
				if(password_verify($password, $user['password'])){
					//ambil data email dari tabel user kemudian simpan kedalam variabel $data
					$data = [
						'email' => $user['email'], 
					];
					//simpan isi dari variabel $data kedalam session sebagai informasi login
					$this->session->set_userdata($data);
					//teruskan ke landing page dashboard
					redirect('admin');
					

				/*Jika password yang diinput tidak sesuai dengan yang tersimpan pada database akan menampilkan
				pesan error dan tetap berada di halaman login*/  	
				} else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Wrong Password!</div>');
					redirect('auth');
				}
			}
		//Jika email tidak terdaftar akan menampilkan pesan error dan akan tetap berada di halaman login
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Email is not registered!</div>');
			redirect('auth');
		}
	}

    public function registration()
    {	
		//membuat rules pada masing-masing field di halaman registrasi
		$this ->form_validation->set_rules('name','Name','required');
		$this ->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this ->form_validation->set_rules('password1','Password','required|min_length[3]|matches[password2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this ->form_validation->set_rules('password2','Name','required|matches[password1]');
		
		//jika validasi rules gagal maka akan tetap berada di halaman registrasi
    	if ( $this->form_validation->run() == false) {
	    	$data['title'] = 'Registration'; 
	    	$this->load->view('templates/auth_header',$data);
	    	$this->load->view('auth/registration');
	    	$this->load->view('templates/auth_footer');

    	}
		else {
			/*jika validasi rules berhasil maka ambil data inputan user dari view dan simpan kedalam
			variabel $data*/ 
    		$data = [
				'name' => $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			];

			//insert data user ke tabel user
			$this->db->insert('user',$data);
			
			//buat flashdata yang berisikan pesan Congratulation! your account has been created. Please Login!
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please Login!
		  </div>');
			//teruskan ke halaman login
			redirect('auth');
    	}
    }

	public function logout()
	{
		// menghapus data email dari session
		$this->session->unset_userdata('email');
		
		//buat flashdata yang bersikan pesan You have been logged out!
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			You have been logged out!</div>');
			redirect('auth');

	}
}
