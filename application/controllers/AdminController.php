<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function adminLogin()
	{
		/*
		Admin login
		*/
		if($this->isAdminSession())
		{
			redirect('admin/dashboard');
		}
		else
		{
			if($this->input->post())
			{
				$credentials['email']=$this->input->post('email');
				$credentials['password']=$this->input->post('password');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->isAdminExist($credentials);
				if(empty($data['result']))
				{
					$data['message'] = "Sorry, failed to login";
					$this->load->view('adminView/login', $data);
				}
				else
				{
					$credentials1['id']=$data['result']['id'];
					$credentials1['name']=$data['result']['name'];
					$credentials1['email']=$data['result']['email'];
					$credentials1['type']=$data['result']['type'];
					$result=$this->registerSession($credentials1);
					$data['message']="Login Successfull";
					redirect('admin/dashboard');

				}
			}
			else
			{
				$this->load->view('adminView/login');
			}
		}
	}
	public function adminDashboard()
	{
		if($this->isAdminSession())
		{
			$credentials=$this->getAdminDetails();
			$this->load->view('adminView/dashboard', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function registerSession($credentials)
	{
		$this->session->set_userdata($credentials);
		return True;
	}

	public function isAdminSession()
	{
		if($this->session->userdata('email') && $this->session->userdata('type')=='admin' && $this->session->userdata('id'))
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
	public function getAdminDetails()
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
		redirect('admin/login');
	}
	public function adminFaculty()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['facultyList']=$this->AdminModel->getFacultyList();
			$this->load->view('adminView/viewfacult', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addFaculty()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['faculty_name']=$this->input->post('faculty_name');
				$credentials['type']="faculty";
				$credentials['faculty_code']=$this->input->post('faculty_code');
				$credentials['work_type']=$this->input->post('work_type');
				$credentials['department']=$this->input->post('department');
				$credentials['email']=$this->input->post('email');
				$credentials['password']=$this->input->post('password');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addFaculty($credentials);
				redirect('admin/faculty');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['departmentList']=$this->AdminModel->getDepartmentList();
				$this->load->view('adminView/addfaculty', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function adminTimetable()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['timetableList']=$this->AdminModel->getTimetableList();
			$this->load->view('adminView/viewtimetable', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function viewTimetable()
	{
		if($this->isAdminSession())
		{
			$faculty_id=$this->uri->segment(2);
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['facultyTimetableList']=$this->AdminModel->getFacultyTimetable($faculty_id);
			$this->load->view('adminView/viewFacultyTimetable', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addTimetable()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['faculty']=$this->input->post('faculty');
				$credentials['day']=$this->input->post('day');
				$credentials['department']=$this->input->post('department');
				$credentials['semester']=$this->input->post('semester');
				$credentials['time_stamp']=$this->input->post('time_stamp');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addTimetable($credentials);
				redirect('admin/timetable');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['departmentList']=$this->AdminModel->getDepartmentList();
				$credentials['facultyList']=$this->AdminModel->getFacultyList();
				$credentials['semesterList']=$this->AdminModel->getSemesterList();
				$credentials['dayList']=$this->AdminModel->getDayList();
				$this->load->view('adminView/addtimetable', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function adminDepartment()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['departmentList']=$this->AdminModel->getDepartmentList();
			$this->load->view('adminView/viewdept', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addDepartment()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['department_name']=$this->input->post('department_name');
				$credentials['no_of_division']=$this->input->post('no_of_division');
				$credentials['department_code']=$this->input->post('department_code');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addDepartment($credentials);
				redirect('admin/department');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['departmentList']=$this->AdminModel->getDepartmentList();
				$this->load->view('adminView/adddept', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function adminSemester()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['semesterList']=$this->AdminModel->getSemesterList();
			$this->load->view('adminView/viewsem', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addSemester()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['semester_name']=$this->input->post('semester_name');
				$credentials['semester_type']=$this->input->post('semester_type');
				$credentials['semester_code']=$this->input->post('semester_code');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addSemester($credentials);
				redirect('admin/semester');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['semesterList']=$this->AdminModel->getSemesterList();
				$this->load->view('adminView/addsem', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function adminSubject()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['subjectList']=$this->AdminModel->getSubjectList();
			$this->load->view('adminView/viewsub', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addSubject()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['subject_name']=$this->input->post('subject_name');
				$credentials['subject_type']=$this->input->post('subject_type');
				$credentials['subject_code']=$this->input->post('subject_code');
				$credentials['lecture_count']=$this->input->post('lecture_count');
				$credentials['tutorial_count']=$this->input->post('tutorial_count');
				$credentials['practical_count']=$this->input->post('practical_count');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addSubject($credentials);
				redirect('admin/subject');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['subjectList']=$this->AdminModel->getSubjectList();
				$this->load->view('adminView/addsub', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function adminCourse()
	{
		if($this->isAdminSession())
		{
			$credentials['user']=$this->getAdminDetails();
			$this->load->model('AdminModel');
			$credentials['courseList']=$this->AdminModel->getCourseList();
			$this->load->view('adminView/viewcourse', $credentials);

		}
		else
		{
			redirect('admin/login');
		}
	}
	public function addCourse()
	{
		if($this->isAdminSession())
		{
			if($this->input->post())
			{
				$credentials['course_name']=$this->input->post('course_name');
				$credentials['course_type']=$this->input->post('course_type');
				$credentials['course_code']=$this->input->post('course_code');
				$credentials['semester']=$this->input->post('semester');
				$credentials['date_created']=date('Y-m-d H:i:s');
				$this->load->model('AdminModel');
				$data['result']=$this->AdminModel->addCourse($credentials);
				redirect('admin/course');
			}
			else
			{
				$credentials['user']=$this->getAdminDetails();
				$this->load->model('AdminModel');
				$credentials['semesterList']=$this->AdminModel->getSemesterList();
				$this->load->view('adminView/addcourse', $credentials);
			}
			
		}
		else
		{
			redirect('admin/login');
		}
	}
}