<div>
    <div>
        <section class="banner">
          <div class="container" style="max-width: 1600px;">
            <div class="row">
              <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/bg/hero1.jpg') }}" style="height: 750px; object-fit: auto;" class="d-block w-100 " alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/mission.jpg') }}" style="height: 750px; object-fit: auto;" class="d-block w-100 " alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/service/service-pic1.jpg') }} style="height: 750px; object-fit: auto;" class="d-block w-100 " alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

            </div>
          </div>
        </section>
    </div>
    <livewire:features-components/>
    <livewire:about-component/>
    <div>
        <section class="cta-section">
            <div class="container">
                <div class="row">
                    <img style="object-fit: cover; object-position: center; height: 500px;" class="img-fluid" src="{{ asset('images/bg/a4pro.png') }}" alt="">
                </div>
            </div>
        </section>
    </div>
    <livewire:partnership-component/>
    <div>
        <section class="section cta-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="cta-content p-4">
                            <div class="divider mb-4"></div>
                            <h2 class="mb-5 text-lg text-white">Transform your workforce today <span class="title-color text-white">with our expert recruitment solutions!</span></h2>
                            <a href="" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <livewire:achievement-component/>
    <livewire:legality-component/>

</div>
