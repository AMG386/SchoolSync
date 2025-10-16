<?php

namespace App\Traits;

trait UserTrait
{

    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Users',
            'breadcrumb' => [
                0 => [
                    'title' => 'Settings',
                    'page' => '#'
                ],
                1 => [
                    'title' => 'Users'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New User',
                    'url' => 'users/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'users',
                ]
            ],
        ]);
    }
    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New User',
            'breadcrumb' => [
                0 => [
                    'title' => 'Users',
                    'page' => 'users'
                ],
                1 => [
                    'title' => 'Create New User',
                ],
            ],

        ]);
    }

    
    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'User Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Settings',
                    'page' => '#'
                ],
              
                1 => [
                    'title' => 'Users',
                    'page' => 'users'
                ],
                2 => [
                    'title' => $element->Name??'---',
                ],
            ],
            'buttons' => [
                
                0 => [
                    'title' => 'Edit',
                    'url' => 'users/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'users/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'users/' . $element->id,
            ],
            'back-button' => [
                'url' => 'users'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit User',
            'breadcrumb' => [
                0 => [
                    'title' => 'Users',
                    'page' => 'users'
                ],
                1 => [
                    'title' => $element->name,
                    'page' => 'users/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],


        ]);
    }

   
}
