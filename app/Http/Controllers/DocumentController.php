<?php

namespace App\Http\Controllers;
use App\DataTables\DocumentDataTable;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use PhpOffice\PhpWord\TemplateProcessor;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use Mail;
use App\Mail\DemoMail;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Exception; // Add this line to import the Exception class
use ConvertApi\ConvertApi;



class DocumentController extends Controller
{
    public function index(Request $request, DocumentDataTable $dataTable)
    {
        $pageTitle = "La liste des demandes";
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        // $headerAction = '<a href="'.route('users.create').'" class="btn btn-sm btn-primary" role="button">Add User</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets'));
        // return $dataTable->render('documents');
    }
    public function accept(Document $document)
    {
        // Update document status to 'accepted'
        $document->update(['status' => 'accepted']);
    
        // Get the user associated with the document
        $user = $document->userProfile->user;
    
        if ($document->file === null || $document->file === '') {
            return redirect()->back()->withErrors(['error' => 'Aucun fichier à envoyer.']);
        }
        
        // Prepare email data
        $mailData = [
            'title' => 'Votre demande est acceptée',
            'body' => "Cher(e) {$user->first_name} {$user->last_name},
    
            Nous avons le plaisir de vous informer que votre demande concernant {$document->type} a été acceptée. Vous trouverez le document attaché à cet e-mail.
    
            Si vous avez des questions ou avez besoin d'informations supplémentaires, n'hésitez pas à nous contacter.
    
            Félicitations et merci!",
            'attachment' =>  storage_path('app/public/pdfs/' . $document->file),

        ];
  
        // Send email with attachment
        Mail::to($user->email)->send(new DemoMail($mailData));
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Document accepted successfully.');
    }

    public function refuse(Document $document, Request $request)
    {
        // Update document status to 'refused'
        $document->update(['status' => 'refused']);
    
        // Check if a new refusal_reason is provided in the request
        $refusalReason = $request->filled('refusal_reason') ? $request->refusal_reason : $document->refusal_reason;
    
        // Update document with the new or existing refusal_reason
        $document->update(['refusal_reason' => $refusalReason]);
    
        // Get the user associated with the document
        $user = $document->userProfile->user;
    
        // Prepare email data
        $mailData = [
            'title' => 'votre demande est refusée',
            'body' => "Cher(e) {$user->first_name} {$user->last_name},\n
            {$refusalReason}
            \n
            \n
            ,Nous vous remercions de votre compréhension."
        ];
    
        // Send email
        Mail::to('nourddine.benyahya02@gmail.com')->send(new DemoMail($mailData));
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Document refused successfully.');
    }
    


    private function resendRefusalMessage(Document $document)
    {
        // Your logic to resend the refusal message
         $request = new Request();
        $this->refuse($document,  $request);
    }
    
    private function resendAcceptedDocument(Document $document)
    {
        // Your logic to resend the accepted document
        $this->accept($document);
    }
    
        public function resend(Document $document)
        {
            // Check the status of the document
            if ($document->status === 'refused') {
                // Document was refused, resend the refusal message
                $this->resendRefusalMessage($document);
            } elseif ($document->status === 'accepted') {
                // Document was accepted, resend the document
                $this->resendAcceptedDocument($document);
            } else {
                // Handle other statuses if needed
                return redirect()->back()->with('error', 'Cannot resend document with this status.');
            }
        
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Document resent successfully.');
        }
    
        public function downloadDocument(Document $document)
        {
            // Check if the file exists
            if ($document->file === null || $document->file === '') {
                return redirect()->back()->withErrors(['error' => 'Aucun fichier à télécharger.']);
            }
        
            $filePath = storage_path('app/public/pdfs/' . $document->file);
        
            // Check if the file actually exists on the server
            if (!file_exists($filePath)) {
                return redirect()->back()->withErrors(['error' => 'Fichier non trouvé.']);
            }
        
            return response()->download($filePath, $document->type.'.pdf');
        }
        
        

    public function attr(Request $request)
    {    


        $userProfileId = auth()->user()->userProfile->id;
        $demandCount = Document::where('user_id', $userProfileId)
            ->where('type', 'ATTESTATION DE REUSSITE')
            ->where('status', 'pending')
            ->count();
    
        // If there are already 3 pending demands, return an error message
        if ($demandCount >= 3) {
            return redirect()->back()->withErrors(['message' => 'Vous avez déjà 3 demandes en attente de ce type.']);
        }


        // Get the form data
        $title = $request->input('title');
        $dob = $request->input('dob');
        $placeOfBirth = $request->input('placeOfBirth');
        $cin = $request->input('cin');
        $cne = $request->input('cne');
        $exam = $request->input('exam');
        $modules = $request->input('modules');
        $major = $request->input('major');
        $session = $request->input('session');
        $date = $request->input('date');
    
        // Load the Word template
        $template = new TemplateProcessor(storage_path('app/public/docs/AR.docx'));
    
        // Replace placeholders with form data
        $template->setValue('title', $title);
        $template->setValue('dob', $dob);
        $template->setValue('placeOfBirth', $placeOfBirth);
        $template->setValue('cin', $cin);
        $template->setValue('cne', $cne);
        $template->setValue('exam', $exam);
        $template->setValue('modules', $modules);
        $template->setValue('major', $major);
        $template->setValue('session', $session);
        $template->setValue('date', $date);
    
        // Save the modified Word document
        $name = uniqid();
        $outputPath = storage_path('app/public/savedocs/AR_' . $name . '.docx');
        $template->saveAs($outputPath);
    
    
              
        ConvertApi::setApiSecret('TZEwU8sa12nD7n0U');
        $result = ConvertApi::convert('pdf', [
        'File' => storage_path('app/public/savedocs/AR_' . $name . '.docx'),
        ], 'docx'
        );
        $result->saveFiles(storage_path('app/public/pdfs/'));

        Document::create([
            'user_id' => auth()->user()->userProfile->id, // Assuming you are saving the current user's ID
            'type' => 'ATTESTATION DE REUSSITE', // You might want to adjust this based on your needs
            'file' => 'AR_' . $name . '.pdf',
            'status' => 'pending', // Set the initial status as 'pending'
        ]);

        return redirect()->back()->withSuccess('Operation successful!');
    }


    public function atts(Request $request)
    {    
        $userProfileId = auth()->user()->userProfile->id;
        $demandCount = Document::where('user_id', $userProfileId)
            ->where('type', 'ATTESTATION DE SCOLARITE')
            ->where('status', 'pending')
            ->count();
    
        // If there are already 3 pending demands, return an error message
        if ($demandCount >= 3) {
            return redirect()->back()->withErrors(['message' => 'Vous avez déjà 3 demandes en attente de ce type.']);
        }
        // Get the form data
        $title = $request->input('title');
        $dob = $request->input('dob');
        $lieu = $request->input('lieu');
        $cin = $request->input('cin');
        $cne = $request->input('cne');
        $apogee = $request->input('apogee');
        $ensa = $request->input('ensa');
        $date = $request->input('date');
    
        // Load the Word template
        $template = new TemplateProcessor(storage_path('app/public/docs/AS.docx'));
    
        // Replace placeholders with form data
        $template->setValue('title', $title);
        $template->setValue('dob', $dob);
        $template->setValue('lieu', $lieu);
        $template->setValue('cin', $cin);
        $template->setValue('cne', $cne);
        $template->setValue('apogee', $apogee);
        $template->setValue('ensa', $ensa);
 
        $template->setValue('date', $date);
    
        // Save the modified Word document
        $name = uniqid();
        $outputPath = storage_path('app/public/savedocs/AS_' . $name . '.docx');
        $template->saveAs($outputPath);
    
       
        ConvertApi::setApiSecret('TZEwU8sa12nD7n0U');
        $result = ConvertApi::convert('pdf', [
        'File' => storage_path('app/public/savedocs/AS_' . $name . '.docx'),
        ], 'docx'
        );
        $result->saveFiles(storage_path('app/public/pdfs/'));

        Document::create([
            'user_id' => auth()->user()->userProfile->id, // Assuming you are saving the current user's ID
            'type' => 'ATTESTATION DE SCOLARITE', // You might want to adjust this based on your needs
            'file' => 'AS_' . $name . '.pdf',
            'status' => 'pending', // Set the initial status as 'pending'
        ]);

        return redirect()->back()->withSuccess('Operation successful!');
    }



public function cs(Request $request)
    {   
        
        $userProfileId = auth()->user()->userProfile->id;
        $demandCount = Document::where('user_id', $userProfileId)
            ->where('type', 'CONVENTION DE STAGE')
            ->where('status', 'pending')
            ->count();
    
        // If there are already 3 pending demands, return an error message
        if ($demandCount >= 3) {
            return redirect()->back()->withErrors(['message' => 'Vous avez déjà 3 demandes en attente de ce type.']);
        }


        // Get the form data
        $full_name = $request->input('full_name');
        $type = $request->input('type');
        $company = $request->input('company');
        $address = $request->input('address');
        $tel = $request->input('tel');
        $email = $request->input('email');
        $representative = $request->input('representative');
    
        // Load the Word template
        $template = new TemplateProcessor(storage_path('app/public/docs/CS.docx'));
    
        // Replace placeholders with form data
        $template->setValue('full_name', $full_name);
        $template->setValue('type', $type);
        $template->setValue('company', $company);
        $template->setValue('address', $address);
        $template->setValue('tel', $tel);
        $template->setValue('email', $email);
        $template->setValue('representative', $representative);
    
        // Save the modified Word document
        $name = uniqid();
        $outputPath = storage_path('app/public/savedocs/CS_' . $name . '.docx');
        $template->saveAs($outputPath);
    
       
              
        ConvertApi::setApiSecret('TZEwU8sa12nD7n0U');
        $result = ConvertApi::convert('pdf', [
        'File' => storage_path('app/public/savedocs/CS_' . $name . '.docx'),
        ], 'docx'
        );
        $result->saveFiles(storage_path('app/public/pdfs/'));

        Document::create([
            'user_id' => auth()->user()->userProfile->id, // Assuming you are saving the current user's ID
            'type' => 'CONVENTION DE STAGE', // You might want to adjust this based on your needs
            'file' => 'CS_' . $name . '.pdf',
            'status' => 'pending', // Set the initial status as 'pending'
        ]);

        return redirect()->back()->withSuccess('Operation successful!');
    }


    
public function rn(Request $request)
{    


    $userProfileId = auth()->user()->userProfile->id;
    $demandCount = Document::where('user_id', $userProfileId)
        ->where('type', 'RELEVÉ DE NOTE')
        ->where('status', 'pending')
        ->count();

    // If there are already 3 pending demands, return an error message
    if ($demandCount >= 3) {
        return redirect()->back()->withErrors(['message' => 'Vous avez déjà 3 demandes en attente de ce type.']);
    }

    // Get the form data
    $title = $request->input('title');
    $cin = $request->input('cin');
    $cne = $request->input('cne');
    $apogee = $request->input('apogee');
    $session = $request->input('session');
 

    // Load the Word template
    $template = new TemplateProcessor(storage_path('app/public/docs/RN.docx'));

    // Replace placeholders with form data
    $template->setValue('title', $title);
    $template->setValue('cin', $cin);
    $template->setValue('cne', $cne);
    $template->setValue('apogee', $apogee);
    $template->setValue('session', $session);


    // Save the modified Word document
    $name = uniqid();
    $outputPath = storage_path('app/public/savedocs/RN_' . $name . '.docx');
    $template->saveAs($outputPath);

    ConvertApi::setApiSecret('TZEwU8sa12nD7n0U');
    $result = ConvertApi::convert('pdf', [
    'File' => storage_path('app/public/savedocs/RN_' . $name . '.docx'),
    ], 'docx'
    );
    $result->saveFiles(storage_path('app/public/pdfs/'));

    Document::create([
        'user_id' => auth()->user()->userProfile->id, // Assuming you are saving the current user's ID
        'type' => 'RELEVÉ DE NOTE', // You might want to adjust this based on your needs
        'file' => 'RN_' . $name . '.pdf',
        'status' => 'pending', // Set the initial status as 'pending'
    ]);

    return redirect()->back()->withSuccess('Operation successful!');
}


}

