<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    // Get cities
    function getCity(){

        $response = array();
    
        // Select record
        $this->db->select('*');
        $q = $this->db->get('city');
        $response = $q->result_array();

        return $response;
    }

    // Get City departments
    function getCityDepartment($postData){
        $response = array();
        // Select record
        $this->db->distinct();
        $this->db->select('prodi');
        $this->db->where('lokasi', $postData['city']);
        $this->db->where('akademik', $postData['akademik']);
        $q = $this->db->get('lokasi_kampus');
        $response = $q->result_array();

        return $response;
    }

    // Get Department user
    function getDepartmentUsers($postData){
        $response = array();
    
        // Select record
        $this->db->select('id,waktu');
        $this->db->where('lokasi', $postData['city']);
        $this->db->where('prodi', $postData['department']);
        $q = $this->db->get('lokasi_kampus');
        $response = $q->result_array();

        return $response;
    }

}