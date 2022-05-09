<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $new_product = [
      'nameField' => 'required',
      'priceField' => 'required|number_format',
      'imageField' => 'uploaded[imageField]|mime_in[imageField,image/jpg,image/jpeg,image/png,image/gif]|max_size[imageField,2048]',
    ];

    public $new_product_errors = [
      'nameField' => [
        'required' => 'Product name is required.',
      ],
      'priceField' => [
        'required' => 'Product price is required.',
        'number_format' => 'Product price should be a number.',
      ],
      'imageField' => [
        'uploaded' => 'Product image is required.',
        'mime_in' => 'Only file with this extension are allowed: .jpg, .jpeg, .png, .gif.',
        'max_size' => 'Maximum upload file: 2 MB.',
      ],
    ];
}
