<div class="container-fluid sticky-top bg-dark shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <img src="img/company_logo.png"  alt="Company Logo" class="img-fluid img-resp">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link home">Home</a>
                    <a href="about.php" class="nav-item nav-link about">About Us</a>
                    <a href="tailoring.php" class="nav-item nav-link tailoring">Tailorings</a>
                    <a href="supply.php" class="nav-item nav-link supply">Supply</a>
                    <a href="update.php" class="nav-item nav-link update">Update</a>
                    <a href="contact.php" class="nav-item nav-link contact">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
    <style>
/* logo start responsive  */
    .navbar-brand .img-resp {
            max-height: 80px; /* Adjust the maximum height as needed */
        }
        @media (max-width: 768px) {
            .navbar-brand .img-resp {
                max-height: 60px; /* Adjust the maximum height for smaller screens */
            }
        }
        @media (max-width: 576px) {
            .navbar-brand .img-resp {
                max-height: 40px; /* Further adjust the maximum height for extra small screens */
            }
        }

        /* logo ends responsive  */

              /* coursel starts */

        .carousel-item img {
            height: 100vh;
            object-fit: cover;
        }


  
        @media (max-width: 768px) {
            .carousel-item img {
                height: 50vh; /* Adjust height for smaller screens */
            }
            .carousel-caption h1 {
                font-size: 2rem; /* Adjust heading size for smaller screens */
            }
        }
        @media (max-width: 576px) {
            .carousel-item img {
                height: 40vh; /* Further adjust height for extra small screens */
            }
            .carousel-caption h1 {
                font-size: 1.5rem; /* Further adjust heading size for extra small screens */
            }
        }
        </style>