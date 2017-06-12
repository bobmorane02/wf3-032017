<?php

namespace Service;

/**
 * Encode un mot de passe avec l'algo BCrypt
 * 
 * @param string $password 
 * @return string
 */
class UserManager {
    public function encodePassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
