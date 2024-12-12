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
            <div class="col-12">
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
            <div class="col-12">
                <h4>{{ __( 'Main address' ) }}</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4057.3876933886218!2d106.64524997515058!3d10.766068259384468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e943fee0247%3A0x123c108a29f8f891!2zMTM1IELDrG5oIFRo4bubaSwgUGjGsOG7nW5nIDExLCBRdeG6rW4gMTEsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e1!3m2!1sen!2s!4v1733993926144!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="yes" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <h4>{{ __( 'TPHCM address' ) }}</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4056.6392063279186!2d106.63379218025581!3d10.821514030870318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752965ba0129c7%3A0x1f0898de78c8bdf8!2zMzUzIFBo4bqhbSBWxINuIELhuqFjaCwgUGjGsOG7nW5nIDE1LCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e1!3m2!1sen!2s!4v1733994028222!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="yes" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <h4>{{ __( 'NhaTrang address' ) }}</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1075.1439087989854!2d109.16759645574187!3d12.24580368366687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31705d003db5da13%3A0x37868a449070261c!2zQ1RZIFROSEggWMOCWSBE4buwTkcgVE0gS0lNIE1JTkggUEjDgVQ!5e1!3m2!1sen!2s!4v1733993567677!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="no" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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