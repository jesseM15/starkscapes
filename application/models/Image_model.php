<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
	}

	public function getImage($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get('image')->row_array();
		return $result;
	}

	public function getImages($owner = 'gallery', $category = 'gallery', $start = 0, $limit = 8)
	{
		$this->db->select('image.id, image.path, image.text, image.rank');
		$this->db->order_by('image.rank');
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

	public function getCategory($url_segment)
	{
		$this->db->where('url_segment', $url_segment);
		$result = $this->db->get('image_category')->row_array();
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

	public function getNextLowerRank($category, $rank)
	{
		$category_id = $this->getCategory($category);
		$this->db->select('id, rank');
		$this->db->order_by('rank DESC');
		$this->db->where('category_id', $category_id['id']);
		$this->db->where('rank < ', $rank);
		$result = $this->db->get('image')->row_array();
		if (!empty($result))
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}

	public function getNextHigherRank($category, $rank)
	{
		$category_id = $this->getCategory($category);
		$this->db->select('id, rank');
		$this->db->order_by('rank ASC');
		$this->db->where('category_id', $category_id['id']);
		$this->db->where('rank > ', $rank);
		$result = $this->db->get('image')->row_array();
		if (!empty($result))
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}

	public function setRank($id, $rank)
	{
		$this->db->where('id', $id);
		$this->db->set('rank', $rank);
		$this->db->update('image');
	}

	public function setImage($image)
	{
		$this->db->replace('image', $image);
		$this->increaseAllRanks();
	}

	public function addImage($image)
	{
		$this->db->insert('image', $image);
		$this->increaseAllRanks();
	}

	private function increaseAllRanks()
	{
		$category_id = $this->getCategory($this->uri->segment(3));
		$this->db->where('category_id', $category_id['id']);
		// $this->db->where('rank IS NOT NULL', null, FALSE);
		$query = $this->db->get('image')->result_array();
		foreach ($query as $q)
		{
			$this->db->where('id', $q['id']);
			$this->db->set('rank', $q['rank'] + 1);
			$this->db->update('image');
		}
	}

	public function deleteImage($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('image');
	}

	public function check_path_unique($category, $path)
	{
		$category_id = $this->getCategory($category);
		$this->db->where('category_id', $category_id['id']);
		$this->db->where('path', $path);
		$count = $this->db->count_all_results('image');
		if ($count > 0)
		{
			$result = FALSE;
		}
		else
		{
			$result = TRUE;
		}
		return $result;
	}

}
