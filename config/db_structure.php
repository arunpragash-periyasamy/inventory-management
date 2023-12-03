<?php

$post_table_data = [
    "add_product" => [
        "tables" => [
            "product_table" => [
                "columns" => ["column1", "column2"],
            ],
            "category_table" => [
                "columns" => ["column1", "column2"],
            ],
        ],
    ],
    "add_purchase" => [
        "tables" => [
            "purchase_table" => [
                "columns" => ["column1", "column2"],
            ],
        ],
    ],
    "new_user" => [
        "tables" => [
            "user" => [
                "columns" => ["user_name", "mobile_number", "email", "role", "password"],
            ],
        ],
    ],
];


$get_table_data = [
    "add_sub_category" => [
        "tables" => [
            "options" => [
                "add_category" => [
                    "columns" => ["id", "category_name", "category_code"],
                    "name" => "category"
                ],
            ],
            "form_data" => [
                "add_sub_category" => [
                    "columns" => ["id"],
                    "where" => "id",
                    "name" => "form_data"
                ]
            ],
        ],
    ],
    "add_product" => [
        "tables" => [
            "product_table" => [
                "columns" => ["column1", "column2"],
            ],
            "category_table" => [
                "columns" => ["column1", "column2"],
            ],
        ],
    ],
    "add_purchase" => [
        "tables" => [
            "purchase_table" => [
                "columns" => ["column1", "column2"],
            ],
        ],
    ],
];
