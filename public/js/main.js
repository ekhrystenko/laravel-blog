$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    let showPass = $('#show-pass');
    let pass = $('#password');
    let showPassConfirm = $('#show-pass-confirm');
    let passConfirm = $('#password-confirm');

    showPass.on('click', function (){
        if (pass.attr('type') === 'password') {
            pass.attr('type', 'text')
            showPass.children('.far').removeClass('fa-eye').addClass('fa-eye-slash').attr('title', 'Скрыть пароль')
        } else {
            pass.attr('type', 'password')
            showPass.children('.far').removeClass('fa-eye-slash').addClass('fa-eye').attr('title', 'Показать пароль')
        }
    });

    showPassConfirm.on('click', function (){
        if (passConfirm.attr('type') === 'password') {
            passConfirm.attr('type', 'text')
            showPassConfirm.children('.far').removeClass('fa-eye').addClass('fa-eye-slash').attr('title', 'Скрыть пароль')
        } else {
            passConfirm.attr('type', 'password')
            showPassConfirm.children('.far').removeClass('fa-eye-slash').addClass('fa-eye').attr('title', 'Показать пароль')
        }
    });

    let fade_out = function () {
        $('.fade-out').hide(1000);
    };
    setTimeout(fade_out, 3000)

    $('#add-category-form').on('submit', function (e) {
        e.preventDefault(e);

        var form = this;
        var title = $('input[name=title]').val();

        $.ajax({
            url: $(form).attr('action'),
            type: $(form).attr('method'),
            data: {title: title},
            dataType: 'json',
            success: function (response) {
                if (response.status === 0){
                    $('input[name=title]').addClass('is-invalid');
                        $.each(response.error, function (prefix, value){
                            $('p.'+prefix+'-error').text(value[0]);
                        })
                } else {
                    $(form)[0].reset();
                    $('#added-success').modal('show');
                }
            },
        });
    });
});

