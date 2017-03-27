<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function getImages($owner = 'gallery', $category = 'gallery', $start = 0, $limit = 4)
    {
        $this->db->select('image.id, image.path, image.text');
        $this->db->where('image.owner', $owner);
        $this->db->where('image_category.title', $category);
        $this->db->or_where('image_category.url_segment', $category);
        $this->db->join('image_category', 'image_category.id = image.category_id');
        $this->db->limit($limit, $start);
        $result = $this->db->get('image')->result_array();
        return $result;
    }

    public function getCategories($owner = 'gallery')
    {
        $this->db->select('image_category.title, image_category.url_segment');
        $this->db->distinct();
        $this->db->where('image.owner', $owner);
        $this->db->join('image_category', 'image_category.id = image.category_id');
        $result = $this->db->get('image')->result_array();
        return $result;
    }

    public function getImageCount($owner = 'gallery', $category = 'gallery')
    {
        $this->db->where('image.owner', $owner);
        $this->db->where('image_category.title', $category);
        $this->db->or_where('image_category.url_segment', $category);
        $this->db->join('image_category', 'image_category.id = image.category_id');
        $result = $this->db->count_all_results('image');
        return $result;
    }

    public function setImage($image)
    {
        $this->db->replace('image', $image);
    }

}
