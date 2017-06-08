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
}
