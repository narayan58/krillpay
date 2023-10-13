<script type="text/javascript" src="{{ asset('frontend/scripts/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/jquery.twbsPagination.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/jquery.knob.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/swiperRunner.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/hy-drawer.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/mobile-overlay.js') }}"></script>


<script>
  baseurl = $('#baseurl').val();
    //for contact us
    $('#contact_us_btn').click(function(event) {
            event.preventDefault();
            $('#contact_error').html('');
            $("#contact_success").html("");
            $('#contact_name').css({'border' : '1px solid #e7e6e6'});
            $('#contact_email').css({'border' : '1px solid #e7e6e6'});
            $('#contact_message').css({'border' : '1px solid #e7e6e6'});


          $('#contact_us_btn').html('Sending..');
          var baseurl=$('#baseurl').val();
          $.ajax({
            url: baseurl+'/postcontact',
            type: 'POST',
            data: $('#contact-form').serialize(),
          })
          .always(function(resp) {
            console.log(resp)
                if (resp.error == true) {

                    if(resp.errors.name){
                      $('#contact_name').css({'border' : '1px solid #ff0000'});
                      $('#contact_error').html('Please input the required fields');
                    }
                   
                    if(resp.errors.email){
                      $('#contact_email').css({'border' : '1px solid #ff0000'});
                      $('#contact_error').html('Please input the required fields');
                    } 

                    if(resp.errors.message){
                        $('#contact_message').css({'border' : '1px solid #ff0000'});
                        $('#contact_error').html('Please input the required fields');
                    }
                    $('#contact_us_btn').html('Send message');
                }else{
                    $('#contact_success').html(resp.message);
                    $('#contact_us_btn').hide();
                    $('#contact-form')[0].reset();
                    $('#contact_us_btn').html('Send message');
                    $('#contact_us_btn').show();
                }
          });
    });

    //for news letters
    $('#newsLetterBtn').click(function(event) {
        event.preventDefault();
        $("#NewsletterEmail").html("");
        $("#success_message_news_letter").html("");

        $.ajax({
            url: baseurl+'/newsletter',
            type: 'POST',
            data: $('#subscribe-form').serialize(),
        })
        .always(function(resp) {
            console.log(resp);
            if (resp.error == true) {
                if(resp.errors){
                  $('#NewsletterEmail').html(resp.errors);
                }
            }if (resp.error== false){
                $('#success_message_news_letter').html(resp.message);
                $('#subscribe-form')[0].reset();
                $('#newsLetterBtn').show();
            }
        });
    });
</script>
@stack('script')