<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	public function user_login($email, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function saveUserInfo()
	{
		$data = [];
		$data['name'] = $this->input->post('name', true);
		$data['email'] = $this->input->post('email', true);
		$data['password'] = md5($this->input->post('password', true));
		$data['address'] = $this->input->post('address', true);
		$data['country'] = $this->input->post('country', true);
		$data['role'] = $this->input->post('type', true);
		$data['shop_name'] = $this->input->post('shop_name', true);
		$data['shop_address'] = $this->input->post('shop_address', true);
        
        if(!empty($data['email'])){
        	$this->db->select('*');
		    $this->db->from('users');
		    $this->db->where('email', $data['email']);
		    $query = $this->db->get();
		    $result = $query->row();

            if($query->row() != null){
               return false;
            }else{
                $result = $this->db->insert('users', $data);
		        return true;
            }
        }
	}

	public function updateUserInfo()
	{
		$id = $this->session->userdata('id');

		$data = [];
		$data['name'] = $this->input->post('name', true);
		$data['email'] = $this->input->post('email', true);
		$data['password'] = md5($this->input->post('password', true));
		$data['address'] = $this->input->post('address', true);
		$data['country'] = $this->input->post('country', true);
		$data['shop_name'] = $this->input->post('shop_name', true);
		$data['shop_address'] = $this->input->post('shop_address', true);

		$this->db->where('id', $id);
        $result = $this->db->update('users', $data);
		return $result;
	}

	public function userInfo()
	{
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function ownerList()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 2);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function userList()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 0);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function deleteUser($id)
	{
        $this->db->where('id', $id);
        $result = $this->db->delete('users'); 
        return $result;
	}

	public function is_email_Available($email)
	{
        $this->db->where('email', $email);
        $this->db->from('users');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
        	return true;
        }else{
        	return false;
        }
	}

}
