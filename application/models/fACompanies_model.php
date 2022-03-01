<?php defined('BASEPATH') OR exit('No direct script access allowed');

class fACompanies_model extends CI_Model {
    //global variable for table name
    private $table = "fa_companies";
    //column order basis
    var $column_order = array(null,'companyId','companyName','companyDesc','companyContactNum','companyEmail'); //set column field database for datatable orderable
    //default column order
    var $order = array('fa_companies.companyId' => 'asc');

    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'companyId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'companyImg' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ),
                'companyReq' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),
                'companyName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'companyDesc' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                ),
                'companyContactNum' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                ),
                'companyEmail' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                ),
                // ,
                // 'companyRequirements' => array(
                // 'type' => 'VARCHAR',
                // 'constraint' => 255,
                // )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('companyId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }

    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}

    //load data for the table
    public function fAssistanceAdminTable($searchKey=''){
        
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
            $this->db->group_start();
            $this->db->like("fa_companies.companyId", $searchKey);
            $this->db->or_like("fa_companies.companyName", $searchKey);
            $this->db->or_like("fa_companies.companyDesc", $searchKey);
            $this->db->or_like("fa_companies.companyContactNum", $searchKey);
            $this->db->or_like("fa_companies.companyEmail", $searchKey);
            $this->db->group_end();
        }
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
   
    }
    //get data for the table
    public function getFACompanyTable($searchKey=''){
        $this->fAssistanceAdminTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->fAssistanceAdminTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->fAssistanceAdminTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    //update query for fACompany
    public function updateFACompanyItm($data = []){
        return $this->db->where('companyId',$data['companyId'])->update($this->table,$data); 
    }
    //delete per id fACompany
    public function deleteFACompanyItm($id = null){
        $this->db->where('companyId',$id)->delete($this->table);
		if ($this->db->affected_rows()) {
			return true;
		} 
        else {
			return false;
		}
    }
    //get all data in the table and display in the view
    public function getFACompanyData(){
        return $this->db->select("*")->from($this->table)->get()->result();
    } 
    //search table per id
    public function getFACompanyDataById($id = null){
        return $this->db->select("*")->from($this->table)->where('companyId',$id)->get()->row();
    }

}

?>