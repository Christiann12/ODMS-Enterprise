<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prodtransaction_model extends CI_Model {
    //global variable for table name
    private $table = "prodtransaction";
    //column order basis
    var $column_order = array(null,'transactionId','firstName','lastName','phoneNumber','status',); //set column field database for datatable orderable
    //default column order
    var $order = array('prodtransaction.transactionId' => 'asc');
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'no' => array(
                'type' => 'INT',
                'constraint' =>20,
                'auto_increment' => TRUE
                ),
                'transactionId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'firstName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'lastName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'emailAddress' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),
                'phoneNumber' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                ),
                'companyName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'companyAddress' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),
                'cityName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'stateProvince' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'postalCode' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                ),
                'productId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'productTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'totalPrice' => array(
                'type' => 'Decimal',
                'constraint' => '50,2',
                'default' => 0
                ),
                'quan' => array(
                'type' => 'INT',
                'constraint' => 10,
                'default' => 0
                ),
                'createDate' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'status' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'Not Paid'
                ),
                'loanId' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => TRUE
                ),
                'loanStatus' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'Inactive'
                ),
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
        return $this->db->insert_batch($this->table,$data);
	}
    //load data for the table
    public function prodTranTable($searchKey=''){
        
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("prodtransaction.transactionId", $searchKey);
            $this->db->or_like("prodtransaction.firstName", $searchKey);
			$this->db->or_like("prodtransaction.lastName", $searchKey);
            $this->db->or_like("prodtransaction.phoneNumber", $searchKey);
            $this->db->or_like("prodtransaction.status", $searchKey);
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
    public function getProdTransTable($searchKey=''){
        $this->prodTranTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->prodTranTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->prodTranTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    public function updatePrdRec($data = []){
        return $this->db->where('transactionId',$data['transactionId'])->where('productId',$data['productId'])->update($this->table,$data); 
    }
}
