<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article_Model extends CI_Model
{
    protected $article_table = 'articles';

    /**
     * Add a new Article
     * @param: {array} Article Data
     */
    public function create_article(array $data) {
        $this->db->insert($this->article_table, $data);
        return $this->db->insert_id();
    }

    /**
     * Delete an Article
     * @param: {array} Article Data
     */
    public function delete_article(array $data)
    {
        /**
         * Check Article exist with article_id and user_id
         */
        $query = $this->db->get_where($this->article_table, $data);
        if ($this->db->affected_rows() > 0) {
            
            // Delete Article
            $this->db->delete($this->article_table, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }   
        return false;
    }

    /**
     * Update an Article
     * @param: {array} Article Data
     */
    public function update_article(array $data)
    {
        /**
         * Check Article exist with article_id and user_id
         */
        $query = $this->db->get_where($this->article_table, [
            'user_id' => $data['user_id'],
            'id' => $data['id'],
        ]);

        if ($this->db->affected_rows() > 0) {
            
            // Update an Article
            $update_data = [
                'title' =>  $data['title'],
                'description' =>  $data['description'],
                'updated_at' => time(),
            ];

            return $this->db->update($this->article_table, $update_data, ['id' => $query->row('id')]);
        }   
        return false;
    }
}