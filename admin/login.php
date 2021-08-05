<?php
    include_once '../config/db.php';
    include_once '../models/AdminCredential.php';
    include_once '../lib/utils.php';

    $title= "Admin Login | Nishka HMS";
    $page_name= "Login";

    $INPUT = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    if (isset($INPUT['submit'])) {

        $uname = $INPUT['user-name'];
        $password = $INPUT['password'];

        $admin_cred= new AdminCredential();
        $cred_list= $admin_cred->find_by_uname_password($uname, $password);

        init_admin_session($uname, $password);
    }
?>
<!DOCTYPE html>
<html>
<?php
    include_once '../comps/head.php';
?>
<body>
    <style>
        .form-container{
            margin-top: 8rem;
        }
    </style>
    <?php
        include_once '../comps/header.php';
    ?>
    <main>
        <div class="container">
            <div class="form-container">
                <form method="post" name="login-form" action="" class="contact" onsubmit="return validateform();">
                    <h2 class="heading">Login Form</h2>
                    <input name="user-name" type="text" placeholder="Username"/>
                    <input name="password" type="password" placeholder="Password">
                    <button id="submit" value="submit" name="submit" type="submit">Login Now</button>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../files/validate.js"></script>
<script>
    // Validation Script
    function validateform(event)
    {
        const form = document.forms['login-form'];

        if (!form) {
            alert("Can't find form");
            return;
        }

        // Validation script
        const uNameInput = form['user-name'];
        if (uNameInput.value.length === 0) {
            alert("Require user name");
            uNameInput.focus();
            return false;
        }
        else if (uNameInput.value.length <= 8) {
            alert("Username length must be more than 8 characters");
            uNameInput.focus();
            return false;
        }
        else if (usernameExp.test(uNameInput.value) === false) {
            alert("Invalid user name");
            uNameInput.focus();
            return false;
        }

        const passInput = form['password'];
        if (passInput.value.length === 0) {
            alert("Require password");
            passInput.focus();
            return false;
        }
        else if (passInput.value.length <= 8) {
            alert("Password length must be more than 8 character");
            passInput.focus();
            return false;
        }
        return true;
    }
</script>
</html>