$(document).ready(function () {



    // var jobheading = $('.job-heading').text();

    $(".form").on("submit", function (e) {
        // alert("hello world");
        e.preventDefault();


        var dataObject = new FormData(this);

        // dataObject.
        console.log(dataObject);

        e.preventDefault();
        $.ajax({
            url: "process_contact.php",
            type: "POST",
            data: dataObject,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

            },
            success: function (response) {

                console.log(response);

                response = JSON.parse(response);


                if (response.my_name.length == 1 && response.subject.length == 1 && response.message.length == 1 && response.email.length == 1) {
                    $(".validation-zone").html("");
                    console.log('no erros left');

                    $('#send_email').html('Send Message <span class="spinner-border spinner-border-sm"></span>');


                    // $("#exampleModal").modal('hide');
                    // $(".filename").text('');
                    // $("#myupload").after('');
                    $(".form-control").val('');
                    // $('.first-select').attr("selected", true);

                    $.ajax({
                        url: "contact_msg.php",
                        type: "POST",
                        data: dataObject,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (e) {
                            console.log(e);
                            // alert(e);
                            if (e == "Message has been sent") {
                             
                                $('#send_email').html('Send Message');
                            }
                            $("#success-msg").removeClass('d-none');
                            $("#success-msg").fadeIn();
                            setTimeout(function () {
                                $("#success-msg").fadeOut();
                            }, 3000)

                         
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $("#result").html("Error: " + textStatus + ", " + errorThrown);
                        }


                    })



                }
                else {
                    // console.log(JSON.parse(response).fname[0]); 
                    // console.log(JSON.parse(response)); 



                    console.log(response);
                    // clear all validation text
                    $(".validation-zone").html("");
                    // console.log(response.fname.length);

                    if (response.email.length >= 2) {
                        // response.fname.forEach(error => {
                        $(".error-email").html(response.email.join(''));
                        // });

                    }
                    if (response.subject.length >= 2) {
                        // response.fname.forEach(error => {
                        $(".error-subject").html(response.subject.join(''));
                        // });

                    }
                    if (response.message.length >= 2) {
                        // response.fname.forEach(error => {
                        $(".error-message").html(response.message.join(''));
                        // });

                    }
                    if (response.my_name.length >= 2) {
                        // response.lname.forEach(error => {
                        $(".error-name").html(response.my_name.join(''));
                        // });

                    }



                }

            }
            ,
            error: function (e) {
                console.log(e);
            }

        })



    })
})