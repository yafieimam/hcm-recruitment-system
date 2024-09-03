<?php
class M_Menu extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getMenu($SMAaccessHd, $parent, $hasil, $ref = "")
	{
		$main = $this->db->query("SELECT * from Fn_MenuAdmin (1,1) where MenuAdminParent='" . $parent . "' and IsActive=1 order by sort"); {
			foreach ($main->result() as $h) {
				$cek_parent = $this->db->query("SELECT * from Fn_MenuAdmin (1,1) WHERE MenuAdminParent=" . $h->MenuAdminId . " and IsActive=1");
				if (($cek_parent->num_rows()) > 0) {
					if (strtolower($ref) == strtolower($h->FormPath)) {
						$hasil .= '<li class="active">';
					} else {
						$hasil .= '<li class="">';
					}
					$hasil .= '<a href="' . base_url() . '' . ($h->Isactive == 0 ? 'ListRequest?f=' . $h->FormPath : $h->FormPath) . '" class="dropdown-toggle" >
								   <i class="menu-icon fa ' . $h->Icon . '" style="float: left;"></i>
								   <div class="menu-text">' . $h->Description . ' &nbsp;</div>
								   <b class="arrow fa fa-angle-down"></b>
							   </a>
   
							   <b class="arrow"></b>';
				} else {
					if (strtolower($ref) == strtolower($h->FormPath)) {
						$hasil .= '<li class="active">';
					} else {
						$hasil .= '<li class="">';
					}
					$hasil .= '<a href="' . base_url() . '' . ($h->Isactive == 0  ? 'ListRequest?f=' . $h->FormPath : $h->FormPath) . '">
								   <i class="menu-icon fa  ' . $h->Icon . '" style="font-size: 18px;float: left;"></i>
								   <div class="menu-text" >' . $h->Description . ' &nbsp;</div>
							   </a>
   
							   <b class="arrow"></b>
							 </li>';
				}
				$hasil .= '<ul class="submenu">';
				$hasil = $this->getMenu($SMAaccessHd, $h->MenuAdminId, $hasil);
				$hasil .= '</ul>';
			}
			return $hasil;
		}
	}

	function getMenuAdmin()
	{
		$main = $this->db->query("SELECT * from Fn_MenuAdmin (1,1) where IsActive=1 order by sort")->result();

		return $main;
	}

	public function read($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$sql_menu = $this->db->get('menu');
		if ($sql_menu->num_rows() == 1) {
			return $sql_menu->row_array();
		}
	}

	function get_menu()
	{
		$query = $this->db->query("SELECT * from MenuAdmin");
		return $query;
	}
}
