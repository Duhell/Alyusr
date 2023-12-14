<div>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Gallery</span>
                        <h1 class="text-capitalize mb-5 text-lg text-white index-99">{{ Str::ucfirst($tag) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section doctors">
        <div class="container">

            <!-- Gallery -->
            <div class="row">
                @forelse ($images as $image)
                    <div class="col-lg-4  col-md-6 mb-4 p-3">
                        <div class="ratio  ratio-1x1">
                            <img class="img-fluid rounded" src="{{ Storage::url($image->imagePath) }}" alt="{{ $image->tag }}">
                        </div>
                    </div>
                @empty
                    <p>No Photos</p>
                @endforelse
            </div>

            <!-- Gallery -->
    </div>
</section>
</div>
