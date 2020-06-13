<!-- JS | Custom script for all pages -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        if (data.enrolled) $this.replaceWith("enrolled")
        $this.hide()
        console.log(data);
    });
});
</script>
<script>
function myFunction() {
    document.getElementById("bell").style.color = "yellow";
}
</script>
<script>
function myFunctionOff() {
    document.getElementById("bell").style.color = "black";
}
</script>

<script type="text/javascript">
$( document ).ready(function() {

  $('#mylink').on('click',function() {
    $( "#bell" ).css('color','yellow');
    localStorage.setItem('isCliked', true);
  });
  $('#bell').on('click',function() {
    $( "#bell" ).css('color','green');
    localStorage.setItem('isCliked', false);
  });

    });
    $( window ).on( "load", function() {
        if(localStorage.getItem('isCliked') === "true"){
            // console.log('ana hana');
        document.getElementById("bell").style.color = "yellow";
        }else{
            document.getElementById("bell").style.color = "green";
        }
        // console.log(typeof(localStorage.getItem('isCliked')));
    });
</script>
