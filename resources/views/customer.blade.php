<x-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot>
    @if( $post )
    <div class="container">
        @php
        @endphp
        <div class="row text-center">
            <h3>{{ $post->title }}</h3>
            <h5>{{ date('Y-m-d', strtotime( $post->created_at )) }}</h5>
        </div>
        <div class="row">
            @if( $post->slug != 'contact' )
                <div class="col col4">
                    <img src="{{ \Storage::url( $post->thumbnail ) }}" alt="{{ $post->slug }}">
                </div>
                <div class="col col8">
                    {!! $post->excerpt !!}
                </div>
            @endif
        </div>
        <hr />
        <div class="row">
            <div class="col">
                {!! $post->content !!}
            </div>  
        </div>
    </div>
    @else
        pages here

        {{ $pages->links() }}
    @endif
    
</x-layout>