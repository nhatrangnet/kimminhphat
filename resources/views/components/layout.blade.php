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
    <div class="container1 main-menu">
      <header class="px-0 px-md-5 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ \Storage::url( config( 'site.logo' ) ?? 'images/logo.png' ) }}" alt="kim-minh-phat-logo" style="height: 40px;">
          </a>
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

        <div class="col-md-3 text-end">
          <a href="https://www.facebook.com/profile.php?id=61566311985557&mibextid=ZbWKwL" target="blank" title="">
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
        </div>
      </header>
    </div>
    <section>
        @section('sidebar')
        @show
        {{ $slot }}
    </section>
    <div class="container">
      <footer class="pt-5">
        <div class="row">
          <div class="col-12 col-md-4 mb-3 text-center" data-aos="flip-up" data-aos-duration="2000">
            <img src="{{ \Storage::url( config( 'site.logo' ) ?? 'images/logo.png' ) }}" alt="kim-minh-phat-logo" style="height: 60px;">
            <p class="fw-bold mt-2"> {{ __('Công ty TNHH Xây Dựng Thương Mại Kim Minh Phát') }}</p>
            <p><b>Phone:</b> 0979.357.494 (Mr.Phát) - 0903.046.057 (Mr.Quân)</p>

            <p><b>Email:</b> kimminhphat135@gmail.com</p>
          </div>

          <div class="col-6 col-md-2 mb-3">
            <ul class="nav flex-column">
              <li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-left"><a href="/" class="nav-link p-0">Home</a></li>
              <li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-left"><a href="{{ url( 'page/introduce' ) }}" class="nav-link p-0">{{ __('Giới thiệu') }}</a></li>
              @php
                foreach( $categories as $cat ) {
                  echo '<li class="nav-item mb-2 hvr-underline-from-left" data-aos="fade-up-left"><a href="' . route( 'category.show', $cat['slug'] ) . '" class="nav-link p-0">' . __( $cat['name'] ) . '</a></li>';
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
    </div>
    @stack('js')
</body>

</html>