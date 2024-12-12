<x-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot>
    <div class="container post-content">
        @php
        @endphp
        <div class="row text-center">
            <h3>{{ $post->title }}</h3>
            <h5>{{ date('Y-m-d', strtotime( $post->updated_at )) }}</h5>
        </div>
        <div class="row">
            @if( $post->slug != 'contact' )
                <div class="col col-12 col-md-4 text-center">
                    <img src="{{ \Storage::url( $post->thumbnail ) }}" alt="{{ $post->slug }}">
                </div>
                <div class="col col-12 col-md-8">
                    {!! str( $post->excerpt )->markdown()->sanitizeHtml() !!}
                </div>
            @endif
        </div>
        <hr />
        <div class="row">
            <div class="col">
                {!! str( $post->content )->markdown()->sanitizeHtml() !!}
            </div>  
        </div>
    </div>
    
</x-layout>