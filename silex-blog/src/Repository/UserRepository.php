<?php

namespace Repository;

use Entity\User;

class UserRepository extends RepositoryAbstract{
    
    public function insert(User $user)
    {
        $this->db->insert(
                'user',
                [
                    'lastname' => $user->getLastname(),
                    'firstname' => $user->getFirstname(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword()
                ]);
    }
}
