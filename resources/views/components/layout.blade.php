<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>{{ $title ?? config('site.title') }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        @stack('css')
        <meta name="google-site-verification" content="o-xd3NzemBu7TUyaWUoBcTw9dd6gJkkfJ7m9MdTu_gM" />
</head>
<body>
  {{-- header --}}
  <div class="container1 main-menu">
    <header class="container border-bottom lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-3 col-md-2 pt-1">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ \Storage::url( config( 'site.logo' ) ?? 'images/logo.png' ) }}" alt="kim-minh-phat-logo" style="height: 40px;">
          </a>
        </div>
        <div class="col-9 col-md-7 text-center">
          <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#"><h3 class="text-uppercase">Công ty TNHH Xây Dựng Thương Mại Kim Minh Phát</h3></a>
        </div>
        <div class="d-none d-sm-flex col-md-3 justify-content-end align-items-center">
          <a href="tel:0979357494" class="hotline">0979.357.494</a>
        </div>
      </div>
    </header>
    <header class="px-0 px-md-5 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <div class="col-md-2 mb-2 mb-md-0">
      </div>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item" data-aos="fade-up">
          <a href="/" class="nav-link active" aria-current="page">Home</a>
        </li>
        @php
          if( $categories ) {
            foreach( $categories as $cat ) {
              if( !empty( $cat['sub'] ) ) {
                $sublists = '';
                foreach( $cat['sub'] as $slug => $name ) {
                  $sublists .= '<li><a href=" '. route( 'category.show', $slug ) .'" class="nav-link dropdown-item"> ' . __( $name ) . '</a></li>';
                }

                echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        '. __( $cat['name'] ) .'
                      </a>
                      <ul class="dropdown-menu" data-bs-popper="static">
                        ' . $sublists . '
                      </ul>
                    </li>';
              }
              else echo '<li class="nav-item" data-aos="fade-up"><a href=" '. route( 'category.show', $cat['slug'] ) .'" class="nav-link"> ' . __( $cat['name'] ) . '</a></li>';
            }
          }
        @endphp

        <li class="nav-item" data-aos="fade-up"><a href="{{ url( '/page/contact' ) }}" class="nav-link">Contact</a></li>
      </ul>

      <div class="col-md-3">
        <a href="https://www.facebook.com/profile.php?id=61566311985557&mibextid=ZbWKwL" target="blank" title="Facebook">
          <svg height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7208)"/>
            <path d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z" fill="white"/>
            <defs>
            <linearGradient id="paint0_linear_87_7208" x1="16" y1="2" x2="16" y2="29.917" gradientUnits="userSpaceOnUse">
            <stop stop-color="#18ACFE"/>
            <stop offset="1" stop-color="#0163E0"/>
            </linearGradient>
            </defs>
          </svg>
        </a>
        <a href="https://www.tiktok.com/@kimminhphat135" title="Tiktok">
          <svg height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.45095 19.7926C8.60723 18.4987 9.1379 17.7743 10.1379 17.0317C11.5688 16.0259 13.3561 16.5948 13.3561 16.5948V13.2197C13.7907 13.2085 14.2254 13.2343 14.6551 13.2966V17.6401C14.6551 17.6401 12.8683 17.0712 11.4375 18.0775C10.438 18.8196 9.90623 19.5446 9.7505 20.8385C9.74562 21.5411 9.87747 22.4595 10.4847 23.2536C10.3345 23.1766 10.1815 23.0889 10.0256 22.9905C8.68807 22.0923 8.44444 20.7449 8.45095 19.7926ZM22.0352 6.97898C21.0509 5.90039 20.6786 4.81139 20.5441 4.04639H21.7823C21.7823 4.04639 21.5354 6.05224 23.3347 8.02482L23.3597 8.05134C22.8747 7.7463 22.43 7.38624 22.0352 6.97898ZM28 10.0369V14.293C28 14.293 26.42 14.2312 25.2507 13.9337C23.6179 13.5176 22.5685 12.8795 22.5685 12.8795C22.5685 12.8795 21.8436 12.4245 21.785 12.3928V21.1817C21.785 21.6711 21.651 22.8932 21.2424 23.9125C20.709 25.246 19.8859 26.1212 19.7345 26.3001C19.7345 26.3001 18.7334 27.4832 16.9672 28.28C15.3752 28.9987 13.9774 28.9805 13.5596 28.9987C13.5596 28.9987 11.1434 29.0944 8.96915 27.6814C8.49898 27.3699 8.06011 27.0172 7.6582 26.6277L7.66906 26.6355C9.84383 28.0485 12.2595 27.9528 12.2595 27.9528C12.6779 27.9346 14.0756 27.9528 15.6671 27.2341C17.4317 26.4374 18.4344 25.2543 18.4344 25.2543C18.5842 25.0754 19.4111 24.2001 19.9423 22.8662C20.3498 21.8474 20.4849 20.6247 20.4849 20.1354V11.3475C20.5435 11.3797 21.2679 11.8347 21.2679 11.8347C21.2679 11.8347 22.3179 12.4734 23.9506 12.8889C25.1204 13.1864 26.7 13.2483 26.7 13.2483V9.91314C27.2404 10.0343 27.7011 10.0671 28 10.0369Z" fill="#EE1D52"/>
            <path d="M26.7009 9.91314V13.2472C26.7009 13.2472 25.1213 13.1853 23.9515 12.8879C22.3188 12.4718 21.2688 11.8337 21.2688 11.8337C21.2688 11.8337 20.5444 11.3787 20.4858 11.3464V20.1364C20.4858 20.6258 20.3518 21.8484 19.9432 22.8672C19.4098 24.2012 18.5867 25.0764 18.4353 25.2553C18.4353 25.2553 17.4337 26.4384 15.668 27.2352C14.0765 27.9539 12.6788 27.9357 12.2604 27.9539C12.2604 27.9539 9.84473 28.0496 7.66995 26.6366L7.6591 26.6288C7.42949 26.4064 7.21336 26.1717 7.01177 25.9257C6.31777 25.0795 5.89237 24.0789 5.78547 23.7934C5.78529 23.7922 5.78529 23.791 5.78547 23.7898C5.61347 23.2937 5.25209 22.1022 5.30147 20.9482C5.38883 18.9122 6.10507 17.6625 6.29444 17.3494C6.79597 16.4957 7.44828 15.7318 8.22233 15.0919C8.90538 14.5396 9.6796 14.1002 10.5132 13.7917C11.4144 13.4295 12.3794 13.2353 13.3565 13.2197V16.5948C13.3565 16.5948 11.5691 16.028 10.1388 17.0317C9.13879 17.7743 8.60812 18.4987 8.45185 19.7926C8.44534 20.7449 8.68897 22.0923 10.0254 22.991C10.1813 23.0898 10.3343 23.1775 10.4845 23.2541C10.7179 23.5576 11.0021 23.8221 11.3255 24.0368C12.631 24.8632 13.7249 24.9209 15.1238 24.3842C16.0565 24.0254 16.7586 23.2167 17.0842 22.3206C17.2888 21.7611 17.2861 21.1978 17.2861 20.6154V4.04639H20.5417C20.6763 4.81139 21.0485 5.90039 22.0328 6.97898C22.4276 7.38624 22.8724 7.7463 23.3573 8.05134C23.5006 8.19955 24.2331 8.93231 25.1734 9.38216C25.6596 9.61469 26.1722 9.79285 26.7009 9.91314Z" fill="#000000"/>
            <path d="M4.48926 22.7568V22.7594L4.57004 22.9784C4.56076 22.9529 4.53074 22.8754 4.48926 22.7568Z" fill="#69C9D0"/>
            <path d="M10.5128 13.7916C9.67919 14.1002 8.90498 14.5396 8.22192 15.0918C7.44763 15.7332 6.79548 16.4987 6.29458 17.354C6.10521 17.6661 5.38897 18.9168 5.30161 20.9528C5.25223 22.1068 5.61361 23.2983 5.78561 23.7944C5.78543 23.7956 5.78543 23.7968 5.78561 23.798C5.89413 24.081 6.31791 25.0815 7.01191 25.9303C7.2135 26.1763 7.42963 26.4111 7.65924 26.6334C6.92357 26.1457 6.26746 25.5562 5.71236 24.8839C5.02433 24.0451 4.60001 23.0549 4.48932 22.7626C4.48919 22.7605 4.48919 22.7584 4.48932 22.7564V22.7527C4.31677 22.2571 3.95431 21.0651 4.00477 19.9096C4.09213 17.8736 4.80838 16.6239 4.99775 16.3108C5.4985 15.4553 6.15067 14.6898 6.92509 14.0486C7.608 13.4961 8.38225 13.0567 9.21598 12.7484C9.73602 12.5416 10.2778 12.3891 10.8319 12.2934C11.6669 12.1537 12.5198 12.1415 13.3588 12.2575V13.2196C12.3808 13.2349 11.4148 13.4291 10.5128 13.7916Z" fill="#69C9D0"/>
            <path d="M20.5438 4.04635H17.2881V20.6159C17.2881 21.1983 17.2881 21.76 17.0863 22.3211C16.7575 23.2167 16.058 24.0253 15.1258 24.3842C13.7265 24.923 12.6326 24.8632 11.3276 24.0368C11.0036 23.823 10.7187 23.5594 10.4844 23.2567C11.5962 23.8251 12.5913 23.8152 13.8241 23.341C14.7558 22.9821 15.4563 22.1734 15.784 21.2774C15.9891 20.7178 15.9864 20.1546 15.9864 19.5726V3H20.4819C20.4819 3 20.4315 3.41188 20.5438 4.04635ZM26.7002 8.99104V9.9131C26.1725 9.79263 25.6609 9.61447 25.1755 9.38213C24.2352 8.93228 23.5026 8.19952 23.3594 8.0513C23.5256 8.1559 23.6981 8.25106 23.8759 8.33629C25.0192 8.88339 26.1451 9.04669 26.7002 8.99104Z" fill="#69C9D0"/>
          </svg>
        </a>
      </div>
    </header>
  </div>

  <section>
      @section('sidebar')
      @show
      {{ $slot }}
  </section>

  {{-- footer --}}
  <section class="footer">
    <footer class="container pt-5">
        <div class="row">
          <div class="col-12 col-md-4 mb-3 text-center" data-aos="flip-up" data-aos-duration="2000">
            <img src="{{ \Storage::url( config( 'site.logo' ) ?? 'images/logo.png' ) }}" alt="kim-minh-phat-logo" style="height: 60px;">
            <p class="fw-bold mt-2"> {{ __('Công ty TNHH Xây Dựng Thương Mại Kim Minh Phát') }}</p>
            <p><b>Phone:</b> 0979.357.494 (Mr.Phát) - 0903.046.057 (Mr.Quân)</p>

            <p><b>Email:</b> kimminhphat135@gmail.com</p>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <ul class="nav flex-column">
              @php
                foreach( $categories as $cat ) {
                  if( !empty( $cat['sub'] ) ) {
                    foreach( $cat['sub'] as $slug => $name ) {
                      echo '<li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-left"><a href="' . route( 'category.show', $slug ) . '" class="nav-link p-0">' . __( $name ) . '</a></li>';
                    }
                  }
                  else echo '<li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-left"><a href="' . route( 'category.show', $cat['slug'] ) . '" class="nav-link p-0">' . __( $cat['name'] ) . '</a></li>';
                }
              @endphp
              <li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-right"><a href="{{ url( 'page/contact' ) }}" class="nav-link p-0">Contact</a></li>
            </ul>
          </div>

          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              {{ __('Đăng ký và nhận tin mới nhất của chúng tôi.') }}
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email...">
                <button class="btn btn-primary" type="button">{{ __('Đăng ký') }}</button>
              </div>
            </form>
          </div>
        </div>
        <p class="my-line" data-aos="fate-right-right"></p>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4">
          <p>© 2024 Kim Minh Phat Co,inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
          </ul>
        </div>
      </footer>
  </section>
  @stack('js')
</body>
</html>