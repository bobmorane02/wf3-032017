<?php

namespace Repository;

use Entity\Article;
use Entity\Category;

/**
 * Description of ArrticleRepository
 *
 * @author Etudiant
 */
class ArticleRepository extends RepositoryAbstract{
    
   
    /**
     * 
     * @return Array of Category
     */
    public function findAll(){
                                                # peut étre remplacé par :
        $query = 'SELECT a.*,c.name '           # $query =<<<EOS
                . 'FROM article a '             # SELECT a.*, c.name  
                . 'JOIN category c '            # FROM article a
                . 'ON a.category_id = c.id';    # JOIN category c
                                                # ON a.category_id = c.id;
                                                # EOS;
        
        $dbArticles = $this->db->fetchAll($query);
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            $article = $this->buildArticleFromArray($dbArticle);
            $articles[] = $article;
        }
        
        return $articles;
    }
    
    public function find ($id){
        
        $query = 'SELECT a.*,c.name '
                . 'FROM article a '
                . 'JOIN category c '
                . 'ON a.category_id = c.id '
                . 'WHERE a.id = :id';
        
        $dbArticle = $this->db->fetchAssoc(
                $query,
                [':id' => $id]
                );
        
        $article = $this->buildArticleFromArray($dbArticle);
        
        return $article;
    }
    
    public function findByCategory($category){
        $query = 'SELECT a.*,c.name '
                . 'FROM article a '
                . 'JOIN category c '
                . 'ON a.category_id = c.id '
                . 'WHERE c.id = :id';
        
        $dbArticles = $this->db->fetchAll(
                $query,
                [':id' => $category->getId()]
                );
        
        $articles = [];
        
        foreach ($dbArticles as $dbArticle){
            $article = $this->buildArticleFromArray($dbArticle);
            $articles[] = $article;
        }
        
        return $articles;
    }

    public function insert(Article $article){
        $this->db->insert( 'article', 
                           ['title' => $article->getTitle(),
                            'short_content' => $article->getShort_content(),
                            'content' => $article->getContent(),
                            'category_id' => $article->getCategoryId(),
                           ]);
    }
    
    public function update(Article $article){
        $this->db->update( 'article', # nom de la table
                           ['title' => $article->getTitle(),
                            'short_content' => $article->getShort_content(),
                            'content' => $article->getContent(),
                            'category_id' => $article->getCategoryId(),   
                           ],
                           ['id' => $article->getId()]
                );
    }
    
    public function save(Article $article){
        
        if (!empty($article->getId())){
            $this->update($article);
        } else {
            $this->insert($article);
        }
    }
    
    public function delete(Article $article){
        $this->db->delete(
                'article',
                ['id'=> $article->getId()]
                );
    }
 
    /**
     * 
     * @param array $dbArticle
     * @return Article
     */
    private function buildArticleFromArray(array $dbArticle){
            $category = new Category;
            $category->setId($dbArticle['category_id'])
                     ->setName($dbArticle['name']);
            
            $article = new Article();
            $article->setId($dbArticle['id'])
                    ->setTitle($dbArticle['title'])
                    ->setShort_content($dbArticle['short_content'])
                    ->setContent($dbArticle['content'])
                    ->setCategory($category);
            
            return $article;
    }
}
