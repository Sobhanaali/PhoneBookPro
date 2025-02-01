<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
   
    <div class="border rounded my-5">
        <h3 class="border-bottom p-4 bg-light rounded-top">Hello <?= $user['first_name'] ?> <?= $user['last_name'] ?></h3>
        <div class="d-flex justify-content-between p-4">
            <h6 class="mb-2 text-body-secondary">Username: <?= $user['username'] ?></h6>
            <h6 class="mb-2 text-body-secondary">Phone Number: <?= $user['mobile'] ?></h6>
            <a href="#" class="">Edit information</a>
            <a href="#" class="">Delete account</a>
            <a href="<?= site_url('') ?>" class="">Log out</a>
        </div>
    </div>
    <div class="border rounded my-5">
        <h3 class="border-bottom p-4 bg-light rounded-top">Contacts :</h3>
        
        <form action="<?= site_url('/contact/store') ?>" method="post" class="px-4 pb-4 border-bottom">
            <?php $errors = session()->getFlashdata('errors');  ?>
            <h4 class="my-4">ADD CONTACT</h4>
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">fist name :</label>
                    <input type="text" name="first_name" class="form-control">
                    <?php if (!empty($errors['first_name'])){ ?>
                        <div class="text-danger fs-6">
                            <?php echo $errors['first_name']; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col">
                    <label class="form-label">last name :</label>
                    <input type="text" name="last_name" class="form-control">
                    <?php if (!empty($errors['last_name'])){ ?>
                        <div class="text-danger fs-6">
                            <?php echo $errors['last_name']; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col">
                    <label class="form-label">phone number :</label>
                    <input type="text" name="mobile" class="form-control">
                    <?php if (!empty($errors['mobile'])){ ?>
                        <div class="text-danger fs-6">
                            <?php echo $errors['mobile']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary px-4">ADD</button>
            </div>
        </form>
        <div>
            <table class="table table-striped m-0">
                <?php foreach($contacts as $contact) { ?>
                    <tr>
                        <td class="p-3">
                            First Name: 
                            <b><?= $contact['first_name'] ?></b>
                        </td>
                        <td class="p-3">
                            Last Name: 
                            <b><?= $contact['last_name'] ?></b>
                        </td>
                        <td class="p-3">
                            Phone Number: 
                            <b><?= $contact['mobile'] ?></b>
                        </td>
                        <td class="p-3">
                            <a href="">Edit</a>
                        </td>
                        <td class="p-3">
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <form action=""></form>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>