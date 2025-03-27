<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $signup = [
        //'first_name' => 'required|alpha_space|min_length[2]|max_length[50]',
        //'last_name'  => 'required|alpha_space|min_length[2]|max_length[50]',
        'username'   => 'required|alpha_numeric|min_length[3]|max_length[30]|is_unique[users.username]',
        'email'      => 'required|valid_email',
        'password'   => 'required|min_length[8]|max_length[255]',
        //'confirmPassword' => 'required|matches[password]',
    ];
}
