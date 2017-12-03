<?php
class User_model extends CI_Model {


	public function validate($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('name',$username);
		$this->db->where('password',md5($password));
		$user = $this->db->get();

		if($user->num_rows()==1)
		{
			return $user->row();
		}
		else
		{
			return false;	
		}
		// $sql = "SELECT * FROM user 
		// WHERE name='$username' and password=Password('$password');";
		// make SQL query that checks for password+username combo
		//return false if no match
		//return true if match
	}



}