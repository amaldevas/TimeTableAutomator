<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacultyModel extends CI_Model {

	public function isFacultyExist($credentials)
	{
		$this->db->select('id,
							faculty_name,
							email
						');
		$this->db->where('email' , $credentials['email']);
		$this->db->where('password' , $credentials['password']);
		$query=$this->db->get('faculty');
		if($query->num_rows()==1)
		{
			foreach ($query->result() as $row)
			{
    			$credentials2['id']=$row->id;
    			$credentials2['name']=$row->faculty_name;
    			$credentials2['email']=$row->email;
    			$credentials2['type']="faculty";
			}
			return $credentials2;
		}
		else
		{
			return NULL;
		}
	}
}
?>