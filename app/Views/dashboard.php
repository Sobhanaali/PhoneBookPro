<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
   
    <div class="border rounded my-5">
        <h3 class="border-bottom p-4 bg-light rounded-top">Hello <?= $user['first_name'] ?> <?= $user['last_name'] ?></h3>
        <div class="d-flex justify-content-between p-4">
            <h6 class="mb-2 text-body-secondary">Username: <?= $user['username'] ?></h6>
            <h6 class="mb-2 text-body-secondary">Phone Number: <?= $user['mobile'] ?></h6>
            <a href="#" class="">Edit information</a>
            <a href="#" class="">Delete accountt</a>
        </div>
    </div>
    <div class="border rounded my-5">
        <h3 class="border-bottom p-4 bg-light rounded-top">Contacts :</h3>
        <form action="">
            
        </form>
        <div>
            <ul class="list-group list-group-flush block">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
    </div>
<?= $this->endSection() ?>