<script src="{{asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/back/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/fullcalendar/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/back/js/demo.js')}}"></script>
<script>
    $(function() {
        var currColor = '#3c8dbc'
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            currColor = $(this).css('color')
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            ini_events(event)

            $('#new-event').val('')
        })
    })

    function deleteConfirmation(event, text = false) {
        event.preventDefault();

        Swal.fire({
            title: text ? 'Are you sure?' + text : 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }

    function toHref(event, text = false) {
        event.preventDefault();

        Swal.fire({
            title: text ? 'Are you sure?' + text : 'Are you sure?',
            text: "You will exit!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, exit!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Eğer kullanıcı onaylarsa, bağlantıya git
                window.location.href = event.target.getAttribute('href');
            }
        });
    }
</script>
