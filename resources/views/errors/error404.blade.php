<x-guest-layout>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>

<div class="gradient">
    <div class="container">
        <img src="{{asset('images/error/404.png')}}" class="img-fluid mb-4 w-50" alt=""> 
        <h2 class="mb-0 mt-4 text-white">Oops! This Page is Not Found.</h2>
        <p class="mt-2 text-white">The requested page dose not exist.</p>
        @if(Auth::user() && Auth::user()->user_type == 'admin')
        <a class="btn bg-white text-primary d-inline-flex align-items-center" href="{{ route('dashboard') }}">Back to Home</a>
    @elseif(Auth::user() && Auth::user()->user_type == 'user')
        <a class="btn bg-white text-primary d-inline-flex align-items-center" href="{{ route('docs') }}">Back to Home</a>
    @endif    </div>
    <div class="box">
        <div class="c xl-circle">
            <div class="c lg-circle">
                <div class="c md-circle">
                    <div class="c sm-circle">
                        <div class="c xs-circle">                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
</x-guest-layout>