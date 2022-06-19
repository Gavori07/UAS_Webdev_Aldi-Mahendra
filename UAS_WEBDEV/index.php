<?php
include('koneksi.php');

$sql = "SELECT * FROM `film` ORDER BY endYear DESC LIMIT 10;";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="foto/logo1.jpg" type="foto/logo1.jpg">
    <title>nobar-kuy.com</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <a class="navbar-brand" href="index.php">
            <img src="foto/logo1.jpg" alt="" width="50" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=sports">Sports<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=tvSeries">TV shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=movie">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php?keyword=kids">Kids</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="search.php?keyword=action">action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=drama">drama</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=fantasy">fantasy</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=crime">crime</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=adventure">adventure</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=documentaries">documentaries</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="search.php?keyword=comedy">comedy</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" id='samping_tombol_search' name="keyword" placeholder="Mau nonton apa niich?" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" id="tombol_search" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {

            ?>
                <a href="detail.php?id=<?php echo $data['imdb_id']; ?>" class="carousel-item <?= $no == 0 ? 'active' : '' ?>" style="background-image: url('<?php echo $data['image_url']; ?>');height: 800px ;background-size:inherit;">
                    <div class="carousel-caption d-none d-md-block" style="    background-image: linear-gradient(360deg, black, transparent);">
                        <h5><?php echo $data['title']; ?></h5>
                        <p><?php echo $data['plot']; ?></p>
                    </div>
            </a>
            <?php $no++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php

    $drama = "SELECT * FROM `film` WHERE genres LIKE '%action%' LIMIT 10;;";
    $hasil = mysqli_query($koneksi, $drama);


    ?>
    <div class="container my-5">
        <h1 class="my-3">TOP 10 GLOBAL</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
            <div class="swiper-button-next" id="pemindah"></div>
            <div class="swiper-button-prev" id="pemindah"></div>
            <div class="swiper-pagination" id="pemindah"></div>
        </div>
    </div>

    <?php

$crime = "SELECT * FROM `film` WHERE genres LIKE '%drama%' LIMIT 10;";
$hasil = mysqli_query($koneksi, $crime);


?>
    <div class="container my-5">
        <h1 class="my-3">Tear Dropper</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next" id="pemindah"></div>
            <div class="swiper-button-prev" id="pemindah"></div>
            <div class="swiper-pagination" id="pemindah"></div>
        </div>
    </div>

  
    <?php

$comedy = "SELECT * FROM `film` WHERE genres LIKE '%adventure%' LIMIT 10;";
$hasil = mysqli_query($koneksi, $comedy);


?>
    <div class="container my-5">
        <h1 class="my-3">Boyz nightz</h1>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {

                ?>
                    <div class="swiper-slide">
                        <a href="detail.php?id=<?php echo $data['imdb_id']; ?>">
                            <div class="poster" style="background-image:url('<?php echo $data['image_url']; ?>');">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next" id="pemindah"></div>
            <div class="swiper-button-prev" id="pemindah"></div>
            <div class="swiper-pagination" id="pemindah"></div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            slidesPerGroup: 5,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>