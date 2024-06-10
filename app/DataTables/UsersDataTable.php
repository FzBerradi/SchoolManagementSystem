<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filterColumn('full_name', function($query, $keyword) {
                $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
                return $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('userProfile.street_addr_1', function($query) {
                return $query->userProfile->street_addr_1 ?? '-';
            })
            ->editColumn('userProfile.pin_code', function($query) {
                return $query->userProfile->pin_code ?? '-';
            })
            ->editColumn('userProfile.linkedin_url', function($query) {
                return $query->userProfile->linkedin_url ?? '-';
            })
            ->editColumn('userProfile.CIN', function($query) {
                return $query->userProfile->CIN ?? '-';
            })
            ->editColumn('userProfile.phone_number', function($query) {
                return $query->userProfile->phone_number ?? '-';
            })
            ->addColumn('created_at_formatted', function ($userProfile) {
                return $userProfile->created_at->format('Y-m-d H:i:s'); 
            })
            ->addColumn('action', 'users.action')
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = User::query()->with('userProfile');
        return $this->applyScopes($model);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'id'],
            ['data' => 'full_name', 'name' => 'full_name', 'title' => 'nom et prénom', 'orderable' => false],
            ['data' => 'userProfile.CIN', 'name' => 'userProfile.CIN', 'title' => 'cin'],
            ['data' => 'userProfile.phone_number', 'name' => 'userProfile.phone_number', 'title' => 'Numéro de téléphone'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'userProfile.pin_code', 'name' => 'userProfile.pin_code', 'title' => 'code apogée'],
            ['data' => 'userProfile.street_addr_1', 'name' => 'userProfile.street_addr_1', 'title' => 'adresse'],
            ['data' => 'created_at_formatted', 'name' => 'created_at_formatted', 'title' => 'Date'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }

}
