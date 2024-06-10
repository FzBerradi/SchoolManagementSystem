<?php

namespace App\DataTables;

use App\Models\Document;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DocumentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('user_full_name', function ($document) {
                return optional($document->userProfile->user)->full_name ?? '-';
            })
            ->editColumn('userProfile.CIN', function($query) {
                return $query->userProfile->CIN ?? '-';
            })
            ->addColumn('status', function ($document) {
                $status = 'warning';
                switch ($document->status) {
                    case 'accepted':
                        $status = 'success';
                        break;
                    case 'pending':
                        $status = 'warning';
                        break;
                    case 'refused':
                        $status = 'danger';
                        break;
                }
                return '<span class="text-capitalize badge bg-' . $status . '">' . $document->status . '</span>';
            })
            ->addColumn('created_at_formatted', function ($document) {
                // Format the created_at column using MySQL date_format
                return $document->created_at->format('Y-m-d H:i:s'); 
                // Change the format as needed
            })
            ->addColumn('action', 'users.actiondoc')
            ->rawColumns(['action', 'status']);
    }

    public function query(Document $model)
    {
        return $model->newQuery()
        ->with(['userProfile']) // Eager load the user and user profile relationships
        ->where('status', 'pending'); // Add this condition to select only documents with "pending" status        
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
            ['data' => 'type', 'name' => 'type', 'title' => 'Type de document'],
            ['data' => 'created_at_formatted', 'name' => 'created_at_formatted', 'title' => 'Date'], // Add this line
            ['data' => 'status', 'name' => 'status', 'title' => 'Statut'],
            // Add other columns as needed
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->width(60)
                ->addClass('text-center hide-search'),
        ];
    }
}
