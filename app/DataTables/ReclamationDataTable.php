<?php

// App/DataTables/ReclamationDataTable.php

namespace App\DataTables;

use App\Models\Reclamation;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReclamationDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('user_full_name', function ($reclamation) {
                return optional($reclamation->userProfile->user)->full_name ?? '-';
            })
            ->editColumn('userProfile.CIN', function($query) {
                return $query->userProfile->CIN ?? '-';
            })
            ->addColumn('created_at_formatted', function ($reclamation) {
                // Format the created_at column using MySQL date_format
                return $reclamation->created_at->format('Y-m-d H:i:s'); 
                // Change the format as needed
            })
            ->addColumn('action', 'users.actionrec')
            ->rawColumns(['action','status']);
    }

    public function query(Reclamation $model)
    {
        return $model->newQuery()
            ->with(['userProfile']); // Eager load the user and user profile relationships
    }
    

    public function html()
    {
        return $this->builder()
            ->setTableId('dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row align-items-center"<"col-md-2" l><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">')
            ->parameters([
                "processing" => true,
                "autoWidth" => false,
            ]);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'user_full_name', 'name' => 'user_full_name', 'title' => 'nom et prénom', 'orderable' => false],
            ['data' => 'userProfile.CIN', 'name' => 'userProfile.CIN', 'title' => 'cin'],
            ['data' => 'object', 'name' => 'object', 'title' => 'Objet'],
            ['data' => 'subject', 'name' => 'subject', 'title' => 'Sujette'],
            ['data' => 'created_at_formatted', 'name' => 'created_at_formatted', 'title' => 'Date'],
            // Add other columns as needed
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(true)
                ->width(60)
                ->addClass('text-center hide-search'),
        ];
    }
}