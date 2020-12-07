<?php
class M_loker extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function getAllLoker()
	{
		$query = $this->db->get_where('loker', ["loker.isDelete" => 0]);
		return $query->result();
	}

	public function insertLoker($image, $title, $desc)
	{		
		$lokerObject = array(
			'lokerImage' => $image,
			'lokerTitle' => $title,
			'lokerDesc' => $desc,
			'isDelete' => 0,
		);
		return $this->db->insert('loker', $lokerObject);
	}

	public function getAllCommentLoker($lokerID)
	{
		$query = $this->db->get_where('lokercomment', ["lokercomment.isDelete" => 0, "lokerID" => $lokerID]);
		return $query->result();
	}

	public function insertCommentLoker($lokerID, $lokerCommentName, $lokerCommentValue)
	{		
		$commentLokerObject = array(
			'lokerID' => $lokerID,
			'lokerCommentName' => $lokerCommentName,
			'lokerCommentValue' => $lokerCommentValue,
			'isDelete' => 0,
		);
		return $this->db->insert('lokercomment', $commentLokerObject);
	}
}
