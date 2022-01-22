<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ping_model extends CI_Model {
    //global variable for table name
    private $table = "pingdetail";
    //column order basis
    var $column_order = array(null,'pingId', 'locationcode', 'note', 'status'); //set column field database for datatable orderable
    //default column order
    var $order = array('pingdetail.pingId' => 'asc');
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'pingId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'locationcode' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'status' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'inactive'
                ),
                'note' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'No Desc'
                )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('productId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function pingTable($searchKey=''){
        
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("pingdetail.pingId", $searchKey);
            $this->db->or_like("pingdetail.locationcode", $searchKey);
			$this->db->or_like("pingdetail.status", $searchKey);
            $this->db->or_like("pingdetail.note", $searchKey);
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
    public function getPingTable($searchKey=''){
        $this->pingTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->pingTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->pingTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    //update query for product
    public function updatePingItm($data = []){
        return $this->db->where('pingId',$data['pingId'])->update($this->table,$data); 
    }
    //delete per id product
    public function delPingItem($id = null){
        $this->db->where('pingId',$id)->delete($this->table);
		if ($this->db->affected_rows()) {
			return true;
		} 
        else {
			return false;
		}
    }
    //get all data in the table and display in the view
    public function getInvData(){
        return $this->db->select("*")->from($this->table)->get()->result();
    } 
    //search table per id
    public function getInvDataById($id = null){
        return $this->db->select("*")->from($this->table)->where('productId',$id)->get()->row();
    }    
}
