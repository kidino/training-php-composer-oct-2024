<?php $this->layout('layout::main') ?>

<?php $this->start('main-area') ?>

    <div class="card shadow">
        <div class="card-body">


            <h3>This is Home</h3>

            <?php if(isset($_GET['success'])) :?>
                <div class="alert alert-success">Record has been updated</div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>USERNAME</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $all_users as $user ) : ?>
                    <tr>
                        <td><?php echo $user['id']?></td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['username']?></td>
                        <td><a href="/users/<?php echo $user['id'];?>" class="btn btn-sm btn-primary">EDIT</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>

<?php $this->stop() ?>