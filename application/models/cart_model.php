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
                ),
                'createDate' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
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
    public function update($data, $sessid, $prodId){	 
        return $this->db->where('sessid',$sessid)->where('productId',$prodId)->update($this->table,$data); 
	}
    public function getCartRecord($id = null){
        return $this->db->select("*")->from($this->table)->where('sessid', $id)->where('createDate', date('Y-m-d'))->get()->result();
    }
    public function getPrice($sessid, $prodId){
        return $this->db->select('*')->from($this->table)->where('productId',$prodId)->where('sessid',$sessid)->where('createDate', date('Y-m-d'))->get()->row();
    }
    public function delCartItem($sessid, $prodId){
        $this->db->where('sessid',$sessid)->where('productId',$prodId)->delete($this->table);
		if ($this->db->affected_rows()) {
			return true;
		} 
        else {
			return false;
		}
    }
    public function deleteAfterTrans($id) {
        $this->db->where('sessid',$id)->delete($this->table);
        if ($this->db->affected_rows()) {
			return true;
		} 
        else {
			return false;
		}
    }
}
