<?php

namespace Entity;

/**
 * Description of Article
 *
 * @author Etudiant
 */
class Article {
    
    /**
     *
     * @var int 
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $title;
    
    /**
     *
     * @var string
     */
    private $content;
    
    /**
     *
     * @var string
     */
    private $short_content;
    
    /**
     *
     * @var Category
     */
    private $category;
    
    /**
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 
     * @return string
     */
    public function getShort_content()
    {
        return $this->short_content;
    }

    /**
     * 
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * 
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 
     * @param string $short_content
     * @return $this
     */
    public function setShort_content($short_content)
    {
        $this->short_content = $short_content;
        return $this;
    }
    
    /**
     * 
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * 
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * 
     * @return int|null
     */
    public function getCategoryId(){
        if (!is_null($this->category)){
            return $this->category->getId();
        }
        return null;
    }
    
    /**
     * 
     * @return string
     */
    public function getCategoryName(){
        if (!is_null($this->category)){
            return $this->category->getName();
        }
        return '';
    }
}

