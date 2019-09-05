@extends('layouts.user_view')

@section('content')
<section>
    
<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
            <h1 class="text-uppercase text-white font-weight-bold">Fitra Autotrans</h1>
          <h1 class="text-uppercase text-white font-weight-bold">PT. Angga Saputra Mandiri</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Your Partner Traveling</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">About</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Fitra Autotrans PT. Angga Saputra Mandiri</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">PT. Angga Saputra Mandiri merupakan perusahaan yang bergerak dibidang transportasi dan jasa. PT. Angga Saputra Mandiri merupakan perusahaan otobus yang bergerak dalam bidang penyewaan bus pariwisata, penyedia jasa paket wisata (Biro Perjalanan Wisata), dan penyedia trasportasi shuttle bus dengan tujuan Kuningan – Palembang – Jambi. PT. Angga Saputra Mandiri memiliki dua divisi, yaitu divisi travel yang memegang suttle bus jurusan Kuningan – Palembang – Jambi, serta divisi pariwisata yang berorientasi pada penyewaan armada bus pariwisata dan pelayanan biro perjalanan wisata. </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Pelayana Yang Dimiliki</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-bus text-primary mb-4"></i>
            <h3 class="h4 mb-2">Penyewaan Bus Pariwisata</h3>
            <p class="text-muted mb-0">Menyewakan bus pariwisata dengan berbagai tipe dan kelas seperti</p><p class="text-muted mb-0"> Executive </p><p class="text-muted mb-0"> (Legacy Sky Bus, Jetbus 2, Jetbus 2 HDD)</p><p class="text-muted mb-0"> Premium </p><p class="text-muted mb-0"> (Legacy SR2 XHD Prime, Zeppelin G3, Jetbus 3 HDD)</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-suitcase-rolling text-primary mb-4"></i>
            <h3 class="h4 mb-2">Biro Perjalanan Wisata</h3>
            <p class="text-muted mb-0">Menyalani perjalanan wisata Jawa dan Bali, dan perjalanan wisata religi</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-taxi text-primary mb-4"></i>
            <h3 class="h4 mb-2">Shuttle Bus</h3>
            <p class="text-muted mb-0">Melayani shuttle bus dengan jurusan Kuningan - Palembang - Jambi (PP)</p>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  {{-- <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Kontak</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Siap melayani kebutuhan pariwisata anda, dan siap melayani shuttle bus dengan tujuan Kuningan - Palembang - Jambi (PP)</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>Divisi Pariwisata</div>
          <div>085721333775</div>
          
        </div>
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>Divisi Shuttle</div>
          <div>085721333775</div>
          
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block"  >fitra_autotrans@gmail.com</a>
        </div>
      </div>
    </div>
  </section>

</section>
<di
@endsection

