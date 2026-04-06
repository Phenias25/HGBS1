<?php 
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HGBS Limited</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="mujawamariya vestina" name="keywords">
    <meta content="vestina" name="keywords">
    <meta content="cypadi.com" name="keywords">
    <meta content="cypadi developers" name="keywords">
    <meta content="cypadi" name="keywords">
    <meta content="High General Business and Supply LIMITED" name="description">
    <meta content="High General Business" name="keywords">
    <meta content="High General " name="keywords">
    <meta content="Supply LIMITED" name="keywords">
<?php include("top_resources.php")  ?>
    <style>
        .img-container{
            width:100%;
            height:250px;
            overflow: hidden;
            position: relative;
        }

        .img-fixed-size{
            width:100%;
            height:100%;
            object-fit:cover;
            object-position: center;
        }
    </style>
</head>

<body>
   <!-- Navbar Start -->
   <?php include("nav.php") ?>
    <!-- Navbar End -->

    <!-- Optional: jQuery for Bootstrap functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-dark mb-3">Updates</h1>
        <h3 class="bg-color text-white">View Our Updates </h3>
    </div>
    <!-- Page Header Start -->


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Latest <span class="text-primary">Articles</span> From Our Blog Post</h1>
        </div>
        <div class="row g-5">
           


       
<div class="container ">
    <div id="updates-container" class="row"></div>
    <div class="col-12">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg my-5 justify-content-center m-0" id="pagination">
                <!-- Pagination links will be inserted here dynamically -->
            </ul>
        </nav>
    </div>
</div>

        </div>
    </div>
    <!-- Blog End -->
    

  <!-- Footer Start -->
    <!-- Footer End -->

<?php include("footer.php") ?>
    <!-- JavaScript Libraries -->
<?php include("bottom_resources.php") ?>



<script>
$(document).ready(function(){
    function loadUpdates(page) {
        $.ajax({
            url: "fetch_updates.php",
            method: "POST",
            data: { page: page },
            dataType: "json",
            success: function(data) {
                let updatesHtml = '';
                $.each(data, function(index, update) {
                    // Fix path for server: use absolute path and fallback image
                    // Sanitize filename and check for missing image
                    let imgFilename = update.img ? update.img.trim() : '';
                    let imgSrc = `/mofi/assets/images/updatesImg/${imgFilename}`;
                    let fallbackImg = '/mofi/assets/images/updatesImg/default.jpg';
                    updatesHtml += `
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-light">
                            <div class="img-container">
                                <img class="img-fluid img-fixed-size" src="${imgSrc}" alt="" onerror="this.onerror=null;this.src='${fallbackImg}';">
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <span class=""><i class="far fa-calendar-alt text-primary me-2"></i>${new Date(update.date).toLocaleDateString('en-GB')}</span>
                                    </div>
                                </div>
                                <h4 class="text-uppercase mb-3">${update.title}</h4>
                                <p>${update.content}</p>
                                
                            </div>
                        </div>
                    </div>`;
                });
                $('#updates-container').html(updatesHtml);
            }
        });
    }

    function loadPagination(totalPages, currentPage) {
        let paginationHtml = '';

        if (currentPage > 1) {
            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">&laquo; Previous</a></li>`;
        } else {
            paginationHtml += `<li class="page-item disabled"><a class="page-link" href="#">&laquo; Previous</a></li>`;
        }

        for (let i = 1; i <= totalPages; i++) {
            if (i == currentPage) {
                paginationHtml += `<li class="page-item active"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
            } else {
                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
            }
        }

        if (currentPage < totalPages) {
            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">Next &raquo;</a></li>`;
        } else {
            paginationHtml += `<li class="page-item disabled"><a class="page-link" href="#">Next &raquo;</a></li>`;
        }

        $('#pagination').html(paginationHtml);
    }

    function loadPage(page) {
        $.ajax({
            url: "fetch_pagination.php",
            method: "GET",
            dataType: "json",
            success: function(totalPages) {
                loadUpdates(page);
                loadPagination(totalPages, page);
            }
        });
    }

    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        loadPage(page);
    });

    loadPage(1); // Load the first page by default
});
</script>


</body>

</html>