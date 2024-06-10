<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\DataTables\ReclamationDataTable;
use App\Models\reclamation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;


class ReclamationController extends Controller
{
    public function index(Request $request, ReclamationDataTable $dataTable)
    {
        $pageTitle = "La liste des réclamations";
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        // $headerAction = '<a href="'.route('users.create').'" class="btn btn-sm btn-primary" role="button">Add User</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets'));
        // return $dataTable->render('documents');
    }

    public function store(Request $request)
    {
        $request->validate([
            'object' => 'required|string|max:255',
            'subject' => 'required|string',
            'file' => 'nullable|file|max:10240', // Assuming a maximum file size of 10 MB (10240 KB)
        ]);

        // Get the authenticated user's ID
        $user_id = auth()->user()->userProfile->id;

        // Save the reclamation to the database
        $reclamation = new Reclamation([
            'user_id' => $user_id,
            'object' => $request->input('object'),
            'subject' => $request->input('subject'),
        ]);

        // Handle file upload if provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('reclamation_files', $fileName, 'public'); // Assuming you have a storage disk named 'public'
            $reclamation->file = $fileName;
        }

        $reclamation->save();

        return redirect()->back()->withSuccess('Opération réussie!');
    }

public function downloadFile($reclamationId)
{
    $reclamation = Reclamation::findOrFail($reclamationId);

    // Check if the file exists
    if ($reclamation->file === null || $reclamation->file === '') {
        return redirect()->back()->withErrors(['error' => 'Aucun fichier à télécharger.']);
    }

    $filePath = storage_path('app\\public\\reclamation_files\\' . $reclamation->file);

    // Check if the file actually exists on the server
    if (!file_exists($filePath)) {
        return redirect()->back()->withErrors(['error' => 'Fichier non trouvé.']);
    }

    return response()->download($filePath);
}
}
