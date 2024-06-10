<div class="flex align-items-center list-user-action">

        <!-- Accept Button -->
        <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Accept Document" href="{{ route('documents.accept', $id) }}">
            <span class="btn-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </span>
        </a>

 <!-- Refuse Button -->
<a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#refuseModal{{ $id }}">
    <span class="btn-inner">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </span>
</a>

<!-- Modal -->
<div class="modal fade" id="refuseModal{{ $id }}" tabindex="-1" aria-labelledby="refuseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refuseModalLabel">Motif du refus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="refuseForm{{ $id }}" action="{{ route('documents.refuse', $id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="refusalReason{{ $id }}" class="form-label">Motif du refus</label>
                        <textarea class="form-control" id="refusalReason{{ $id }}" name="refusal_reason" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Refuser le document</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('refuseForm{{ $id }}').addEventListener('submit', function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form using JavaScript
        this.submit();
    });
</script>

        <!-- Download Button -->
        <a class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip" title="Download Document" href="{{ route('documents.download', $id) }}">
            <span class="btn-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
            </span>
        </a>
</div>