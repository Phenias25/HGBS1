<!DOCTYPE html>
<html lang="en">

<head>  
    <meta charset="utf-8">
    <title>HGBS Limited</title>
    <meta    content="width=device-width, initial-scale=1.0" name="viewport">
    <meta      content="mujawamariya vestina" name="keywords">
    <meta content="vestina" name="keywords">
    <meta content="cypadi.com" name="keywords">
    <meta content="cypadi developers" name="keywords">
    <meta content="cypadi" name="keywords">
    <meta content="High General Business and Supply LIMITED" name="description">
    <meta content="High General Business" name="keywords">
    <meta content="High General " name="keywords">
    <meta content="Supply LIMITED" name="keywords">

<?php include("top_resources.php") ?>

<style>
    .contact{
            color:#FD5D14 !important;
        }
</style>
</head>

<body>
   <!-- Navbar Start -->
<?php include('nav.php') ?>
    <!-- Navbar End -->

    <!-- Optional: jQuery for Bootstrap functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-dark mb-3">Contact</h1>
        <h3 class="bg-color text-white">Feel Free Contact Us </h3>
    </div>
    <!-- Page Header Start -->


   <!-- Contact Start -->
<div class="container-fluid py-6 px-3 d-flex flex-column align-items-center justify-content-center">
    <div class="text-center mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">Please <span class="text-primary">Feel Free</span> To Contact Us</h1>
    </div>

    <div class="row w-100">
        <div class="col-lg-6 mx-auto">
            <div class="contact-form bg-light p-4 p-sm-5">
                <form action="process_contact.php" class="form" method="post">
                <div class="alert alert-success d-none" id="success-msg">Message delivered Successfuly</div>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="my_name" class="form-control border-0" placeholder="Your Name" style="height: 55px;" required>
                            <div class="validation-zone error-name"></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" required>
                            <div class="validation-zone error-email"></div>
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control border-0" placeholder="Subject" style="height: 55px;" required>
                            <div class="validation-zone error-subject"></div>
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control border-0" rows="4" placeholder="Message" required></textarea>
                            <div class="validation-zone error-message"></div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" id="send_email" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->





      <!-- Footer Start -->
      <?php include("footer.php") ?>
<!-- Footer End -->


<?php include("bottom_resources.php") ?>
<script src="js/contact.js"></script>
</body>

</html>