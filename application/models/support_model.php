<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Support_model extends CI_Model {
    private $table = "supportdetail";
    var $column_order = array(null,'supportId', 'supportMessage', 'email', 'firstname','lastname','status'); //set column field database for datatable orderable
    //default column order
    var $order = array('supportDetail.supportId' => 'asc');
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                // 'no' => array(
                // 'type' => 'int',
                // 'constraint' => 20,
                // 'auto_increment' => TRUE
                // ),
                'supportId' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'supportMessage' => array(
                'type' => 'VARCHAR',
                'constraint' =>255,
                ),
                'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'status' => array(
                'type' => 'VARCHAR',
                'constraint' => 40,
                'default' => 'false'
                ),
                'firstname' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'lastname' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'createDate' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('supportId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function supportTable($searchKey=''){
        $this->db->select('*');
        $this->db->from($this->table);
        // $columnIndex = $_POST['order'][0]['column']; // Column index
        // $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("supportdetail.supportId", $searchKey);
            $this->db->or_like("supportdetail.supportMessage", $searchKey);
			$this->db->or_like("supportdetail.email", $searchKey);
            $this->db->or_like("supportdetail.status", $searchKey);
            $this->db->or_like("supportdetail.firstname", $searchKey);
            $this->db->or_like("supportdetail.lastname", $searchKey);
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
    public function getSupportTable($searchKey=''){
        $this->supportTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->supportTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries, for table record information
    function count_filtered($searchKey=''){
		$this->supportTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    function countTotal(){
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function countOpen(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status','Active');
        return $this->db->count_all_results();
    }
    function countClose(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status','Inactive');
        return $this->db->count_all_results();
    }
    // update query for support
    public function updateSupportItem($data = []){
        return $this->db->where('supportId',$data['supportId'])->update($this->table,$data); 
    }
    public function getDateDetail($date){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('createDate',$date);
        return $this->db->count_all_results();
    }
    //delete per id product
    // public function deleteProdItm($id = null){
    //     $this->db->where('productId',$id)->delete($this->table);
	// 	if ($this->db->affected_rows()) {
	// 		return true;
	// 	} 
    //     else {
	// 		return false;
	// 	}
    // }
    //get all data in the table and display in the view
    // public function getInvData(){
    //     return $this->db->select("*")->from($this->table)->get()->result();
    // } 
    //search table per id
    // public function getInvDataById($id = null){
    //     return $this->db->select("*")->from($this->table)->where('productId',$id)->get()->row();
    // }    
}
