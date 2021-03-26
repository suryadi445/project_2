<!-- awal form login -->
<div class="container mt-3">
    <div class="card m-auto col-md-6">
        <div class="row mb-3 mt-3">
            <div class="col">
                <h3 class="text-center">Login</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" class="text-decoration-none" data-toggle="modal" data-target="#exampleModal">
                                Belum memiliki akun?
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<!-- akhir form login -->

<!-- modal registrasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="mt-3 mb-2">
                <h5 class="text-center" id="exampleModalLabel">Registrasi</h5>
                <hr>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->