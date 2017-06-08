<?php

namespace Repository;

use Doctrine\DBAL\Connection;
use Entity\Category;

class CategoryRepository {
    
    /**
     *
     * @var Connection
     */
    private $db;
    
    public function __construct(Connection $db){
        $this->db =$db;
    }
    
    /**
     * 
     * @return Array of Category
     */
    public function findAll(){
        $dbCategorys = $this->db->fetchAll('SELECT * FROM category');
        $categories = [];
        
        foreach ($dbCategorys as $dbCategory) {
            $category = new Category();
            $category->setId($dbCategory['id'])
                     ->setName($dbCategory['name']);
            $categories[] = $category;
        }
        
        return $categories;
    }
}
