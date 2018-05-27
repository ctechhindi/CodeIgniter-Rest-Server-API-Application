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
}