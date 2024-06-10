<x-app-layout layout="landing" :isHeader1=true>
    <x-landing-pages.widgets.sub-header subTitle="réclamation" subBreadcrume="réclamation"/>

<div class="section-padding bg-secondary">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="row">
            <div class="col-md-6">
                <p class="mb-2 text-uppercase text-white">
                    réclamation
                </p>
                <h2 class="text-white mb-4">Une problème ? <br> Entrer en contact.</h2>
                <img src="{{asset('images/landing-pages/images/home-4/contact.webp')}}" alt="" class="img-fluid" loading="lazy">
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
            <form action="{{ route('reclamation.store') }}" method="post" enctype="multipart/form-data">
                @csrf
               
                    <div class="form-group">
                        <label for="your-subject" class="form-label">Objet du message</label>
                        <input type="text" name="object" class="form-control" id="your-subject" placeholder="Objet du message" required>
                    </div>
                    <div class="form-group">
                        <label for="customFile1" class="form-label custom-file-input">Choisir le fichier</label>
                        <input name="file" class="form-control" type="file" id="customFile1">
                    </div>
                    <div class="form-group mb-3">
                        <label for="your-message" class="form-label">Subject</label>
                        <textarea name="subject" rows="10" class="form-control" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>     
            </form>
        </div>
        </div>
    </div>

</div>
</x-app-layout>
