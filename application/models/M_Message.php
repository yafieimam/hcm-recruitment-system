<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Message extends CI_Model
{
	public function getMessage()
	{
		return $this->db->get('CanMessage')->result_array();
	}

	public function countMessage($ProfileId)
    {
        return $this->db->get("Fn_ListCanMessage($ProfileId)")->num_rows();
    }

	public function countMessageAdmin($ProfileId)
    {
        return $this->db->get("Fn_ListUserMessage($ProfileId)")->num_rows();
    }

	public function getMessagePage($limit, $offset, $ProfileId)
    {
		// $this->db->where("CanProfileId", $ProfileId);
        $this->db->limit($limit, $offset);
        return $this->db->get("Fn_ListCanMessage($ProfileId)")->result();
		// var_dump($this->db->last_query());
		// exit;
    }

	public function getMessagePageAdmin($limit, $offset, $ProfileId)
    {
		// $this->db->where("CanProfileId", $ProfileId);
        $this->db->limit($limit, $offset);
        return $this->db->get("Fn_ListUserMessage($ProfileId)")->result();
		// var_dump($this->db->last_query());
		// exit;
    }

	public function getListMessage($limit, $ProfileId)
    {
        $this->db->limit($limit);
        return $this->db->get("Fn_ListCanMessage($ProfileId)")->result();
    }

	public function getListMessageTotal($ProfileId)
    {
        return $this->db->get("Fn_ListCanMessageTotal($ProfileId)")->row();
    }

	public function getListNotification($limit, $ProfileId)
    {
        $this->db->limit($limit);
        return $this->db->get("Fn_ListCanNotification($ProfileId)")->result();
    }

	public function getListNotificationTotal($ProfileId)
    {
        return $this->db->get("Fn_ListCanNotificationTotal($ProfileId)")->row();
    }

	public function getMessageDetail($ProfileId, $JobId)
    {
		// $this->db->where("CanProfileId", $ProfileId);
        return $this->db->get("Fn_CanMessage($ProfileId, $JobId)")->result();
		// var_dump($this->db->last_query());
		// exit;
    }

	public function getMessageAdminDetail($UserId, $ProfileId, $JobId)
    {
		// $this->db->where("CanProfileId", $ProfileId);
        return $this->db->get("Fn_UserMessage($UserId, $ProfileId, $JobId)")->result();
		// var_dump($this->db->last_query());
		// exit;
    }
}