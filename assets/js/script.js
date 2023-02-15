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
        success (data) {
           if (data['status']) {
               document.location.href = 'profile.php'
           }else {
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
        success (data) {

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





$('.new).click(function (e) {
    e.preventDefault();


    let login = $('input[name="mail"]').val();


    $.ajax({
        url: 'vendor/new_pass.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
        },
        success (data) {
            if (data['status']) {
                document.location.href = 'profile.php'
            }else {
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
