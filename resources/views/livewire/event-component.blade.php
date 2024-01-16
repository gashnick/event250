<!-- resources/views/livewire/event-component.blade.php -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Featured Events</h2>
            <h3 class="section-subheading text-muted">
                View more Featured Events
            </h3>
        </div>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $event->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid card-img-top" src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('path-to-default-image.jpg') }}" alt="{{ $event->name }}" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $event->name }}</div>
                        <div class="portfolio-caption-subheading text-muted">
                            {{ \Carbon\Carbon::parse($event->date . ' ' . $event->time)->format('l, F j, Y g:i A') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event item modal popup for each event -->
            <div class="portfolio-modal modal fade" id="portfolioModal{{ $event->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal">
                            <img src="assets/img/close-icon.svg" alt="Close modal" />
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">{{ $event->name }}</h2>
                                        <p class="item-intro text-muted">
                                            {{ $event->description }}
                                        </p>
                                        <img class="img-fluid d-block mx-auto" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->name }}" />
                                        <!-- Add more details as needed -->
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>