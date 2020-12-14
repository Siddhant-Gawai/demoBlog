<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Model_blog extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	/*
     * Get blogs by user id
     */

	function getblogby_userid() {
		$user_id = $this->session->userdata('id');
		$sql = 'SELECT * FROM blog b 
		JOIN users u
        ON b.user_id = u.user_id
        WHERE b.user_id LIKE ? ORDER BY blog_id DESC';
        return $this->db->query($sql, [$user_id])->result_array();
	}
    /*
     * Get all blogs
     */
    function get_all_blog()
    {
        $sql = 'SELECT * FROM blog b 
		JOIN users u
        ON b.user_id = u.user_id
        ORDER BY blog_id DESC';
        return $this->db->query($sql)->result_array();
	}
	
    /*
     * function to add new blog
     */
    function add_blog($params)
    {
        $this->db->insert('blog', $params);
        return $this->db->insert_id();
    }


   
}