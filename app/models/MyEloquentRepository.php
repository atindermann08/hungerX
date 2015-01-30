<?php

use Zizaco\Confide\EloquentRepository as EloquentRepository;
use Zizaco\Confide\RepositoryInterface;

class MyEloquentRepository extends EloquentRepository{
    
    public function getUserByEmailOrUsername($emailOrUsername)
    {
        $identity = [
            'mobile' => $emailOrUsername,
            'email' => $emailOrUsername
        ];

        return $this->getUserByIdentity($identity);
    }
}
