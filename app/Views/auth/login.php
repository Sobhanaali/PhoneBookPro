<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <form class="border p-lg-5 rounded shadow w-50 mx-auto my-5" action="<?= site_url('auth/loginPost') ?>" method="post">
        <h1 class="mb-3 bg-light text-center p-1 rounded">Sign In</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mobile or Username</label>
            <input type="text" name="username_or_mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/register" class="btn btn-secondary text-capitalize">Sign up</a>
        </div>
    </form>
<?= $this->endSection() ?>






