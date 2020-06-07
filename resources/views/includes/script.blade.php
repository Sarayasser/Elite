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
        $this.hide()
        console.log(data);
    });
});
</script>