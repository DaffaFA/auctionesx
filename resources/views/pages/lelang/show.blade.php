@extends('layouts.public')

@push('css')
<style>
  .swiper-container {
    width: 100%;
    height: 500px;
    margin-left: auto;
    margin-right: auto;
  }

  .swiper-slide {
    background-size: cover;
    background-position: center;
  }

  .gallery-top {
    height: 80%;
    width: 100%;
  }

  .gallery-thumbs {
    height: 20%;
    box-sizing: border-box;
    padding: 10px 0;
  }

  .gallery-thumbs .swiper-slide {
    width: 25%;
    height: 100%;
    opacity: 0.4;
  }

  .gallery-thumbs .swiper-slide-thumb-active {
    opacity: 1;
  }
</style>
@endpush

@section('content')
@include('users.partials.header',[
'title' => 'Hola',
'description' => 'Barang Lelang'
])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <div
                class="card"
                style="height: 420px"
              >
                <div class="swiper-container gallery-top">
                  <div class="swiper-wrapper">
                    @forelse ($lelang->barang->photos as $photos)
                    <div
                      class="swiper-slide"
                      style="background-image:url({{ Storage::url($photos->path) }});background-position: center;background-size: contain;background-repeat: no-repeat;"
                    ></div>
                    @empty
                    <div
                      class="swiper-slide"
                      style="background-image:url(data:image/png;base64,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);background-position: center;background-size: contain;background-repeat: no-repeat;"
                    ></div>
                    @endforelse
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                  </div>
                </div>
                <div class="swiper-container gallery-thumbs">
                  <div class="swiper-wrapper">
                    @forelse ($lelang->barang->photos as $photos)
                    <div
                      class="swiper-slide"
                      style="background-image:url({{ Storage::url($photos->path) }});background-position: center;background-size: contain;background-repeat: no-repeat;"
                    ></div>
                    @empty
                    <div
                      class="swiper-slide"
                      style="background-image:url(data:image/png;base64,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);background-position: center;background-size: contain;background-repeat: no-repeat;"
                    ></div>
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div
                id="offer-box"
                data-auction="{{ $lelang->id_lelang }}"
              ></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
</script>
@endpush