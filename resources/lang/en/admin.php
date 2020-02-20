<?php

return [
    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'email' => "Email",
            'email_verified_at' => "Email verified at",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],
    'menu' => [
        'title' => 'Menus',

        'actions' => [
            'index' => 'Menus',
            'create' => 'New Menu',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'label' => "Label",
            'url' => "Url",
            'type' => "Type",
            'order' => "Order",
            'parent_id' => "Parent",
            
        ],
    ],
    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'header_subtitle'=>' Header subtitle',
            'slug' => "Slug",
            'type' => "Type",
            'created_at' => "Created at",
            'published_at' => "Published at",
            'enabled' => "Enabled",
            
        ],
    ],
    'block' => [
        'title' => 'Blocks',

        'actions' => [
            'index' => 'Blocks',
            'create' => 'New Block',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'data' => "Data",
            'order' => "Order",
            'post_id' => "Post",
            'chose_post_id' => "Chose post"
        ],
    ],
    'hero' => [
        'title' => 'Heroes',

        'actions' => [
            'index' => 'Heroes',
            'create' => 'New Hero',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'template' => "Template",
            'slug' => "Slug",
            'post_id' => "Post",
            'chose_post_id' => "Chose post",
            'chose_slides' => "Chose slides",
        ],
    ],
    'slide' => [
        'title' => 'Slides',

        'actions' => [
            'index' => 'Slides',
            'create' => 'New Slide',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'slug' => "Slug",
            'fields' => "Fields",
            'template' => "Template",
            'chose_template' => 'Chose template'
        ],

        'field' => [
            'year' => 'Year',
            'work_done' => 'Work Done',
            'website' => 'Website',
            'title' => 'Title',
            'description' => 'Description',
        ]
    ],

    'meta' => [
        'title' => 'Metas',

        'actions' => [
            'index' => 'Metas',
            'create' => 'New Meta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'content' => "Content",
            'property' => "Property",
            'chose_posts' => "Chose posts"
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'slug' => "Slug",
            'description' => "Description",
            
        ],
    ],

    'contact' => [
        'title' => 'Contacts',

        'actions' => [
            'index' => 'Contacts',
            'create' => 'New Contact',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'email' => "Email",
            'company' => "Company",
            'project_details' => "Project details",
            
        ],
    ],

    'setting' => [
        'title' => 'Settings',

        'actions' => [
            'index' => 'Settings',
            'create' => 'New Setting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'slug' => "Slug",
            'fields' => "Fields",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];