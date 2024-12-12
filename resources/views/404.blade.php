<x-layout>
    <x-slot:title>
        {{ __('Page not found') }}
    </x-slot>
    <div class="container post-content">
        <div class="d-flex align-items-center justify-content-center vh-100">
	        <div class="text-center">
	            <h1 class="display-1 fw-bold">404</h1>
	            <p class="fs-3"> <span class="text-danger">{{ __('Opps!') }}</span> {{ __('Page not found.') }}</p>
	            <p class="lead">
	                {{ __('The page you’re looking for doesn’t exist.') }}
	            </p>
	            <a href="/" class="btn btn-primary">Go Home</a>
	        </div>
	    </div>
    </div>
</x-layout>