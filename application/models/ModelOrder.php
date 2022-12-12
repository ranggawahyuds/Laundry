<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelOrder extends CI_Model
{
    public function getOrder()
    {
        return $this->db->get('order');
    }
    public function orderWhere($where)
    {
        return $this->db->get_where('order', $where);
    }
    public function simpanOrder($data = null)
    {
        $this->db->insert('order',$data);
    }
    public function updateOrder($data = null, $where = null)
    {
        $this->db->update('order', $data, $where);
    }
    public function hapusOrder($where = null)
    {
        $this->db->delete('order', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('order');
        return $this->db->get()->row($field);
    }
    public function getOrderWhere($where = null)
    {
        return $this->db->get_where('order', $where);
    }
}  