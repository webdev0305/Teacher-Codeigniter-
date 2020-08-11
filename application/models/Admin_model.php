<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function add($table, $data) {
        $this->db->insert($table, $data);
    }

    public function get($table, $id = null) {
        $this->db->select()->from($table);
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function get_count($table) {
        return $this->db->count_all($table);
    }

    public function get_message($limit, $start,$search='') {
        if($search!=''){
            $this->db->like('name',$search);
            $this->db->or_like('email',$search);
            $this->db->or_like('content',$search);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('created_at','desc');
        $query = $this->db->get('contact');

        return $query->result_array();
    }

    public function getData($table, $where = array()) {
        $this->db->select()->from($table);
        if (count($where) > 0) {
            // foreach ($where as $key => $value) {
                $this->db->where($where);
            // }
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($table, $id, $data) {
        
        $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $id) {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function getFileDate($table, $where = array()){
        $this->db->select($table.'*','category.title as category_name')->from($table);
        $this->db->join('category',$table.'category_id = category.id','left');
        if (count($where) > 0) {
            // foreach ($where as $key => $value) {
                $this->db->where($where);
            // }
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

}
