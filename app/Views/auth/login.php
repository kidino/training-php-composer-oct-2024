<?php $this->layout('layout::main') ?>


<?php $this->start('main-area') ?>

    <div class="card shadow" style="max-width:600px; margin: auto;">
        <div class="card-body">
            <h3>Login Form</h3>

            <?php if(isset($error)) : ?>
                <div class="alert alert-danger"><?php echo $error?></div>
            <?php endif; ?>

            <?php if(isset($_GET['loggedout'])) : ?>
                <div class="alert alert-success">You have successfully logged out.</div>
            <?php endif; ?>

            <form action="/login" method="post">

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" 
                        value="<?php echo $username ?? ''; ?>"
                    class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button class="btn btn-primary">SUBMIT</button>
               
<style>

/* Custom styling for the checkbox */
.custom-checkbox {
    cursor: pointer;
    font-size: 1.5em;
    color: gray;
    opacity: 0;
    position: absolute;
}

/* Change color and icon when checkbox is checked */
.custom-checkbox input[type="checkbox"]:checked + i {
    color: green;
}

.custom-checkbox input[type="checkbox"] + i.fa-eye-slash {
    color: gray;
}

.custom-checkbox input[type="checkbox"]:checked + i.fa-eye-slash {
    content: none;
    display: none;
}

.custom-checkbox input[type="checkbox"]:checked + i:before {
    content: "\f06e"; /* Font Awesome eye icon */
    color: green;
}


</style>
<script>

    function toggle_password() {
        let checkbox = document.getElementById('checkbox');
        let passfield = document.getElementById('passfield'); 

        if(checkbox.checked) {
            passfield.type = 'text'
        } else {
            passfield.type = 'password'

        }
    }
</script>


            </form>

        </div>
    </div>





<?php $this->stop() ?>