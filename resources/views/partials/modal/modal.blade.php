<!-- resources/views/partials/_document_request_modal.blade.php -->



<div class="modal fade" id="attestationModal" tabindex="-1" aria-labelledby="attestationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentRequestModalLabel">Demande d'attestation de scolarité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form id="documentRequestForm" action="{{ route('document-request.atts') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <div class="col">
                        <label class="form-label" for="title">Mr (Mlle):</label>
                        <input required type="text" class="form-control" id="title" name="title" placeholder="mr (mlle)">
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col">
                                <label class="form-label" for="dob">Date de naissance:</label>
                                <input required type="date" class="form-control" id="dob" name="dob" placeholder="Date de naissance">
                            </div>
                            <div class="col">
                                <label class="form-label" for="lieu">lieu de naissance:</label>
                                <input required type="text" class="form-control" id="lieu" name="lieu" placeholder="lieu de naissance">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="cin">CIN:</label>
                                <input required type="text" class="form-control" id="cin" name="cin" placeholder="CIN">
                            </div>
                            <div class="col">
                                <label class="form-label" for="cne">CNE:</label>
                                <input required type="text" class="form-control" id="cne" name="cne" placeholder="CNE">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="apogee">N° D’Apogée:</label>
                        <input required type="text" class="form-control" id="apogee" name="apogee" placeholder="N° D’Apogée">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ensa">Est inscrit(e) à l’ENSA de Tétouan, en:</label>
                        <input required type="text" class="form-control" id="ensa" name="ensa" placeholder="en">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date">Fait à Tétouan, le:</label>
                        <input required type="date" class="form-control" id="date" name="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="releveModal" tabindex="-1" aria-labelledby="releveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentRequestModalLabel">Demande de relevé de notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form id="documentRequestForm" action="{{ route('document-request.rn') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Mr (Mlle):</label>
                        <input required type="text" class="form-control" id="title" name="title" placeholder="Mr (Mlle):" required >
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="cin" class="form-label">CIN</label>
                            <input required type="text" class="form-control" id="cin" name="cin" placeholder="cin" required >
                        </div>
                        <div class="col">
                            <label for="cne" class="form-label">CNE</label>
                            <input required type="text" class="form-control" id="cne" name="cne" placeholder="cne" required >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="apogee" class="form-label">N° D’Apogée</label>
                            <input required type="text" class="form-control" id="apogee" name="apogee" placeholder="N° d’Apogée" required >
                        </div>
                        <div class="col">
                            <label for="session" class="form-label">Session</label>
                            <input required type="text" class="form-control" id="session" name="session" placeholder="session" required >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="conventionModal" tabindex="-1" aria-labelledby="conventionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentRequestModalLabel">Demande de convention de stage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form id="documentRequestForm"  action="{{ route('document-request.cs') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="full_name">Nom complet:</label>
                                <input required type="text" class="form-control" id="full_name" name="full_name" placeholder="Nom complet">
                            </div>
                            <div class="col">
                                <label class="form-label" for="type">Type:</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="2AP">2AP</option>
                                    <option value="CI1">CI1</option>
                                    <option value="CI2">CI2</option>
                                    <option value="CI3">CI3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company">La Société:</label>
                        <input required type="text" class="form-control" id="company" name="company" placeholder="La Société">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address">Adresse:</label>
                        <input required type="text" class="form-control" id="address" name="address" placeholder="Adresse">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="tel">Tél:</label>
                                <input required type="text" class="form-control" id="tel" name="tel" placeholder="Tél">
                            </div>
                            <div class="col">
                                <label class="form-label" for="email">Email:</label>
                                <input required type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="representative">Nom du représentant de la Société:</label>
                        <input required type="text" class="form-control" id="representative" name="representative" placeholder="Nom du représentant de la Société">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reussiteModal" tabindex="-1" aria-labelledby="reussiteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentRequestModalLabel">Demande d'attestation de réussite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('document-request.attr') }}" method="post">
					@csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Mr (Mlle):</label>
						<input required type="text" class="form-control" id="title" name="title" placeholder="mr (Mlle)">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="dob">Né(e) le:</label>
                                <input required type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="col">
                                <label class="form-label" for="placeOfBirth">à:</label>
                                <input required type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" placeholder="Lieu de naissance">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="cin">CIN:</label>
                                <input required type="text" class="form-control" id="cin" name="cin" placeholder="CIN">
                            </div>
                            <div class="col">
                                <label class="form-label" for="cne">Portant le CNE:</label>
                                <input required type="text" class="form-control" id="cne" name="cne" placeholder="CNE">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="exam">A réussi les examens de:</label>
                                <input required type="text" class="form-control" id="exam" name="exam" placeholder="Exam Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="major">Filière:</label>
                                <input required type="text" class="form-control" id="major" name="major" placeholder="Major">
                            </div>
                            <div class="col">
                                <label class="form-label" for="session">Session:</label>
                                <input required type="text" class="form-control" id="session" name="session" placeholder="Session">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="mb-0">La présente attestation est délivrée à l'intéressé(e) pour servir et valoir ce que le droit.</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date">Fait à Tétouan, le:</label>
                        <input required type="date" class="form-control" id="date" name="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>