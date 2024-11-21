<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>WebSite | Course App</title>
</head>

<body>
    <nav>
        <div class="nav__header">
            <div class="nav__logo">
                <a href="#">COURSE<span>APP</span></a>
            </div>
            <div class="nav__menu__btn" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
            </div>
        </div>
        <ul class="nav__links" id="nav-links">
            <li><a href="#">Berita</a></li>
            <li><a href="#">Kursus</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
        <div class="nav__btns">
            <button class="btn sign__up">Sign Up</button>
            <button class="btn sign__in">Sign In</button>
        </div>
    </nav>

    <header class="header__container">
        <div class="header__image">
            <div class="header__image__card header__image__card-1">
                <span><i class="ri-newspaper-line"></i></span>
                Berita
            </div>
            <div class="header__image__card header__image__card-2">
                <span><i class="ri-book-line"></i></span>
                Kursus
            </div>
            <div class="header__image__card header__image__card-3">
                <span><i class="ri-information-line"></i></span>
                Tentang Kami
            </div>
            <div class="header__image__card header__image__card-4">
                <span><i class="ri-mail-line"></i></span>
                Kontak
            </div>
            <img src="{{ asset('assets/images/background/headerrr.png') }}" alt="header" />
        </div>
        <div class="header__content">
            <h1>
                LET'S GO!<br />THE <span>KELAS KURSUS</span> IS WAITING FOR
                YOU
            </h1>
            <p>Course App adalah sebuah aplikasi berbasis web yang dirancang untuk menyediakan platform bagi pengguna
                untuk mengakses, mendaftar, dan mengikuti kursus online atau offline. Aplikasi ini biasanya digunakan
                oleh institusi pendidikan, lembaga pelatihan, atau penyedia kursus untuk mengelola berbagai aspek
                terkait kursus, seperti daftar kursus, materi pembelajaran, jadwal, dan pendaftaran peserta.</p>
            <form action="/">
                <div class="input__row">
                    <div class="input__group">
                        <h5>Destination</h5>
                        <div>
                            <span><i class="ri-map-pin-line"></i></span>
                            <input type="text" placeholder="Jawa Timur, Malang" />
                        </div>
                    </div>
                    <div class="input__group">
                        <h5>Date</h5>
                        <div>
                            <span><i class="ri-calendar-2-line"></i></span>
                            <input type="text" placeholder="17 July 2024" />
                        </div>
                    </div>
                </div>
                <button type="submit">Search</button>
            </form>
            <div class="bar">
                Copyright © 2024 Web Design Mastery. All rights reserved.
            </div>
        </div>
    </header>


    <div class="cards-container">
        <div class="card">
            <img src="{{ asset('') }}" alt="Kursus 1">
            <h3>Kursus Web Development</h3>
            <p>Belajar membuat website profesional dengan teknologi modern.</p>
            <a href="/detail/1" class="btn-detail">Detail</a>
            <a href="/buy/1" class="btn-buy">Beli</a>
        </div>

        <div class="card">
            <img src="{{ asset('') }}" alt="Kursus 2">
            <h3>Kursus UI/UX Design</h3>
            <p>Pahami prinsip desain yang berfokus pada pengalaman pengguna.</p>
            <a href="/detail/2" class="btn-detail">Detail</a>
            <a href="/buy/2" class="btn-buy">Beli</a>
        </div>

        <div class="card">
            <img src="{{ asset('') }}" alt="Kursus 3">
            <h3>Kursus Data Science</h3>
            <p>Kuasi analisis data dengan Python dan alat statistik lainnya.</p>
            <a href="/detail/3" class="btn-detail">Detail</a>
            <a href="/buy/3" class="btn-buy">Beli</a>
        </div>
    </div>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
</body>

</html>
