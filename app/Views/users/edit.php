<?php $this->layout('layout::main') ?>

<?php $this->start('main-area') ?>

    <div class="card shadow">
        <div class="card-body">

            <h3>Edit : <?php echo $user['name']?> (<?php echo $user['id']?>)</h3>

            <?php if(isset($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $e) : ?>
                        <div><?php echo $e; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="/users/<?php echo $user['id']?>" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>

                    <input type="text" name="name" id="name" 
                    value="<?php echo $old['name'] ?? $user['name']  ; ?>"
                    class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" 
                    value="<?php echo $old['email'] ?? $user['email'] ; ?>"
                    class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" 
                    value="<?php echo $old['username'] ?? $user['username'] ; ?>"
                    class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['username'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" 
                    value=""
                    class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                    value=""
                    class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>">

                    <div class="invalid-feedback"><?php echo $errors['confirm_password'] ?? ''; ?></div>

                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>

                    <select class="form-select  <?php echo isset($errors['role']) ? 'is-invalid' : ''; ?>"
                     id="role" name="role" aria-label="Please select role">
                        <option value="">Please select role</option>
                        <option value="admin" <?php echo (($old['role'] ?? $user['role']) == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="normal" <?php echo (($old['role'] ?? $user['role']) == 'normal') ? 'selected' : ''; ?>>Normal</option>
                    </select>
                    <div class="invalid-feedback"><?php echo $errors['role'] ?? ''; ?></div>            

                </div>

                <button class="btn btn-primary">SUBMIT</button>

            </form>




        </div>
    </div>

<?php $this->stop() ?>