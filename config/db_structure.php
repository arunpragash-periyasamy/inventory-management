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
];


$get_table_data = [
    "add_sub_category" => [
        "tables" => [
            "add_category" => [
                "columns" => ["id", "category_name", "category_code"],
                "name" => "category"
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


?>