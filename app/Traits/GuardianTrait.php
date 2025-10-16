<?php

namespace App\Traits;

trait GuardianTrait
{

    public function pageSummaryIndex()
    {
        \View::share('page_summary', [

            'title' => 'Guardians',
            'breadcrumb' => [
                0 => [
                    'title' => 'Guardians'
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'New Guardian',
                    'url' => 'guardians/create',
                    'icon' => 'plus',
                    'bg' => 'primary',
                    'modal' => true,
                    'redirect' => 'guardians',
                ]
            ],
        ]);
    }

    public function pageSummaryCreate()
    {
        \View::share('page_summary', [

            'title' => 'Create New Guardian',
            'breadcrumb' => [
                0 => [
                    'title' => 'Guardians',
                    'page' => 'guardians'
                ],
                1 => [
                    'title' => 'Create New Guardian',
                ],
            ],

        ]);
    }

    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [

            'title' => 'Guardian Details',
            'breadcrumb' => [
                0 => [
                    'title' => 'Guardians',
                    'page' => 'guardians'
                ],
                1 => [
                    'title' => $element->name ?? '---',
                ],
            ],
            'buttons' => [
                0 => [
                    'title' => 'Edit',
                    'url' => 'guardians/' . $element->id . '/edit',
                    'icon' => 'edit',
                    'bg' => 'secondary',
                    'modal' => true,
                    'redirect' => 'guardians/' . $element->id,
                ]
            ],
            'delete-button' => [
                'url' => 'guardians/' . $element->id,
            ],
            'back-button' => [
                'url' => 'guardians'
            ],

        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [

            'title' => 'Edit Guardian',
            'breadcrumb' => [
                0 => [
                    'title' => 'Guardians',
                    'page' => 'guardians'
                ],
                1 => [
                    'title' => $element->name,
                    'page' => 'guardians/' . $element->id
                ],
                2 => [
                    'title' => 'Edit',
                ],
            ],

        ]);
    }
}
