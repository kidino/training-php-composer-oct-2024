<?php $this->layout('layout::main') ?>


<?php $this->start('main-area') ?>

    <div class="card shadow" style="max-width:600px; margin: auto;">
        <div class="card-body">
            <h3>Register Form</h3>

            <?php if(isset($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $e) : ?>
                        <div><?php echo $e; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="/register" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" 
                    value="<?php echo $data['name'] ?? '' ; ?>"
                    class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" 
                    value="<?php echo $data['email'] ?? '' ; ?>"
                    class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" 
                    value="<?php echo $data['username'] ?? '' ; ?>"
                    class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['username'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" 
                    value="<?php echo $data['password'] ?? '' ; ?>"
                    class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                    value="<?php echo $data['confirm_password'] ?? '' ; ?>"
                    class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['confirm_password'] ?? ''; ?></div>

                </div>

                <button class="btn btn-primary">SUBMIT</button>

            </form>

        </div>
    </div>





<?php $this->stop() ?>