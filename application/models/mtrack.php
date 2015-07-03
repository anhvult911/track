<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of track
 *
 * @author Anh Vu
 */
class Mtrack extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getFirst($key) {
        $query = $this->db->get_where("track", array(
            'key' => mysql_real_escape_string($key)
        ));
        return $query->first_row();
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   save
     * @todo    save data 
     * @params  array data
     *
     * @return  True/False
     *
     */
    public function save($data) {
        $obj_track = $this->db->insert('track', $data);
        if ($obj_track) {
            $results['id'] = $this->db->insert_id();
            $results['key'] = $data['key'];
            $results['action'] = 'save';
            return $results;
        } else {
            return FALSE;
        }
    }

    /**
     *
     * @author  Tran Ho Anh Vu
     * @name   update
     * @todo    update data 
     * @params  array data, id 
     *
     * @return  True/False
     *
     */
    public function update($id, $data) {
        $this->db->where('id', $id);
        $obj_track = $this->db->update('track', $data);
        if ($obj_track) {
            $results['action'] = 'update';
            return $results;
        } else {
            return FALSE;
        }
    }

}
