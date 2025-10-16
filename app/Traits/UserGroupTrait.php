<?php

namespace App\Traits;

trait UserGroupTrait
{

    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'User Groups',
            'breadcrumb' => [
                0 => [
                    'title' => 'Settings',
                    'page' => '#'
                ],
                1 => [
                    'title' => 'User Groups'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New User Group',
                    'url' => 'usergroups/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'usergroups',
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
                    'title' => 'Settings',
                    'page' => '#'
                ],
                1 => [
                    'title' => 'Users',
                    'page' => 'users'
                ],
                2 => [
                    'title' => 'Create New User',
                ],
            ],

        ]);
    }

    
    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'User Group Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Settings',
                    'page' => '#'
                ],
                1 => [
                    'title' => 'User Groups',
                    'page' => 'usergroups'
                ],
                1 => [
                    'title' => $element->group_name??'---',
                ],
            ],
            'buttons' => [
                
                0 => [
                    'title' => 'Edit',
                    'url' => 'usergroups/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'usergroups/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'usergroups/' . $element->id,
            ],
            'back-button' => [
                'url' => 'usergroups'
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
