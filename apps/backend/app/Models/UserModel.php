<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::initialize();
        $this->allowedFields = [
            ...$this->allowedFields,
        ];
    }
}
