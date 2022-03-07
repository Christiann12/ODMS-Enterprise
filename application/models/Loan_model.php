<?php defined('BASEPATH') OR exit('No direct script access allowed');

class loan_model extends CI_Model {
    //global variable for table name
    private $table = "loan";
    //column order basis
    var $column_order = array(null,'loanId','fACompanyId','firstName','lastName', 'clientCompanyName', 'emailAddress', 'createDate', 'requestStatus'); //set column field database for datatable orderable
    //default column order
    var $order = array('loan.loanId' => 'asc');

    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'loanId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'fACompanyId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'firstName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'lastName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'clientCompanyName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'emailAddress' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
                ),
                'requirements' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
                ),
                'requestStatus' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'Pending'
                ),
                'createDate' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                )
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('loanId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }

    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}

    //load data for the table
    public function loanAdminTable($searchKey=''){
        
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
            $this->db->group_start();
            $this->db->like("loan.loanId", $searchKey);
            $this->db->or_like("loan.fACompanyId", $searchKey);
            $this->db->or_like("loan.firstName", $searchKey);
            $this->db->or_like("loan.lastName", $searchKey);
            $this->db->or_like("loan.clientCompanyName", $searchKey);
            $this->db->or_like("loan.emailAddress", $searchKey);
            $this->db->or_like("loan.createDate", $searchKey);
            $this->db->or_like("loan.requestStatus", $searchKey);
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
    public function getLoanTable($searchKey=''){
        $this->loanAdminTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->loanAdminTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->loanAdminTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    // update query for Loan
    public function updateLoanItm($data = []){
        return $this->db->where('loanId',$data['loanId'])->update($this->table,$data); 
    }
    // update loan status to approve
    public function updateLoanStatusApprove($id){
        $data = array(
            'requestStatus' => 'Approved'
        );
        return $this->db->where('loanId',$id)->update($this->table,$data); 
    }
    // update loan status to reject
    public function updateLoanStatusReject($id){
        $data = array(
            'requestStatus' => 'Rejected'
        );
        return $this->db->where('loanId',$id)->update($this->table,$data); 
    }
    //delete per id fACompany
    // public function deleteFACompanyItm($id = null){
    //     $this->db->where('companyId',$id)->delete($this->table);
	// 	if ($this->db->affected_rows()) {
	// 		return true;
	// 	} 
    //     else {
	// 		return false;
	// 	}
    // }
    //get all data in the table and display in the view
    public function getLoanData(){
        return $this->db->select("*")->from($this->table)->get()->result();
    } 
    //search table per id
    public function getLoanDataById($id = null){
        return $this->db->select("*")->from($this->table)->where('loanId',$id)->get()->row();
    }

    public function getDateDetail($date){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('createDate',$date);
        return $this->db->count_all_results();
    }

}

?>
