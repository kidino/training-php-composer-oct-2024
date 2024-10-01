<?php $this->layout('layout::main') ?>

<?php $this->start('main-area') ?>

    <div class="card shadow">
        <div class="card-body">

            <h1>Member Area</h1>
            <h2>Selamat Datang <?= $_SESSION['user']['name']; ?></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis a incidunt vitae quod necessitatibus voluptates veniam tenetur ipsam corporis voluptatum nesciunt, quidem dicta quas nihil cumque qui, sed officia porro.</p>

        </div>
    </div>

<?php $this->stop() ?>