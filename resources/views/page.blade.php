<x-layout>
    <x-slot:title>
        {{ $page->title }}
    </x-slot>
    @if( $page )
    <div class="container page-content">
        @php
        @endphp
        <div class="row text-center">
            <h3>{{ $post->title }}</h3>
            <h5>{{ date('Y-m-d', strtotime( $post->created_at )) }}</h5>
        </div>
        <div class="row">
            @if( $page->slug != 'contact' )
                <div class="col col-12 col-md-4 text-center">
                    <img src="{{ \Storage::url( $page->thumbnail ) }}" alt="{{ $page->slug }}">
                </div>
                <div class="col col-12 col-md-8">
                    {!! $page->excerpt !!}
                </div>
            @endif
        </div>
        <hr />
        <div class="row">
            <div class="col">
                {!! $page->content !!}
            </div>  
        </div>
    </div>
    @else
        pages here

        {{ $pages->links() }}
    @endif
    
</x-layout>