<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacultyController extends CI_Controller {
	public function facultyLogin()
	{
		/*
		Faculty login
		*/
		if($this->isFacultySession())
		{
			redirect('faculty/dashboard');
		}
		else
		{
			if($this->input->post())
			{
				$credentials['email']=$this->input->post('email');
				$credentials['password']=$this->input->post('password');
				$this->load->model('FacultyModel');
				$data['result']=$this->FacultyModel->isFacultyExist($credentials);
				if(empty($data['result']))
				{
					$data['message'] = "Sorry, failed to login";
					$this->load->view('facultyView/login', $data);
				}
				else
				{
					$credentials1['id']=$data['result']['id'];
					$credentials1['name']=$data['result']['name'];
					$credentials1['email']=$data['result']['email'];
					$credentials1['type']=$data['result']['type'];
					$result=$this->registerSession($credentials1);
					$data['message']="Login Successfull";
					redirect('faculty/dashboard');

				}
			}
			else
			{
				$this->load->view('facultyView/login');
			}
		}
	}
	public function facultyDashboard()
	{
		if($this->isFacultySession())
		{
			$credentials['user']=$this->getFacultyDetails();
			$this->load->model('AdminModel');
			$credentials['facultyTimetableList']=$this->AdminModel->getFacultyTimetable($credentials['user']['id']);
			$this->load->view('facultyView/dashboard', $credentials);

		}
		else
		{
			redirect('faculty/login');
		}
	}
	public function registerSession($credentials)
	{
		$this->session->set_userdata($credentials);
		return True;
	}

	public function isFacultySession()
	{
		if($this->session->userdata('email') && $this->session->userdata('type')=='faculty' && $this->session->userdata('id'))
		{
			$credentials['email']=$this->session->userdata('email');
			$credentials['name']=$this->session->userdata('name');
			$credentials['id']=$this->session->userdata('id');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
	public function getFacultyDetails()
	{
		$credentials['email']=$this->session->userdata('email');
		$credentials['name']=$this->session->userdata('name');
		$credentials['id']=$this->session->userdata('id');
		return $credentials;
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('type');
		redirect('faculty/login');
	}
}
?>