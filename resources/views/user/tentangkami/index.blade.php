@extends('user.layout.main')
@section('content')
    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15811.207634982136!2d110.386935!3d-7.810783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e60de5c6eab4f73!2sLazismu%20kantor%20layanan%20Umbulharjo!5e0!3m2!1sid!2sid!4v1662989533182!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Informasi</span>
                            <h2>Hubungi Kami</h2>
                        </div>
                        <ul>
                            <li>
                                <h4>Umbulharjo</h4>
                                <p>Jl. Glagahsari No.136, Warungboto, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa
                                    Yogyakarta 55164</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
