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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('930726ab58530fa68731', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('post-added', function(data) {
      toastr.success('New Post added to Course'+ " " +JSON.stringify(data.message).replace(/['"]+/g, '') , {timeout:10000});
      toastr.options.hideMethod = 'slideUp';
      toastr.options.closeButton = true;
    });
    channel.bind('event-added', function(data) {
      toastr.success('New Event added'+ " " +JSON.stringify(data.message).replace(/['"]+/g, '') , {timeout:10000});
      toastr.options.hideMethod = 'slideUp';
      toastr.options.closeButton = true;
    });
    channel.bind('schedule-added', function(data) {
      toastr.success('New Schedule added to Course'+ " " +JSON.stringify(data.message).replace(/['"]+/g, '') , {timeout:10000});
      toastr.options.hideMethod = 'slideUp';
      toastr.options.closeButton = true;
    });
</script>
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}" , {timeout:10000});
            toastr.options.closeButton = true;
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
@toastr_js
@toastr_render
