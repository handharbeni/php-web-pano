<?php
class M_galery extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function getAllGalery()
	{
		$query = $this->db->get_where('galery', ["galery.isDelete" => 0]);
		return $query->result();
	}

	public function insertGalery($image, $title, $desc)
	{		
		$galeryObject = array(
			'galeryImage' => $image,
			'galeryTitle' => $title,
			'galeryDesc' => $desc,
			'isDelete' => 0,
		);
		return $this->db->insert('galery', $galeryObject);
	}

	public function getAllCommentGalery($galeryID)
	{
		$query = $this->db->get_where('galerycomment', ["galerycomment.isDelete" => 0, "galeryID" => $galeryID]);
		return $query->result();
	}

	public function insertCommentGalery($galeryID, $galeryCommentName, $galeryCommentValue)
	{		
		$commentGaleryObject = array(
			'galeryID' => $galeryID,
			'galeryCommentName' => $galeryCommentName,
			'galeryCommentValue' => $galeryCommentValue,
			'isDelete' => 0,
		);
		return $this->db->insert('galerycomment', $commentGaleryObject);
	}
}
