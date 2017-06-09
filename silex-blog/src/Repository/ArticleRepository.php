<?php

namespace Repository;

use Entity\Article;

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
        $dbArticles = $this->db->fetchAll('SELECT * FROM article');
        $articles = [];
        
        foreach ($dbArticles as $dbArticle) {
            $article = new Article();
            $article->setId($dbArticle['id'])
                    ->setTitle($dbArticle['title'])
                    ->setShort_content($dbArticle['short_content'])
                    ->setContent($dbArticle['content']);                         
            $articles[] = $article;
        }
        
        return $articles;
    }
    
    public function find ($id){
        $dbArticles = $this->db->fetchAssoc(
                'SELECT * FROM article WHERE id = :id',
                [':id' => $id]
                );
        $article = new Article();
        $article->setId($dbArticles['id'])
                ->setTitle($dbArticles['title'])
                ->setShort_content($dbArticles['short_content'])
                ->setContent($dbArticles['content']);
        return $article;
    }

    public function insert(Article $article){
        $this->db->insert( 'article', 
                           ['title' => $article->getTitle(),
                            'short_content' => $article->getShort_content(),
                            'content' => $article->getContent(),
                           ]);
    }
    
    public function update(Article $article){
        $this->db->update( 'article', # nom de la table
                           ['title' => $article->getTitle(),
                            'short_content' => $article->getShort_content(),
                            'content' => $article->getContent(),
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
    
}
