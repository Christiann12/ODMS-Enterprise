<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    private $table = "users";
    var $column_order = array(null,'userId','firstName','lastName','email','userRole'); //set column field database for datatable orderable
    //default column order
    var $order = array('users.userId' => 'asc');
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'userId' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'password' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'firstName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'lastName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => TRUE
                ),
                'userRole' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('userId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function userTable($searchKey=''){
        $this->db->select('*');
        $this->db->from($this->table);
        // $columnIndex = $_POST['order'][0]['column']; // Column index
        // $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("users.userId", $searchKey);
            $this->db->or_like("users.firstName", $searchKey);
			$this->db->or_like("users.lastName", $searchKey);
            $this->db->or_like("users.email", $searchKey);
            $this->db->or_like("users.userRole", $searchKey);
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
    public function getUserTable($searchKey=''){
        $this->userTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
     //count queries for table record infromation
     public function count($searchKey='')
	{
		$this->userTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->userTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    //check login credentials
    public function checkCredentials($data = []){
        return $this->db->select("*")
			->from($this->table)
			->where('email',$data['email'])
			->where('password',$data['password'])
			->get()
			->row();
    }
}
