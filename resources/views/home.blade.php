@extends('layouts.welcome')

@section('title', 'Home')

@section('content')
    <div>
        <div class="bg-gray-50 rounded-3xl max-h-screen mb-5">
            <div class="container mx-auto px-4 py-8 lg:px-8">
                <main>
                    {{-- Banner Section with Enhanced Styling --}}
                    <section class="rounded-2xl overflow-hidden shadow-lg">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($banners as $banner)
                                    <div class="swiper-slide transition-transform duration-300 hover:scale-105">
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->name }}"
                                            class="w-full h-[400px] lg:h-[600px] object-cover">
                                    </div>
                                @endforeach
                                <div class="swiper-pagination"></div>
                            </div>

                            {{-- Custom Navigation Styling --}}
                            <div class="absolute z-10 top-1/2 transform -translate-y-1/2 w-full px-4">
                                <div
                                    class="swiper-button-prev bg-white/50 hover:bg-white/70 rounded-full p-3 transition-all">
                                </div>
                                <div
                                    class="swiper-button-next bg-white/50 hover:bg-white/70 rounded-full p-3 transition-all">
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <div class="bg-gray-50 rounded-3xl max-h-screen">
            <div class="container mx-auto px-4 py-8 lg:px-8">
                {{-- Products Section with Grid Layout --}}
                <section>
                    <div class="text-center mb-10">
                        <h1
                            class="text-3xl lg:text-4xl font-extrabold text-gray-800 bg-gradient-to-r from-red-500 to-pink-600 bg-clip-text text-transparent">
                            Produk Kami
                        </h1>
                        <p class="text-gray-500 mt-2">Temukan produk berkualitas dengan harga terbaik</p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- Swiper JS dan Konfigurasi --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                slidesPerView: 1,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
            });
        });
    </script>
@endsection
