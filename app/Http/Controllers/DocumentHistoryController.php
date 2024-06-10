<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentHistoryDataTable;
use App\Models\Document;
use App\DataTables\DocumentDataTable;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;


class DocumentHistoryController extends Controller
{
    public function index(DocumentHistoryDataTable $dataTable)
    {
        $pageTitle = "La liste des Historique ";
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        // $headerAction = '<a href="'.route('users.create').'" class="btn btn-sm btn-primary" role="button">Add User</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets'));
        // return $dataTable->render('documents');
    }

}
