<x-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot>
    <div class="container post-content">
        @php
        @endphp
        <div class="row text-center">
            <h3>{{ $post->title }}</h3>
            {{-- <h5>{{ date('Y-m-d', strtotime( $post->updated_at )) }}</h5> --}}
        </div>
        <div class="row">
            @if( $post->slug != 'contact' )
                <div class="col col-12 col-md-4 text-center">
                    <img class="thumbnail object-fit-cover rounded-3 img-thumbnail" src="{{ \Storage::url( $post->thumbnail ) }}" alt="{{ $post->slug }}">
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
                @php
                    $images = json_decode($post->images, true );
                @endphp
                <section class="photo-gallery">
                  <div class="container">
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 align-items-center gallery-grid">
                      @foreach( $images as $image )
                          <div class="col text-center">
                            <a class="gallery-item" href="{{ \Storage::url( $image ) }}">
                              <img src="{{ \Storage::url( $image ) }}" class="img-fluid" alt="12345">
                            </a>
                          </div>
                      @endforeach
                    </div>
                  </div>
                </section>
            </div>  
        </div>
    </div>

    {{-- lightbox panel --}}
    <div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
          <button type="button" class="btn-fullscreen-enlarge" aria-label="Enlarge fullscreen">
            <svg class="bi"><use href="#enlarge"></use></svg>
          </button>
          <button type="button" class="btn-fullscreen-exit d-none" aria-label="Exit fullscreen">
            <svg class="bi"><use href="#exit"></use></svg>
          </button>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body">
            <div class="lightbox-content">
              <!-- JS content here -->
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- end lightbox panel --}}
    
</x-layout>