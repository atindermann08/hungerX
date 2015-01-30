<?php

use Zizaco\Confide\UserValidator as ConfideUserValidator;
use Zizaco\Confide\UserValidatorInterface;
use Zizaco\Confide\ConfideUserInterface;

class UserValidator extends ConfideUserValidator 
{
    public $rules = [
        'create' => [  
            'first_name' => 'required|alpha',      
            'last_name' => 'required|alpha',
            'mobile' => 'required|regex:/^(\+91)?[6-9][0-9]{9}$/',
            'email' => 'required|email',
            'password' => 'required|min:7',     
        ],
        'update' => [  
            'first_name' => 'required|alpha',      
            'last_name' => 'required|alpha',
            'mobile' => 'required|regex:/^(\+91)?[6-9][0-9]{9}$/',
            'email' => 'required|email',
            'password' => 'required|min:7',          
        ],
    ];
    
    public function validateIsUnique(ConfideUserInterface $user)
    {
        $identity = [
            'email'    => $user->email,
            'mobile' => $user->mobile,
        ];

        foreach ($identity as $attribute => $value) {

            $similar = $this->repo->getUserByIdentity([$attribute => $value]);

            if (!$similar || $similar->getKey() == $user->getKey()) {
                unset($identity[$attribute]);
            } else {
                $this->attachErrorMsg(
                    $user,
                    'confide::confide.alerts.duplicated_credentials',
                    $attribute
                );
            }

        }

        if (!$identity) {
            return true;
        }

        return false;
    }
}