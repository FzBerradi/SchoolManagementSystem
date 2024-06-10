<!-- resources/views/documents/history/action.blade.php -->

<div class="flex align-items-center">
    <a class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip" title="Resend Document" href="{{ route('documents.history.resend', $id) }}">
        <span class="btn-inner">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M16 12H8"></path>
                <path d="M12 16L16 12L12 8"></path>
            </svg>
        </span>
    </a>
</div>