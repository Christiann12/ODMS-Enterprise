<?php defined('BASEPATH') OR exit('No direct script access allowed');

class serviceTransaction_model extends CI_Model {
    //global variable for table name
    private $table = "services_transaction";
    //column order basis
    var $column_order = array(null,'serviceTransactionId','availedService','servicePrice','fName','lName','emailAdd','contactnum','withLoan','status'); //set column field database for datatable orderable
    //default column order
    var $order = array('services_transaction.serviceTransactionId' => 'asc');

    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'serviceTransactionId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'availedServiceId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'availedService' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'servicePrice' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'fName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'lName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'emailAdd' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),
                'contactNum' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                ),
                'compName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'compAdd' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                ),
                'city' => array(
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
            $this->dbforge->add_key('serviceTransactionId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function serviceTransactionTable($searchKey=''){
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
            $this->db->group_start();
            $this->db->like("services_transaction.serviceTransactionId", $searchKey);
            $this->db->or_like("services_transaction.availedService", $searchKey);
            $this->db->or_like("services_transaction.servicePrice", $searchKey);
            $this->db->or_like("services_transaction.fName", $searchKey);
            $this->db->or_like("services_transaction.lName", $searchKey);
            $this->db->or_like("services_transaction.emailAdd", $searchKey);
            $this->db->or_like("services_transaction.contactNum", $searchKey);
            $this->db->or_like("services_transaction.withLoan", $searchKey);
            $this->db->or_like("services_transaction.status", $searchKey);
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
    public function getServiceTransTable($searchKey=''){
        $this->serviceTransactionTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->serviceTransactionTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->serviceTransactionTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    public function updateServiceTransRecord($data = []){
        return $this->db->where('serviceTransactionId',$data['serviceTransactionId'])->where('availedServiceId',$data['availedServiceId'])->update($this->table,$data); 
    }
    //get all data in the table and display in the view
    public function getServiceTransData(){
        return $this->db->select("*")->from($this->table)->get()->result();
    } 
    // //search table per id
    // public function getServiceTransDataById($id = null){
    //     return $this->db->select("*")->from($this->table)->where('serviceTransactionId',$id)->get()->row();
    // }

}

?>