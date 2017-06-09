<?php

namespace Repository;

use Doctrine\DBAL\Connection;

/**
 * Description of RepositoryAbstract
 *
 * @author Etudiant
 */
abstract class RepositoryAbstract {
    
      /**
     *
     * @var Connection
     */
      protected $db;
    
    public function __construct(Connection $db){
        $this->db =$db;
    }
}
