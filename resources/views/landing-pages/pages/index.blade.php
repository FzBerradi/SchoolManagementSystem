<x-app-layout layout="landing">
    <style>
        .banner-one-app {
            padding: 2.25rem 0rem 22.750rem 0.675rem;
        }
    </style>
    <div class="banner-one-app">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 banner-one-img text-center ms-2 ms-sm-0">
                    <img src="{{ asset('images/landing-pages/images/home-1/landingpageimage-.png') }}" alt=""
                        class="img-fluid ">
                </div>
                <div class="col-sm-6 inner-box">
                    <p class="mb-2 text-uppercase text-secondary">
                        Obtenez vos documents rapidement
                    </p>
                    <h1 class="text-secondary mb-4">en un <span class="text-primary">Clique</span></h1>
                    <p class="mb-5">Notre application simplifie le processus de demande de documents et de soumission de réclamations. Obtenez vos documents scolaires en un rien de temps et partagez vos préoccupations avec nous.</p>
                    <div class="d-flex align-items-center store-btn">
                        <a href="{{ route('userlogin') }}" class="btn btn-primary">Demander des documents</a>
                        <a href="{{ route('userlogin') }}" class="btn btn-secondary ms-3">Soumettre des réclamations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-secondary features-card">
        <div class="container">
            <div class="row mx-2 mx-sm-0">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 top-feature">
                    <div class="text-right">
                        <p class="mb-2 text-white text-uppercase">Pourquoi notre application est géniale</p>
                        <h2 class="mb-3 text-white notch-feature-txt">Fonctionnalités exceptionnelles </h2>
                        <p class="mb-5 text-white pb-5">Il est établi de longue date qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regardera sa mise en page.</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-sm-2 row-cols-lg-4">
                <div class="col">
                    <div class="card services-box  rounded-1">
                        <div class="card-body">
                            <h4 class="mb-3">Demande d'attestation de scolarité</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.45109 0.343108L5.46396 1.36387L10.0063 1.42104L0.0568434 11.3704L0.787737 12.1013L10.7371 2.15194L10.7943 6.6942L11.8151 6.70706L11.736 0.422159L5.45109 0.343108Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card services-box  rounded-1">
                        <div class="card-body">
                            <h4 class="mb-3">Demande de relevé de notes</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.45109 0.343108L5.46396 1.36387L10.0063 1.42104L0.0568434 11.3704L0.787737 12.1013L10.7371 2.15194L10.7943 6.6942L11.8151 6.70706L11.736 0.422159L5.45109 0.343108Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card services-box  rounded-1">
                        <div class="card-body">
                            <h4 class="mb-3">Demande de convention de stage</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.45109 0.343108L5.46396 1.36387L10.0063 1.42104L0.0568434 11.3704L0.787737 12.1013L10.7371 2.15194L10.7943 6.6942L11.8151 6.70706L11.736 0.422159L5.45109 0.343108Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card services-box  rounded-1">
                        <div class="card-body">
                            <h4 class="mb-3">Demande d'attestation de réussite</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.45109 0.343108L5.46396 1.36387L10.0063 1.42104L0.0568434 11.3704L0.787737 12.1013L10.7371 2.15194L10.7943 6.6942L11.8151 6.70706L11.736 0.422159L5.45109 0.343108Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-2 text-secondary text-uppercase">
                        À propos de nous
                    </p>
                    <h2 class="text-secondary mb-4">Ce qu'ils disent <br> <span class="text-primary">À notre sujet</span></h2>
                    <p class="mb-5">Il est établi de longue date qu'un lecteur sera distrait par le contenu lisible d'une page lorsqu'il regardera sa mise en page. </p>
                    <a href="{{ route('userlogin') }}" class="btn btn-primary">Commencer</a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
