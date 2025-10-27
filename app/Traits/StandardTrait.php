<?php

namespace App\Traits;

trait StandardTrait
{
    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Standards',
            'breadcrumb' => [
                0 => [
                    'title' => 'Standards'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New Standard',
                    'url' => 'standards/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'standards',
                ]
            ],
        ]);
    }

    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New Standard',
            'breadcrumb' => [
                0 => [
                    'title' => 'Standards',
                    'page' => 'standards'
                ],
                1 => [
                    'title' => 'Create New Standard',
                ],
            ],

        ]);
    }

    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'Standard Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Standards',
                    'page' => 'standards'
                ],
                1 => [
                    'title' => $element->standard ?? '---',
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'Edit',
                    'url' => 'standards/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'standards/' . $element->id,
                ]
            ],
            // 'delete-button' => [
            //     'url' => 'standards/' . $element->id,
            // ],
            'back-button' => [
                'url' => 'standards'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit Standard',
            'breadcrumb' => [
                0 => [
                    'title' => 'Standards',
                    'page' => 'standards'
                ],
                1 => [
                    'title' => $element->standard,
                    'page' => 'standards/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],

        ]);
    }
}
