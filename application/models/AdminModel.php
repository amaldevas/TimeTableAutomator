<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function isAdminExist($credentials)
	{
		$this->db->select('id,
							name,
							email
						');
		$this->db->where('email' , $credentials['email']);
		$this->db->where('password' , $credentials['password']);
		$query=$this->db->get('admin');
		if($query->num_rows()==1)
		{
			foreach ($query->result() as $row)
			{
    			$credentials2['id']=$row->id;
    			$credentials2['name']=$row->name;
    			$credentials2['email']=$row->email;
    			$credentials2['type']="admin";
			}
			return $credentials2;
		}
		else
		{
			return NULL;
		}
	}
	public function addFaculty($credentials)
	{
		if($this->db->insert('faculty',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function addSemester($credentials)
	{
		if($this->db->insert('semester',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function addSubject($credentials)
	{
		if($this->db->insert('subject',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function addDepartment($credentials)
	{
		if($this->db->insert('department',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function addCourse($credentials)
	{
		if($this->db->insert('course',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function addTimetable($credentials)
	{
		if($this->db->insert('timetable',$credentials))
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function getTimetableList()
	{
		$this->db->select('timetable.id,
							department_name,
							semester_name,
							faculty_name,
							time_stamp,
							day_name
							');
		$this->db->from('timetable');
		$this->db->join('department','department.id = timetable.department');
		$this->db->join('semester','semester.id = timetable.semester');
		$this->db->join('faculty','faculty.id = timetable.faculty');
		$this->db->join('day','day.id = timetable.day');
		$query=$this->db->get();
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['faculty_name'][$i]=$row->faculty_name;
        			$credentials2['department_name'][$i]=$row->department_name;
        			$credentials2['semester_name'][$i]=$row->semester_name;
        			$credentials2['day_name'][$i]=$row->day_name;
        			$credentials2['time_stamp'][$i]=$row->time_stamp;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getFacultyList()
	{
		$this->db->select('faculty.id,
							faculty_name,
							work_type,
							email,
							department_name,
							faculty_code
							');
		$this->db->from('faculty');
		$this->db->join('department','department.id = faculty.department');
		$query=$this->db->get();
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['faculty_name'][$i]=$row->faculty_name;
        			$credentials2['faculty_code'][$i]=$row->faculty_code;
        			$credentials2['department_name'][$i]=$row->department_name;
        			$credentials2['work_type'][$i]=$row->work_type;
        			$credentials2['email'][$i]=$row->email;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getDepartmentList()
	{
		$this->db->select('id,
							department_name,
							no_of_division,
							department_code
							');
		$query=$this->db->get('department');
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['department_name'][$i]=$row->department_name;
        			$credentials2['no_of_division'][$i]=$row->no_of_division;
        			$credentials2['department_code'][$i]=$row->department_code;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getFacultyTimetable($faculty_id)
	{
		$this->db->select('id,
							day_name
							');
		$query=$this->db->get('day');
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['day_name'][$i]=$row->day_name;
        			$this->db->select('department_name,
							semester_name,
							faculty_name,
							time_stamp
							');
					$this->db->from('timetable');
					$this->db->join('department','department.id = timetable.department');
					$this->db->join('semester','semester.id = timetable.semester');
					$this->db->join('faculty','faculty.id = timetable.faculty');
					$this->db->where('timetable.faculty',$faculty_id);
					$this->db->where('timetable.day',$row->id);
					$this->db->order_by("timetable.time_stamp", "asc");
					$query1=$this->db->get();
					$credentials3['count'] = 0;
					if($query1->num_rows()>0)
					{
						$j=0;
						foreach ($query1->result() as $row1)
						{
		        			$credentials3['department_name'][$j]=$row1->department_name;
		        			$credentials3['semester_name'][$j]=$row1->semester_name;
		        			$credentials3['faculty_name'][$j]=$row1->faculty_name;
		        			$credentials3['time_stamp'][$j]=$row1->time_stamp;
		        			$j++;
						}
						$credentials3['count']=$j;
					}
					$credentials2['timetable_entities'][$i]=$credentials3;
					unset($credentials3);
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getDayList()
	{
		$this->db->select('id,
							day_name
							');
		$query=$this->db->get('day');
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['day_name'][$i]=$row->day_name;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getCourseList()
	{
		$this->db->select('course.id,
							course_name,
							course_type,
							semester_name,
							course_code
							');
		$this->db->from('course');
		$this->db->join('semester','semester.id = course.semester');
		$query=$this->db->get();
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['course_name'][$i]=$row->course_name;
        			$credentials2['course_type'][$i]=$row->course_type;
        			$credentials2['course_code'][$i]=$row->course_code;
        			$credentials2['semester_name'][$i]=$row->semester_name;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getSubjectList()
	{
		$this->db->select('id,
							subject_name,
							subject_type,
							lecture_count,
							tutorial_count,
							practical_count,
							subject_code
							');
		$query=$this->db->get('subject');
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['subject_name'][$i]=$row->subject_name;
        			$credentials2['subject_type'][$i]=$row->subject_type;
        			$credentials2['subject_code'][$i]=$row->subject_code;
        			$credentials2['lecture_count'][$i]=$row->lecture_count;
        			$credentials2['tutorial_count'][$i]=$row->tutorial_count;
        			$credentials2['practical_count'][$i]=$row->practical_count;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
	public function getSemesterList()
	{
		$this->db->select('id,
							semester_name,
							semester_type,
							semester_code
							');
		$query=$this->db->get('semester');
		if($query->num_rows()>0)
			{
				$i=0;
				foreach ($query->result() as $row)
				{
        			$credentials2['id'][$i]=$row->id;
        			$credentials2['semester_name'][$i]=$row->semester_name;
        			$credentials2['semester_type'][$i]=$row->semester_type;
        			$credentials2['semester_code'][$i]=$row->semester_code;
        			$i++;
				}
				$credentials2['count']=$i;
				return $credentials2;
			}
			return NULL;
	}
}
?>