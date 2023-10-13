<!--<script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
--><script src="{{ asset('frontend/assets/js/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/fontawesome.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/slick.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/counter.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/waypoint.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/wow.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugin/plugin.js')}}"></script>
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>
<script src="{{ asset('frontend/assets/js/lunar.js')}}"></script>
<script
  type="text/javascript"
  src="https://app.termly.io/embed.min.js"
  data-auto-block="on"
  data-website-uuid="256fd8ff-70d9-416c-9bc6-8dca80c5345f"
  ></script>
<script>




//for contact us
$('#contact_us_btn').click(function(event) {
        event.preventDefault();
        $("#error_name").html("");
        $("#error_email").html("");
        $("#error_phone").html("");
        $("#error_service").html("");
        $("#error_message").html("");
        $("#contact_success").html("");

      $('#contact_us_btn').html('Sending..');
      $('#contact_us_btn').prop('disabled', true);
      var baseurl=$('#baseurl').val();
      $.ajax({
        url: baseurl+'/postcontact',
        type: 'POST',
        data: $('#contact_us_form').serialize(),
      })
      .always(function(resp) {
        console.log(resp)
            if (resp.error == true) {

                if(resp.errors.name){
                  $('#error_name').html(resp.errors.name[0]);
                }
                if(resp.errors.email){
                  $('#error_email').html(resp.errors.email[0]);
                }
                if(resp.errors.phone){
                  $('#error_phone').html(resp.errors.phone[0]);
                }
                if(resp.errors.service){
                  $('#error_service').html(resp.errors.service[0]);
                } 
               if(resp.errors.message){
                  $('#error_message').html(resp.errors.message[0]);
                }
                $('#contact_us_btn').html('Send Message');
                $('#contact_us_btn').prop('disabled', false);

            }else{
                $('#contact_success').html(resp.message);
                $('#contact_us_btn').hide();
                $('#contact_us_btn').prop('disabled', false);
                $('#contact_us_form')[0].reset();
                $('#contact_us_btn').html('Send Message');
                $('#contact_us_btn').show();


            }
                
      });
});


    //for news letters
    $('#newsLetterBtn').click(function(event) {
        event.preventDefault();
        $("#NewsletterEmail").html("");
        $("#success_message_news_letter").html("");
         $("#newsNameError").html("");
         $('#newsLetterBtn').html('Processing..');
        var baseurl=$('#baseurl').val();
        $.ajax({
            url: baseurl+'/newsletter',
            type: 'POST',
            data: $('#subscribe-form').serialize(),
        })
        .always(function(resp) {
            if (resp.error == true) {
                if(resp.errors.name){
                  $('#newsNameError').html(resp.errors.name[0]);
                }
                if(resp.errors.email){
                  $('#NewsletterEmail').html(resp.errors.email[0]);
                }
                         $('#newsLetterBtn').html('Subscribe');
            }if (resp.error== false){
                $('#success_message_news_letter').html(resp.message);
                $('#subscribe-form')[0].reset();
                $('#newsLetterBtn').show();
                $('#newsLetterBtn').html('SUBSCRIBE');
            }
        });
    });
    
    
    
    //for news letters
    $('#newsLetterBtn1').click(function(event) {
        event.preventDefault();
        $("#NewsletterEmail1").html("");
        $("#success_message_news_letter1").html("");
         $("#newsNameError1").html("");
         $('#newsLetterBtn1').html('Processing..');
        var baseurl=$('#baseurl').val();
        $.ajax({
            url: baseurl+'/newsletter',
            type: 'POST',
            data: $('#subscribe-form1').serialize(),
        })
        .always(function(resp) {
            if (resp.error == true) {
                if(resp.errors.name){
                  $('#newsNameError1').html(resp.errors.name[0]);
                }
                if(resp.errors.email){
                  $('#NewsletterEmail1').html(resp.errors.email[0]);
                }
                         $('#newsLetterBtn1').html('Subscribe');
            }if (resp.error== false){
                $('#success_message_news_letter1').html(resp.message);
                $('#subscribe-form1')[0].reset();
                $('#newsLetterBtn1').show();
                $('#newsLetterBtn1').html('SUBSCRIBE');

            }
        });
    });
    
    
        //for news letters
    $('#newsLetterBtn2').click(function(event) {
        event.preventDefault();
        $("#NewsletterEmail2").html("");
        $("#success_message_news_letter2").html("");
         $("#newsNameError2").html("");
         $('#newsLetterBtn2').html('Processing..');
        var baseurl=$('#baseurl').val();
        $.ajax({
            url: baseurl+'/newsletter',
            type: 'POST',
            data: $('#subscribe-form2').serialize(),
        })
        .always(function(resp) {
            if (resp.error == true) {
                if(resp.errors.name){
                  $('#newsNameError2').html(resp.errors.name[0]);
                }
                if(resp.errors.email){
                  $('#NewsletterEmail2').html(resp.errors.email[0]);
                }
            $('#newsLetterBtn2').html('Subscribe');
            }if (resp.error== false){
                $('#success_message_news_letter2').html(resp.message);
                $('#subscribe-form2')[0].reset();
                $('#newsLetterBtn2').show();
                $('#newsLetterBtn2').html('SUBSCRIBE');
            }
        });
    });
    
    
        //for news letters
        
        </script>
    
@stack('script')