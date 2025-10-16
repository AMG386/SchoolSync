<?php

namespace App\Traits;

trait SchoolClassTrait
{
    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Classes',
            'breadcrumb' => [
                0 => [
                    'title' => 'Classes'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New Class',
                    'url' => 'schoolclasses/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'schoolclasses',
                ]
            ],
        ]);
    }

    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New Class',
            'breadcrumb' => [
                0 => [
                    'title' => 'Classes',
                    'page' => 'schoolclasses'
                ],
                1 => [
                    'title' => 'Create New Class',
                ],
            ],

        ]);
    }

    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'Class Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Classes',
                    'page' => 'schoolclasses'
                ],
                1 => [
                    'title' => $element->class_name ?? '---',
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'Edit',
                    'url' => 'schoolclasses/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'schoolclasses/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'schoolclasses/' . $element->id,
            ],
            'back-button' => [
                'url' => 'schoolclasses'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit Class',
            'breadcrumb' => [
                0 => [
                    'title' => 'Classes',
                    'page' => 'schoolclasses'
                ],
                1 => [
                    'title' => $element->class_name,
                    'page' => 'schoolclasses/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],

        ]);
    }
}
