$(document).ready(function() {
    var baseurl = $('#baseurl').val();
    var external_plugins = $('#external_plugins').val();
    var external_filemanager_path = $('#external_filemanager_path').val();

    	$(".dataTable").DataTable({
			"ordering": false,
			"bLengthChange": false,
			"bAutoWidth": false,
			"bPaginate": false,
			"bInfo": false,
			"bDestroy":true,
			"pageLength": 20
		});
        $(".dataTablePagination").DataTable({
            "pagingType": "simple_numbers",
            "ordering": false,
            "bLengthChange": false,
            "bAutoWidth": false,
            "bPaginate": true,
            "bInfo": false,
            "bDestroy":true,
            "pageLength": 20
        });
        $('a.resetbtn').confirm({
            title: 'Delete Data ?',
            content: 'Are You Sure !',
            draggable: false,
            animation: 'zoom',
            closeAnimation: 'scale',
            autoClose: 'close|8000',
            buttons: {
                ok: function(){
                    location.href = this.$target.attr('href');
                },
                close: function(){
                }
            }
        });

       /* $('.resetbtn').click(function(event) {
          if (confirm('Are You Sure??') == true) {
            return true;
          } else{
            return false;
          }
        });*/

        $(".datepicker").datepicker({
            format:"yyyy-mm-dd",
            todayHighlight:!0,
            autoclose:!0,
        });
        $('.fancy').fancybox();
        
		$('.select2').select2();

        $('.read').on('change', function () {
                read = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/1/" + read,
                    type: "GET"
                });
            });
            $('.write').on('change', function () {
                write = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/2/" + write,
                    type: "GET"
                });
            });
            $('.edit').on('change', function () {
                edit = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/3/" + edit,
                    type: "GET"
                });
            });
            $('.delete').on('change', function () {
                del = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/4/" + del,
                    type: "GET"
                });
            });

            $('.approve').on('change', function () {
                approve = $(this).val();
                console.log(approve);
                $.ajax({
                    url: "book-approve/" + approve,
                    type: "GET"
                });
            });


    tinymce.init({
        /* replace textarea having class .tinymce with tinymce editor */
        selector: "textarea.tinymce",
        relative_urls: false,
        remove_script_host : false,
        
        /* theme of the editor */
        theme: "modern",
        skin: "lightgray",
        
        /* width and height of the editor */
        width: "100%",
        height: 400,
        
        /* display statusbar */
        statubar: true,
        content_style: ".mce-content-body {font-size:16px;}",
        
        /* plugin */
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "save table contextmenu directionality emoticons template paste textcolor"
        ],

        /* toolbar */
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | preview code",
        
        /* style */
        style_formats: [
          {title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
          ]},
          {title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
          ]},
          {title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
          ]},
          {title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
          ]}
        ],
        formats: {
            aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center', styles: {display: 'block', margin: '0px auto', textAlign: 'center'}},
        },
        filemanager_crossdomain: true,
          external_filemanager_path:external_filemanager_path,
          external_plugins: { "filemanager" : external_plugins},
    });
            
    });


function responsive_filemanager_callback(field_id){
    if (field_id == 'image') {
        var image = $('#' + field_id).val();
        $('#prev_img').attr('src',image);
    }

    if (field_id == 'banner_image') {
        var image = $('#' + field_id).val();
        $('#prev_banner_img').attr('src',image);
    }

    if (field_id == 'main_banner_image') {
        var image = $('#' + field_id).val();
        $('#prev_main_banner_img').attr('src',image);
    }

    if (field_id == 'logo') {
        var image = $('#' + field_id).val();
        $('#prev_logo_img').attr('src',image);
    }

    if (field_id == 'authorization_bg_image') {
        var image = $('#' + field_id).val();
        $('#prev_authorization_bg_img').attr('src',image);
    }

}

$(".remove_box_image").click(function(event) {
    var baseurl = $('#baseurl').val();
    var no_image = baseurl+"/admin/images/no-image.png";
      $('#prev_img').attr('src', no_image);
      $('#featured_image').val('');
      $('#image').val('');
      $('.remove_box_image').hide();
      $('.prev_box_image').show();
});

$(".remove_box_image_scan_pay").click(function(event) {
    var baseurl = $('#baseurl').val();
    var no_image = baseurl+"/admin/images/no-image.png";
      $('#prev_img_scan_pay').attr('src', no_image);
      $('#scan_pay').val('');
      $('.remove_box_image_scan_pay').hide();
      $('.prev_box_image_scan_pay').show();
});

$(".deletefile").click(function(event) {
    if (confirm('Are You Sure ? ?') == true) {
        $('#file').val('');
        $('#filearea').hide();
    }else{
        return false;
    }
});