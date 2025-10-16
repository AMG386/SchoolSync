<?php

namespace App\Traits;

trait StudentTrait
{

    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Students',
            'breadcrumb' => [
                0 => [
                    'title' => 'Students'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New Student',
                    'url' => 'students/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'students',
                ]
            ],
        ]);
    }

    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New Student',
            'breadcrumb' => [
                0 => [
                    'title' => 'Students',
                    'page' => 'students'
                ],
                1 => [
                    'title' => 'Create New Student',
                ],
            ],

        ]);
    }

    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'Student Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Students',
                    'page' => 'students'
                ],
                1 => [
                    'title' => $element->first_name ?? '---',
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'Edit',
                    'url' => 'students/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'students/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'students/' . $element->id,
            ],
            'back-button' => [
                'url' => 'students'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit Student',
            'breadcrumb' => [
                0 => [
                    'title' => 'Students',
                    'page' => 'students'
                ],
                1 => [
                    'title' => $element->first_name . ' ' . $element->last_name,
                    'page' => 'students/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],

        ]);
    }
}
