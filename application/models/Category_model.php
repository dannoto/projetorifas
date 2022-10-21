<?php
class category_model extends CI_Model
{

    public function getCategories() {
        return $this->db->get('raffles_category')->result();
    }

    public function getCategory($raffles_category) {
        
        $this->db->where('id', $raffles_category);
        return $this->db->get('raffles_category')->row_array();
    }

    public function addCategory($category_name) {

        $data = array(
            'raffles_name' => $category_name
        );
       
        return $this->db->insert('raffles_category', $data);

    }

    public function updateCategory($category_id, $category_name) {

        $this->db->where('id', $category_id);

        $data = array(
            'raffles_name' => $category_name
        );
       
        return $this->db->update('raffles_category', $data);


    }

    public function deleteCategory($category_id) {
        $this->db->where('id', $category_id);
        return $this->db->delete('raffles_category');
    }

   

}
?>