    @extends('layouts.main')

    @section('content')
        <main>

        <div id="sliderAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/img1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/plumbing.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/applience.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="our-category">
            <div class="container">
                <div class="Category-box">
                    <div class="header-title">
                        <h1>Category</h1>
                        <a href="#" class="seeAll">
                            <span>SEE ALL</span>
                        </a>
                    </div>
                    <ul class="category-row">
                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="../images/AC.png" alt="image">
                                        <h6 class="categories-name">Ac & Appliances</h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="../images/car.png" alt="image">
                                        <h6 class="categories-name">Car Related</h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="../images/electric.png" alt="image">
                                        <h6 class="categories-name">Electrical</h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="../images/carpenter.png" alt="image">
                                        <h6 class="categories-name">Carpenter</h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="../images/health.png" alt="image">
                                        <h6 class="categories-name">Health</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="our-services">
            <div class="container">
                <div class="Category-box">
                    <div class="header-title">
                        <h1>Services</h1>
                        <a href="#" class="seeAll">
                            <span>SEE ALL</span>
                        </a>
                    </div>
                    <ul class="category-row">
                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/thir.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 1000</span>
                                        </div>
                                        <h6 class="categories-name">Ac Repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/photo.jpg" alt="">
                                            </div>
                                            <span class="providerName">Ram Sharma</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/leaf.jpeg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 10000</span>
                                        </div>
                                        <h6 class="categories-name">car repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Bikash rai</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/photo.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 100</span>
                                        </div>
                                        <h6 class="categories-name">Electrical</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Jeevan Rawal</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/tree.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 5400</span>
                                        </div>
                                        <h6 class="categories-name">Decoration</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">prakash Thapa</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/Chitlang.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 3000</span>
                                        </div>
                                        <h6 class="categories-name">Plumbing</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Sachin devkota</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="category-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/thir.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 100000</span>
                                        </div>
                                        <h6 class="categories-name">Mobile repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Manish</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </section>

        <section class="BestOffer">
            <div class="container">
                <div class="offerBox">
                    <div class="offerBox-title">
                        <h1>Best Offer</h1>
                    </div>
                    <div class="offers">
                        <div class="offer">
                            <a href="#">
                                <div class="offers-detail">
                                    <span class="description">BEST DEAL MONTH</span>
                                    <h1 class="offers-name">Mobile Repair Trainning </h1>
                                    <span class="offer-percentages">20% OFF on all item</span>
                                </div>
                                <div class="price-tag">
                                    <span>From Rs 40000</span>
                                </div>
                                <div class="OfferProfile">
                                    <div class="image-box">
                                        <img src="../images/sec.jpg" alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="offer">
                            <a href="#">
                                <div class="offers-detail">
                                    <span class="description">BEST DEAL MONTH</span>
                                    <h1 class="offers-name">Mobile Repair Trainning </h1>
                                    <span class="offer-percentages">20% OFF on all item</span>
                                </div>
                                <div class="price-tag">
                                    <span>From Rs 1000</span>
                                </div>
                                <div class="OfferProfile">
                                    <div class="image-box">
                                        <img src="../images/tree.jpg" alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="offer">
                            <a href="#">
                                <div class="offers-detail">
                                    <span class="description">BEST DEAL MONTH</span>
                                    <h1 class="offers-name">Mobile Repair Trainning </h1>
                                    <span class="offer-percentages">20% OFF on all item</span>
                                </div>
                                <div class="price-tag">
                                    <span>From Rs 100</span>
                                </div>
                                <div class="OfferProfile">
                                    <div class="image-box">
                                        <img src="../images/leaf.jpeg" alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="offer">
                            <a href="#">
                                <div class="offers-detail">
                                    <span class="description">BEST DEAL MONTH</span>
                                    <h1 class="offers-name">Mobile Repair Trainning </h1>
                                    <span class="offer-percentages">20% OFF on all item</span>
                                </div>
                                <div class="price-tag">
                                    <span>From Rs 50000</span>
                                </div>
                                <div class="OfferProfile">
                                    <div class="image-box">
                                        <img src="../images/Chitlang.jpg" alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="featuredServices">
            <div class="container">
                <div class="Featured-box">
                    <div class="header-title">
                        <h1>Featured Service</h1>
                        <a href="#" class="seeAll">
                            <span>SEE ALL</span>
                        </a>
                    </div>
                    <ul class="Featured-row">
                        <li class="Featured-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/thir.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 1000</span>
                                        </div>
                                        <h6 class="categories-name">Ac Repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/photo.jpg" alt="">
                                            </div>
                                            <span class="providerName">Ram Sharma</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="Featured-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/leaf.jpeg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 10000</span>
                                        </div>
                                        <h6 class="categories-name">car repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Bikash rai</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="Featured-col">
                            <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="../images/thir.jpg" alt="image">
                                        </div>
                                        <div class="favourite">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="priceTag">
                                            <span>Rs 100000</span>
                                        </div>
                                        <h6 class="categories-name">Mobile repair</h6>

                                        <div class="provider">
                                            <div class="profile">
                                                <img src="../images/sec.jpg" alt="">
                                            </div>
                                            <span class="providerName">Manish</span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </section>

        <section class="providers">
            <div class="container">
                <div class="provider-box">
                    <div class="provider-title">
                        <h1>Providers</h1>

                        <a href="#" class="seeAll">
                            <span>SEE ALL</span>
                        </a>
                    </div>

                    <div class="providers-row">
                        <div class="provider">
                            <a href="">
                                <div class="img-box">
                                    <img src="../images/tree.jpg" alt="image">
                                </div>

                                <div class="providerInfo">
                                    <span>Rakesh Joshi</span>
                                    <span>Company Name</span>
                                </div>
                            </a>
                        </div>

                        <div class="provider">
                            <a href="">
                                <div class="img-box">
                                    <img src="../images/thir.jpg" alt="image">
                                </div>

                                <div class="providerInfo">
                                    <span>Bikash Joshi</span>
                                    <span>Company Name</span>
                                </div>
                            </a>
                        </div>

                        <div class="provider">
                            <a href="">
                                <div class="img-box">
                                    <img src="../images/thir.jpg" alt="image">
                                </div>

                                <div class="providerInfo">
                                    <span>Bikash Joshi</span>
                                    <span>Company Name</span>
                                </div>
                            </a>
                        </div>

                        <div class="provider">
                            <a href="">
                                <div class="img-box">
                                    <img src="../images/thir.jpg" alt="image">
                                </div>

                                <div class="providerInfo">
                                    <span>Bikash Joshi</span>
                                    <span>Company Name</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

@endsection
