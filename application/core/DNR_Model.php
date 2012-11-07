<?php

class DNR_Model extends CI_Model
{
    /**
     * table name
     * @var string
     */
    protected $_table;

    /**
     * primary key
     * @var string
     */
    protected $_primaryKey;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Validate table name
     * @return boolean
     */
    protected function _validate()
    {
        if(!$this->_table){
            show_error(get_class($this).' model must have a table name');
        }
        if(!$this->_primaryKey){
            show_error(get_class($this).' model must have a primary key');
        }
        return true;
    }

    /**
     * Get all records of the table
     * @param int $limit
     * @param int $offset
     * @return array | null
     */
    public function getAll($limit = null, $offset = null)
    {
        $this->_validate();
        $rows = $this->db->get($this->_table, $limit, $offset);
        return $rows->result_array();
    }

    /**
     * Get all records with where filter
     * @param array $search
     * @param int $limit
     * @param int $offset
     * @return array | null
     */
    public function getWhere($search, $limit = null, $offset = null)
    {
        $this->_validate();
        $rows = $this->db->get_where($this->_table, $search, $limit, $offset);
        return $rows->result_array();
    }

    /**
     * Get one record with where filter
     * @param array $search
     * @return array | null
     */
    public function getOne($search)
    {
        $this->_validate();
        $row = $this->db->get_where($this->_table, $search, 1);
        return (array) $row->row();
    }

    /**
     * Update row
     * @param array $data
     * @param array | string $where
     * @return int
     */
    public function update($data, $where = NULL)
    {
        $this->_validate();
        if($where == NULL){
            $this->db->update($this->_table, $data);
        } else if(is_string($where)){
            $this->db->update($this->_table, $data, $where);
        } else if(is_array($where) && $where){
            foreach($where as $field => $value){
                $this->db->where($field, $value);
            }
            $this->db->update($this->_table, $data);
        }
        return $this->db->affected_rows();
    }

    /**
     * Insert row
     * @param array $data
     * @return boolean | int
     */
    public function insert($data)
    {
        $this->_validate();
        $this->db->insert($this->_table, $data);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Insert row
     * @param mixed $data
     * @return boolean | Object | Array
     */
    public function save($data, $update = false, $where = NULL)
    {
        $id = NULL;
        $tmp = !is_array($data) ? (array) $data : $data;
        unset($data[$this->_primaryKey]);
        if(!$update && !isset($tmp[$this->_primaryKey])){
            $id = $this->insert($data);
        } else if($this->update($data, $where) > 0){
            $data = $this->getOne($where);
            $id = isset($tmp[$this->_primaryKey]) ? $tmp[$this->_primaryKey] : $id;
        }
        unset($tmp);
        if(!$id){
            return false;
        } else if(is_array($data)){
            $data[$this->_primaryKey] = $id;
        } else if(is_object($data)){
            $data->{$this->_primaryKey} = $id;
        }
        return $data;
    }

    /**
     * Delete rows
     * @param string | array $where
     * @return int
     */
    public function delete($where)
    {
        if(is_string($where)){
            $this->db->delete($this->_table, $where);
        } else if(is_array($where) && $where){
            foreach($where as $field => $value){
                $this->db->where($field, $value);
            }
            $this->db->delete($this->_table, $where);
        }
        return $this->db->affected_rows();
    }
}