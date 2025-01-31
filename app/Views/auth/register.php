<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <form class="border p-lg-5 rounded shadow w-50 mx-auto my-5" action="<?= site_url('/register') ?>" method="post">
        <?php $errors = session()->getFlashdata('errors');  ?>
        <h1 class="mb-3 bg-light text-center p-1 rounded">Sign Up</h1>
        <div class="row gap-2">
            <div class="mb-3 col px-0">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
                <?php if (!empty($errors['username'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['username']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="mb-3 col px-0">
                <label class="form-label">mobile</label>
                <input type="tel" name="mobile" class="form-control">
                <?php if (!empty($errors['mobile'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['mobile']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row gap-2">
            <div class="mb-3 col px-0">
                <label class="form-label">first name</label>
                <input type="text" name="first_name" class="form-control">
                <?php if (!empty($errors['first_name'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['first_name']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="mb-3 col px-0">
                <label class="form-label">last name</label>
                <input type="text" name="last_name" class="form-control">
                <?php if (!empty($errors['last_name'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['last_name']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row gap-2">
            <div class="mb-3 col px-0">
                <label class="form-label">password</label>
                <input type="password" name="password" class="form-control">
                <?php if (!empty($errors['password'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['password']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="mb-3 col px-0">
                <label class="form-label">confirm password</label>
                <input type="password" name="confirm_password" class="form-control">
                <?php if (!empty($errors['confirm_password'])){ ?>
                    <div class="text-danger fs-6">
                        <?php echo $errors['confirm_password']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/login" class="btn btn-secondary text-capitalize">Sign in</a>
        </div>
    </form>
<?= $this->endSection() ?>