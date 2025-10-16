<?php

namespace App\Traits;

trait SubjectTrait
{
    public function pageSummaryIndex()
    {
        \View::share('page_summary', [
            'title' => 'Subjects',
            'breadcrumb' => [[ 'title' => 'Subjects' ]],
            'buttons' => [[
                'title' => 'New Subject',
                'url' => 'subjects/create',
                'icon' => 'plus',
                'bg' => 'primary',
                'modal' => true,
                'redirect' => 'subjects',
            ]],
        ]);
    }

    public function pageSummaryCreate()
    {
        \View::share('page_summary', [
            'title' => 'Create New Subject',
            'breadcrumb' => [
                [ 'title' => 'Subjects', 'page' => 'subjects' ],
                [ 'title' => 'Create New Subject' ]
            ],
        ]);
    }

    public function pageSummaryShow($element)
    {
        \View::share('page_summary', [
            'title' => 'Subject Details',
            'breadcrumb' => [
                [ 'title' => 'Subjects', 'page' => 'subjects' ],
                [ 'title' => $element->subject_name ?? '---' ]
            ],
            'buttons' => [[
                'title' => 'Edit',
                'url' => 'subjects/' . $element->id . '/edit',
                'icon' => 'edit',
                'bg' => 'secondary',
                'modal' => true,
                'redirect' => 'subjects/' . $element->id,
            ]],
            'delete-button' => [ 'url' => 'subjects/' . $element->id ],
            'back-button' => [ 'url' => 'subjects' ],
        ]);
    }

    public function pageSummaryEdit($element)
    {
        \View::share('page_summary', [
            'title' => 'Edit Subject',
            'breadcrumb' => [
                [ 'title' => 'Subjects', 'page' => 'subjects' ],
                [ 'title' => $element->subject_name, 'page' => 'subjects/' . $element->id ],
                [ 'title' => 'Edit' ]
            ],
        ]);
    }
}
