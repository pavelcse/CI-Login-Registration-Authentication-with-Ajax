<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		if($this->session->userdata('login') == true){
            if($this->session->userdata('role') == 1){
                redirect('dashboard');
        	}elseif ($this->session->userdata('role') == 2) {
        		redirect('read-user');
        	}else{
        		redirect('read-user');
        	} 
    	}else{
		    $this->load->view('welcome_message');
		}
	}

	public function register()
	{
		if($this->session->userdata('login') == true){
            if($this->session->userdata('role') == 1){
                redirect('dashboard');
        	}elseif ($this->session->userdata('role') == 2) {
        		redirect('read-user');
        	}else{
        		redirect('read-user');
        	} 
    	}else{
		    $this->load->view('register');
		}
	}

	public function emailAvailability()
	{
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			echo "<label style='color: red'><span class='glyphicon-glyphicon-remove'></span>Invalid Email</label>";
		}else{
			$this->load->model('user_model');
			if($this->user_model->is_email_Available($_POST['email']))
			{
				echo '<label style="color: red"><span class="glyphicon-glyphicon-remove"></span>Email Already Taken</label>';
			}else{
				echo "<label class='text-success'><span class='glyphicon-glyphicon-ok'></span>Email Available</label>";
			}
		}
	}

	public function userLogin()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$this->load->model('user_model');
		$result = $this->user_model->user_login($email, $password);
		
        if($result){
        	$this->session->set_userdata('login', true);
		    $this->session->set_userdata('name', $result->name);
		    $this->session->set_userdata('id', $result->id);
		    $this->session->set_userdata('role', $result->role);

        	if($result->role == 1){
                redirect('dashboard');
        	}elseif ($result->role == 2) {
        		redirect('read-user');
        	}else{
        		redirect('read-user');
        	} 
        }
        else{
        	//redirect($_SERVER['HTTP_REFERER']);
        	$this->session->set_flashdata('message', 'Email or Password Does Not Match');
        	redirect(base_url());
        }
	}

	public function dashboard()
	{
		$this->load->library('user_agent');
		if ($this->session->userdata('role') == 1) {
			$data = [];
		    $data['admin_home'] = $this->load->view('pages/admin_index', '', true);
		    $this->load->view('dashboard', $data);
		}else{
			redirect($this->agent->referrer());
			// echo '<script language="javascript">';
   //          echo "alert('You Cannot Access This Page.');";
   //          echo '</script>';
            //$this->index();
            //redirect(base_url());
		}
        
	}

	public function saveUser()
	{
		$this->load->model('user_model');
		$result = $this->user_model->saveUserInfo();

		if($result){
			$this->session->set_flashdata('message', 'Successfully Registered, Please Login..');
        	redirect(base_url());
		}else{
			$this->session->set_flashdata('message', 'Something Wrong, Please try again..!!');
        	redirect('register');
		}
	}

	public function editUser()
	{
		if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
            $data = [];
            $this->load->model('user_model');
            $data['user_data'] = $this->user_model->userInfo();
		    $data['admin_home'] = $this->load->view('pages/user_details_edit', $data, true);
		    $this->load->view('dashboard', $data);
    	}
	}

	public function updateUser()
	{
		if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
		    $this->load->model('user_model');
		    $result = $this->user_model->updateUserInfo();
		    if($result){
			    $this->session->set_flashdata('message', 'Successfully Updated..');
        	    redirect('read-user');
		    }else{
			    $this->session->set_flashdata('message', 'Something Wrong, Please try again later..!!');
        	    redirect('read-user');
		    }
		}
	}

	public function deleteUser()
	{
		if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
		    $id = $this->input->get('id');
		    $this->load->model('user_model');
		    $result = $this->user_model->deleteUser($id);

		    if ($result) {
			    $this->session->set_flashdata('message', 'User successfully deleted..!!');
        	    redirect($_SERVER['HTTP_REFERER']);
		    }
		}
	}

	public function readUser()
	{
		if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
		    $data = [];
            $this->load->model('user_model');
            $data['user_data'] = $this->user_model->userInfo();
		    $data['admin_home'] = $this->load->view('pages/user_details', $data, true);
		    $this->load->view('dashboard', $data);
		}
	}

	public function owner_list()
	{
		if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
            $data = [];
            $this->load->model('user_model');
            $data['user_data'] = $this->user_model->ownerList();
		    $data['admin_home'] = $this->load->view('pages/admin_owner', $data, true);
		    $this->load->view('dashboard', $data);
		}
	}

    public function user_list()
    {
    	if($this->session->userdata('login') != true){
            redirect(base_url());
    	}else{
            $data = [];
            $this->load->model('user_model');
            $data['user_data'] = $this->user_model->userList();
		    $data['admin_home'] = $this->load->view('pages/admin_user', $data, true);
		    $this->load->view('dashboard', $data);
	    }
    }

    public function logout(){
    	$this->session->sess_destroy();
    	// echo '<script language="javascript">';
     //    echo "alert('Successfully Logout.');";
     //    echo '</script>';
    	//$this->session->set_flashdata('message', 'Successfully Logout.');
    	redirect(base_url());
    }
}
