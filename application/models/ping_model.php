<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ping_model extends CI_Model {
    //global variable for table name
    private $table = "pingdetail";
    //column order basis
    var $column_order = array(null,'pingId', 'firstName', 'lastName', 'emailAddress', 'contactNum', 'locationcode', 'note', 'status'); //set column field database for datatable orderable
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
                'firstName' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                ),
                'lastName' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                ),
                'emailAddress' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50
                ),
                'contactNum' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 20,
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
                ),
                'createDate' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('pingId', TRUE);
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
            $this->db->or_like("pingdetail.firstName", $searchKey);
            $this->db->or_like("pingdetail.lastName", $searchKey);
            $this->db->or_like("pingdetail.emailAddress", $searchKey);
            $this->db->or_like("pingdetail.contactNum", $searchKey);
            $this->db->or_like("pingdetail.locationcode", $searchKey);
            $this->db->or_like("pingdetail.note", $searchKey);
			$this->db->or_like("pingdetail.status", $searchKey);
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
    public function getPingData(){
        return $this->db->select("*")->from($this->table)->get()->result();
    } 
    //search table per id
    public function getPingDataById($id = null){
        return $this->db->select("*")->from($this->table)->where('pingId',$id)->get()->row();
    }    

    public function countRecordPerMonth(){
        $query =  $this->db->select("*")->from($this->table)->get()->result();
        $counter = 0;
        $currentMonth = date('m');
        foreach($query as $list){
            if($currentMonth == date("m", strtotime($list->createDate))){
                $counter++;
            }
        }
        // return date("m-d-Y", strtotime('-14 day'));
        return $counter;
    }

    public function getDateDetail($date){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('createDate',$date);
        return $this->db->count_all_results();
    }

    public function notification(){
    
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status','Active');
        // $this->db->like('createDate',date("Y-m-d", strtotime("-1 day")));
        
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-3 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-4 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-5 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-6 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-7 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-8 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-9 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-10 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-11 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-12 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-13 day")));
        // $this->db->or_like('createDate',date("Y-m-d", strtotime("-14 day")));
        // for ($x = 0; $x <= 30; $x++){
        //     $this->db->or_like('createDate',date("Y-m-d", strtotime("-".$x."day")));
        // }
        return $this->db->get()->result();
    }
}
