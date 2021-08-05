<?php
    include_once '../config/db.php';
    include_once '../models/ContactUs.php';

    $title = "Contact Us | Nishka HMS";
    $page_name = "Contact";

    $INPUT = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    if (isset($INPUT['submit'])) {
        
        // Contact Us table (contact_us)
        $fname = $INPUT['fname'];
        $email = $INPUT['email'];
        $message = $INPUT['message'];
        
        $contact_payload = array(
            "fname" => $fname,
            "email" => $email,
            "message" => $message,
        );
        
        $contact_us = new ContactUs();
        $contact_us -> create($contact_payload);
        
        echo '<script>alert("Thank you for contact with us")</script>';
    }
?>
<!DOCTYPE html>
<html>
<?php
include_once '../comps/head.php';
?>
<body>
    <style>
        .container{
            margin-top: 1rem;
        }
        .cont-content{
            margin-top: 1rem;
            margin-bottom: 5rem;
        }
        form{
            margin-top: 3rem !important;
        }
    </style>
    <?php
include_once '../comps/header.php';
?>
    <main class="contact-page">
        <div class="container">
            <h1 class="title">Contact Us</h1>
            <div class="cont-content">
                <img src="../media/contact/contact-hero.png" alt="Contact Hero">
                <h2 class="cont-desc" data-aos="fade-down" data-aos-duration="800">
                    We are always here to help you if you have any <br />type of query or other,
                    Give us feedback  or contact us<br /> for suggestions or services so we can make our
                    self more better,<br /> Because better service can make you helthier.
                </h2>
            </div>
            <div class="form-container contact-form">
                <form name="cont-form" method="post" class="contact" onsubmit="return validateform();">
                    <h2 class="heading">Contact Us Form</h2>
                    <input name="fname" type="text" placeholder="Full Name"/>
                    <input name="email" type="email" placeholder="Email">
                    <textarea name="message" type="text" placeholder="Message" rows="4">We like your services very much</textarea>
                    <button name="submit" type="submit" id="submit" value="submit">Send Message</button>
                </form>
            </div>
        </div>
    </main>
</body>

<script>
    AOS.init();
</script>

<script src="../files/validate.js"></script>
<script>
    // document.forms['cont-form'].addEventListener('submit', validateform);
    // Validation Script
    function validateform(event)
    {
        const form = document.forms['cont-form'];

        if (!form) {
            alert("Can't find form");
            return;
        }

        const nameInput = form['fname'];
        // validate Messanger name
        if (nameInput.value.length === 0) {
            alert("Require full name");
            nameInput.focus();
            return false;
        }
        else if (alphaspaceExp.test(nameInput.value) === false) {
            alert("Invalid name");
            nameInput.focus();
            return false;
        }
        
        const emailInput = form['email'];
        if (emailInput.value.length === 0) {
            alert("Require email");
            emailInput.focus();
            return false;
        }
        else if (emailExp.test(emailInput.value) === false) {
            alert("Invalid Email");
            emailInput.focus();
            return false;
        }

        const messageInput = form['message'];
        if (messageInput.value.length === 0) {
            alert("Require message");
            messageInput.focus();
            return false;
        }
        return true;
    }
</script>
</html>
