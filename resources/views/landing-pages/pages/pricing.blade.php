<x-app-layout layout="landing" >
    <x-landing-pages.widgets.sub-header subTitle="Demandes de Documents" subBreadcrume="Demandes de Documents" />
    <style>
        /* Add this style block to your HTML or your CSS file */
    
        .card:hover {
            background-color: #007bff; /* Change this to the desired hover background color */
        }
    
        .card:hover p,
        .card:hover h5,
        .card:hover .btn {
            color: #fff !important; /* Change this to the desired hover text color */
        }
    
        .card:hover .btn {
            background-color: #bac7d3 !important; /* Change this to the desired hover button background color */
        }
    </style>
    <script type="text/javascript">
        {{-- Success Message --}}
        @if(session('success'))
        Swal.fire({
        icon: 'success',
        title: 'Done',
        text: '{{ Session::get("success") }}',
        confirmButtonColor: "#3a57e8"
        });
        @endif
        {{-- Errors Message --}}
        @if (Session::has('error'))
        Swal.fire({
        icon: 'error',
        title: 'Opps!!!',
        text: '{{Session::get("error")}}',
        confirmButtonColor: "#3a57e8"
        });
        @endif
        @if(Session::has('errors') || ( isset($errors) && is_array($errors) && $errors->any()))
        Swal.fire({
        icon: 'error',
        title: 'Opps!!!',
        text: '{{Session::get("errors")->first() }}',
        confirmButtonColor: "#3a57e8"
        });
        @endif
    </script>
    
    <div class="section-card-padding">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <p class="mb-2 text-uppercase text-primary">
                        Demande de Documents
                    </p>
                    <h2 class="text-secondary mb-4">le choix de<span class="text-primary"> Document</span></h2>
                </div>
            </div>
            @if ($errors->has('message'))
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="mb-2 text-primary">
                                Demande d'attestation de scolarité
                            </p>
                            <h5 class="mb-3">attestation de scolarité</h5>
                            <p class="border-bottom pb-4">Vous recevrez le document dans votre email sous 24 heures.</p>
                            <a href="#" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#attestationModal">Demande</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="mb-2 text-primary">
                                Demande le relevé de notes
                            </p>
                            <h5 class="mb-3">relevé de notes</h5>
                            <br>
                            <br>
                            <p class="border-bottom pb-4">Vous recevrez le document dans votre email sous 24 heures.</p>
                            <a href="#" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#releveModal">Demande</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="mb-2 text-primary">
                                Demande la convention de stage
                            </p>
                            <h5 class="mb-3">convention de stage</h5>
                            <p class="border-bottom pb-4">Vous recevrez le document dans votre email sous 24 heures.</p>
                            <a href="#" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#conventionModal">Demande</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="mb-2 text-primary">
                                Demande attestation de réussite
                            </p>
                            <h5 class="mb-3">attestation de réussite</h5>
                            <p class="border-bottom pb-4">Vous recevrez le document dans votre email sous 24 heures.</p>
                            <a href="#" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#reussiteModal">Demande</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.modal.modal')
        </div>
    </div>
</x-app-layout>

<script>
    function setDocumentType(type, modalId) {
        document.getElementById(modalId + 'DocumentType').value = type;
    }
</script>
