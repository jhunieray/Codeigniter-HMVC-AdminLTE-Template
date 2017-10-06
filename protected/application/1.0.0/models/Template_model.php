<?php
class Template_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->output->delete_cache();
    }

	public function has_access($user, $url)
	{
		$query = $this->db->select('module.id, module.`name`, url, icon, parent_id')
							->join('module_access', 'module.id = module_access.module', 'left')
							->join('groups', 'module_access.`group` = groups.id', 'right')
							->like('module.url', $url, 'after')
							->order_by('parent_id, its_order', 'ASC')
							->get_where('module', 
								array(
									'groups.id' => $user->group, 
									'status' => 0)
								);
		return $query->row();
	}

	public function get_access($user)
	{
		$query = $this->db->select('module.id, module.`name`, url, icon, parent_id')
							->join('module_access', 'module.id = module_access.module', 'left')
							->join('groups', 'module_access.`group` = groups.id', 'right')
							->order_by('parent_id, its_order', 'ASC')
							->get_where('module', 
								array(
									'groups.id' => $user->group, 
									'status' => 0)
								);
		return $query->result();
	}
}