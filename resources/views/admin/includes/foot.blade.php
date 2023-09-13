<script src="{{asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/back/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/fullcalendar/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('assets/back/js/demo.js')}}"></script>
<script>
    var currentLocale = "{{ app()->getLocale() }}";
</script>

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

    $(document).ready(function() {
        $(".js-example-basic-multiple").select2({
            ajax: {
                url: function() {
                    // Get the URL from the data-url attribute of the select element
                    return $(this).data("url");
                },
                dataType: "json",
                delay: 250,
                data: function(params) {
                    console.log(params.term);
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    // JSON formatında nəticə qaytarın
                    const currentLocale = "{{ app()->getLocale() }}";
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name[currentLocale]
                        }))
                    };
                },
                cache: true,
            },
            minimumInputLength: 3,
        });

    });





    // document.addEventListener("input", function(e) {
    //     if (e.target.classList.contains('select2-search__field')) {
    //         getData('http://127.0.0.1:8000/admin/get_countries', e.target.value).then(res => {
    //             JSON.parse(res).forEach(country => {
    //                 const currentLocale = "{{ app()->getLocale() }}";
    //                 const countryName = country.name[currentLocale];
    //                 document.querySelector('.countries_select').innerHTML = ""
    //                 document.querySelector('.countries_select').insertAdjacentHTML('beforeend',
    //                     `<option value="${country.id}">${countryName}</option>`
    //                 )
    //                 if (document.querySelector('.select2-results__message')) {
    //                     document.querySelector('.select2-results__message').style.display = "none";
    //                 }
    //             })
    //         })
    //     }
    // })

    // Define handleChange function outside of the event handler
</script>