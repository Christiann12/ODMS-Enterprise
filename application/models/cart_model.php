<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
    private $table = "cart";
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'no' => array(
                'type' => 'int',
                'constraint' => 20,
                'auto_increment' => TRUE
                ),
                'sessid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50
                ),
                'productId' => array(
                    'type' => 'VARCHAR',
                    'constraint' =>20,
                ),
                'productTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'productPicture' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'Unverified'
                ),
                'productPrice' => array(
                'type' => 'Decimal',
                'constraint' => '50,2',
                'default' => 0
                ),
                'quan' => array(
                'type' => 'INT',
                'constraint' => 10,
                'default' => 0
                )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('no', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function inventoryTable($searchKey=''){
        $this->db->select('*');
        $this->db->from($this->table);
        // $columnIndex = $_POST['order'][0]['column']; // Column index
        // $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("products.productId", $searchKey);
            $this->db->or_like("products.productTitle", $searchKey);
			$this->db->or_like("products.productDesc", $searchKey);
            $this->db->or_like("products.productPrice", $searchKey);
            $this->db->or_like("products.productStock", $searchKey);
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
    public function getInvTable($searchKey=''){
        $this->inventoryTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->inventoryTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries, for table record information
    function count_filtered($searchKey=''){
		$this->inventoryTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    //update query for product
    public function updateProdItm($data = []){
        return $this->db->where('productId',$data['productId'])->update($this->table,$data); 
    }
    //delete per id product
    public function deleteProdItm($id = null){
        $this->db->where('productId',$id)->delete($this->table);
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
