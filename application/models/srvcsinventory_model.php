<?php defined('BASEPATH') OR exit('No direct script access allowed');

class srvcsinventory_model extends CI_Model {
    //global variable for table name
    private $table = "services";
    //column order basis
    var $column_order = array(null,'srvcsId','srvcsTitle','srvcsDesc','srvcsPrice','srvcsAvailability'); //set column field database for datatable orderable
    //default column order
    var $order = array('services.srvcsId' => 'asc');
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'srvcsId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'srvcsTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'srvcsDesc' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'No desc'
                ),
                'srvcsPicture' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'Unverified'
                ),
                'srvcsPrice' => array(
                'type' => 'Decimal',
                'constraint' => '50,2',
                'default' => 0
                ),
                'srvcsAvailability' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'Unverified'
                )

            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('srvcsId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    //create single record
    public function create($data = []){	 
        return $this->db->insert($this->table,$data);
	}
    //load data for the table
    public function servicesInventoryTable($searchKey=''){
        
        $this->db->select('*');
        $this->db->from($this->table);
        if ($searchKey!=''){
			$this->db->group_start();
			$this->db->like("services.srvcsId", $searchKey);
            $this->db->or_like("services.srvcsTitle", $searchKey);
			$this->db->or_like("services.srvcsDesc", $searchKey);
            $this->db->or_like("services.srvcsPrice", $searchKey);
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
        $this->servicesInventoryTable($searchKey);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    //count queries for table record infromation
    public function count($searchKey='')
	{
		$this->servicesInventoryTable($searchKey);
		return $this->db->count_all_results();
	}
    //count filtered queries for table record information
    public function count_filtered($searchKey=''){
		$this->servicesInventoryTable($searchKey);
		$query = $this->db->get();
		return $query->num_rows();
	}
    //update query for services
    public function updateSrvcsItm($data = []){
        return $this->db->where('srvcsId',$data['srvcsId'])->update($this->table,$data); 
    }
    //delete per id services
    public function deleteSrvcsItm($id = null){
        $this->db->where('srvcsId',$id)->delete($this->table);
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
        return $this->db->select("*")->from($this->table)->where('srvcsId',$id)->get()->row();
    }
}
