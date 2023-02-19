$('.button').click(function (e) {
    e.preventDefault();


    let login = $('input[name="login"]').val();
    let pass = $('input[name="password"]').val();


    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: pass,
        },
        success(data) {
            if (data['status']) {
                document.location.href = 'profile.php'
            } else {
                if (data.type === 1) {
                    data.field.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('erorr');
                    });
                }
                $('.mass').text(data['mass']);
            }
        }
    });

});


let avatar = false;

$('input[name="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});

$('.reg__button').click(function (e) {
    e.preventDefault();


    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        full_name = $('input[name="full_name"]').val(),
        email = $('input[name="email"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('full_name', full_name);
    formData.append('email', email);
    formData.append('avatar', avatar);


    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {

            if (data.status) {
                document.location.href = '../index.php';
            } else {

                if (data.type === 1) {
                    data.field.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('erorr');
                    });
                }

                $('.msg').text(data.mass);

            }

        }
    });

});


$('.new').click(function (e) {
    e.preventDefault();


    let email = $('input[name="email"]').val();


    $.ajax({
        url: 'vendor/new_passw.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
        },
        success(data) {
            if (data['status']) {
                $(`.form_cod`).removeClass('form_cod');
                $('.new').disabled;
            } else {
                if (data.type === 1) {
                    data.field.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('erorr');
                    });
                }
                $('.mass').text(data['mass']);
            }
        }
    });

});


$('.cod_button').click(function (e) {
    e.preventDefault();

    let cod = $('input[name="cod"]').val();

    $.ajax({
        url: 'vendor/cod.php',
        type: 'POST',
        dataType: 'json',
        data: {
            cod: cod,
        },
        success(data) {
            if (data['status']) {
                $(`.form_pass`).removeClass('form_pass');
            } else {
                if (data.type === 1) {
                    $(`input[name="${data.field}"]`).addClass('erorr');
                }
                $('.mass').text(data['mass']);
            }
        }
    });

});

$('.pass_button').click(function (e) {
    e.preventDefault();

    let passw = $('input[name="passw"]').val();
    let mail = $('input[name="email"]').val();


    $.ajax({
        url: 'vendor/create.php',
        type: 'POST',
        dataType: 'json',
        data: {
            passw: passw,
            mail: mail,
        },
        success(data) {
            if (data['status']) {
                document.location.href = '/index.php'
            } else {
                if (data.type === 1) {
                    data.field.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('erorr');
                    });
                }
                $('.mass').text(data['mass']);
            }
        }
    });

});
