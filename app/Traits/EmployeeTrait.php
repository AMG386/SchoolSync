<?php

namespace App\Traits;

trait EmployeeTrait
{

    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Employees',
            'breadcrumb' => [
                0 => [
                    'title' => 'Employees'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New Employee',
                    'url' => 'employees/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'employees',
                ]
            ],
        ]);
    }
    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New Employee',
            'breadcrumb' => [
                0 => [
                    'title' => 'Employees',
                    'page' => 'employees'
                ],
                1 => [
                    'title' => 'Create New Employee',
                ],
            ],

        ]);
    }

    
    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'Employee Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Employees',
                    'page' => 'employees'
                ],
                1 => [
                    'title' => $element->first_name??'---',
                ],
            ],
            'buttons' => [
                
                0 => [
                    'title' => 'Edit',
                    'url' => 'employees/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'employees/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'employees/' . $element->id,
            ],
            'back-button' => [
                'url' => 'employees'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit Employee',
            'breadcrumb' => [
                0 => [
                    'title' => 'Employees',
                    'page' => 'employees'
                ],
                1 => [
                    'title' => $element->name,
                    'page' => 'employees/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],


        ]);
    }

   
}
