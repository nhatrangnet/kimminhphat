<x-layout>
    <x-slot:title>
        {{ __( $title ) }}
    </x-slot>
    <div class="container">
        <div class="row gx-xl-5 justify-content-between">
            <div class="col-12 col-xxl-8">
                <h3 class="text-body-emphasis" data-aos="fade-up">{{ __( $title ) }}</h3>
                <div class="row row-cols-1 row-cols-md-3 row-cols-xxl-4 gy-5 gx-md-5 justify-content-center justify-content-xl-between">
                    @foreach( $posts as $post )
                    <div class="col pt-5 pt-xl-4 aos-init aos-animate" data-aos-delay="0" data-aos="fade" data-aos-duration="3000">
                        <article class="d-flex max-w-xl mx-auto mx-xl-0 flex-column justify-content-between">
                            <div class="position-relative w-100">
                                <div class="ratio" style="--bs-aspect-ratio: 66.66%;">
                                    <a href="{{ route( 'post.show', [ 'slug' => $post->slug ] ) }}">
                                        <img src="{{ \Storage::url( $post->thumbnail ) }}" class="w-100 object-fit-cover rounded-3" alt="{{ $post->slug }}" loading="lazy">
                                    </a>
                                </div>
                            </div>

                            <div class="position-relative">
                                <h3 class="m-0 text-lg leading-6">
                                    <a href="{{ route( 'post.show', [ 'slug' => $post->slug ] ) }}" class="text-body-emphasis text-body-secondary-hover stretched-link fw-semibold link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                            </div>
                            <div class="mt-1 d-flex column-gap-3 text-end">
                                <time datetime="{{ date('Y-m-d', strtotime( $post->created_at )); }}" class="text-body-tertiary fst-italic fs-6 fs-">
                                    {{ date('d-m-Y', strtotime( $post->created_at )); }}
                                </time>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>

                <!-- pagination -->
                <div class="py-5">
                    {{ $posts->links() }}
                </div>
            </div>

            {{-- sidebar --}}
            {{-- <div class="col-12 col-xl-4">
                <div class="max-w-xl mx-auto mx-xl-0 pt-5 pt-xl-0">
                    <div class="mt-4">
                        <div class="p-4 shadow rounded-3 bg-body-tertiary">
                            <div class="input-group flex-nowrap input-group-lg">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="addon-wrapping">
                                <span class="input-group-text bg-primary text-light" id="addon-wrapping">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="p-4 shadow rounded-3 bg-body-tertiary">
                            <h3 class="text-body-emphasis text-2xl tracking-tight fw-semibold">
                                {{ __('Tin hot') }}
                            </h3>

                            <hr class="text-body-emphasis opacity-10">

                            <a href="javascript:;" class="d-flex align-items-center mt-4 text-body link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover">
                                <div class="p-5 position-relative">
                                    <img src="./assets/img/bg/bg7.jpg" class="position-absolute top-0 start-0 h-100 w-100 object-fit-cover rounded" loading="lazy" alt="Meeting">
                                </div>

                                <div class="ps-3">
                                    <time datetime="2024-09-16" class="d-block text-body-tertiary">
                                        Sep 16, 2024
                                    </time>
                                    <h6 class="m-0 mt-3 text-body-secondary line-clamp-2 text-sm leading-6">
                                        The Tech Revolution: How Innovations Are Changing
                                    </h6>
                                </div>
                            </a>

                            <a href="javascript:;" class="d-flex align-items-center mt-4 text-body link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover">
                                <div class="p-5 position-relative">
                                    <img src="./assets/img/bg/bg8.jpg" class="position-absolute top-0 start-0 h-100 w-100 object-fit-cover rounded" loading="lazy" alt="Meeting">
                                </div>

                                <div class="ps-3">
                                    <time datetime="2024-09-16" class="d-block text-body-tertiary">
                                        Sep 16, 2024
                                    </time>
                                    <h6 class="m-0 mt-3 text-body-secondary line-clamp-2 text-sm leading-6">
                                        The Tech Revolution: How Innovations Are Changing
                                    </h6>
                                </div>
                            </a>

                            <a href="javascript:;" class="d-flex align-items-center mt-4 text-body link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover">
                                <div class="p-5 position-relative">
                                    <img src="./assets/img/bg/bg9.jpg" class="position-absolute top-0 start-0 h-100 w-100 object-fit-cover rounded" loading="lazy" alt="Meeting">
                                </div>

                                <div class="ps-3">
                                    <time datetime="2024-09-16" class="d-block text-body-tertiary">
                                        Sep 16, 2024
                                    </time>
                                    <h6 class="m-0 mt-3 text-body-secondary line-clamp-2 text-sm leading-6">
                                        The Tech Revolution: How Innovations Are Changing
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="p-4 shadow rounded-3 bg-body-tertiary">
                            <h3 class="text-body-emphasis text-2xl tracking-tight fw-semibold">
                                Categories
                            </h3>

                            <hr class="text-body-secondary opacity-10">

                            <ul class="ps-3 text-body-secondary">
                                <li class="mt-2">
                                    <a href="javascript:;" class="text-body-secondary link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover text-sm leading-6">
                                        Artificial Intelligence
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="javascript:;" class="text-body-secondary link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover text-sm leading-6">
                                        Artificial Intelligence
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="javascript:;" class="text-body-secondary link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover text-sm leading-6">
                                        Artificial Intelligence
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a href="javascript:;" class="text-body-secondary link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-25-hover text-sm leading-6">
                                        Artificial Intelligence
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="p-4 shadow rounded-3 bg-body-tertiary">
                            <h3 class="text-body-emphasis text-2xl tracking-tight fw-semibold">
                                Popular Tags
                            </h3>
                            <hr class="text-body-emphasis opacity-10">

                            <div class="d-flex flex-wrap gap-3">
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    AI
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    Ecommerce
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    IoT
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    Blockchain
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    Patient
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    Smart Home
                                </button>
                                <button class="btn text-body-tertiary border bg-body-secondary-hover text-sm fw-semibold">
                                    Robotics
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- end sidebar --}}
        </div>
    </div> 
</x-layout>