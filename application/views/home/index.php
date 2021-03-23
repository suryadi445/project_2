<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">MOVIES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#hits_movie">Hits Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#new_movie">New Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="custom-control custom-switch mr-2">
                    <input type="checkbox" class="custom-control-input" id="dark_mode">
                    <label class="custom-control-label text-light" for="dark_mode">Dark Mode</label>
                </div>
                <a class="nav-link btn btn-primary mr-3" href="#">Login</a>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-light">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search movie.." aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
    </nav>
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="d-block w-100">
        </div>
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

<div class="bg-light">
    <div class="row mr-1 ml-1">
        <div class="col">
            <h2 class="text-center mt-4 mb-3" id="hits_movie">Hits Movie</h2>
            <div class="card-deck">
                <div class="card  mb-5">
                    <img src="<?= base_url() ?>assets/image/komputer.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <a href="" class="btn btn-success float-right">Episode</a>
                    </div>
                </div>
                <div class="card  mb-5">
                    <img src="<?= base_url() ?>assets/image/komputer.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <a href="" class="btn btn-success float-right">Episode</a>
                    </div>
                </div>
                <div class="card mb-5">
                    <img src="<?= base_url() ?>assets/image/komputer.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <a href="" class="btn btn-success float-right">Episode</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4 m-2">
    <div class="col">
        <h2 class="text-center mb-3" id="new_movie">New Movie</h2>
        <div class="card-deck">
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url() ?>assets/image/komputer.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light mt-4 container-fluid">
    <div class="row">
        <div class="col mb-5 ml-3 mr-3">
            <div class="row mt-4 justify-content-between">
                <div class="col-5 card bg-light">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Handphone</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-6 card bg-light">
                    <div class="form-group">
                        <label for="message">Komentar</label>
                        <textarea class="form-control" id="message" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white mt-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <!-- <p>Copyright &copy;<?= date('Y') ?>.</p> -->
                <p>Copyright <i class="far fa-copyright"></i><?= date(' Y') ?></p>
            </div>
        </div>
    </div>
</footer>
<!-- </div> -->