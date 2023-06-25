<? 
if($_SESSION['id_user']) {
    header("location: dashboard.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Akun</title>
</head>

<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>Login</label>
                        <hr>

                        <div class="form-group mt-3">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>

                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-login btn-success mt-3">LOGIN</button>
                        </div>

                    </div>
                </div>

                <div class="text-center" style="margin-top: 15px">
                    belum punya akun? <a href="regis.php">Silahkan Login</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-login").click(function() {

                var username = $("#username").val()
                var password = $("#password").val()

                if (username.length == "") {
                    Swal.fire({
                        type: 'warning',
                        title: 'Ooops..',
                        text: 'Username wajib diisi'
                    })
                }
                else if (password.length == "") {
                    Swal.fire({
                        type: 'warning',
                        title: 'Ooops..',
                        text: 'password wajib diisi'
                    })
                }else {
                    $.ajax({
                        url: "cek-login.php",
                        type : "POST",
                        data : {
                            "username": username,
                            "password" : password
                        },

                        success:function(response) {
                            
                            if(response == "success") {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Login berhasil',
                                    text: 'anda akan diarahkan selama 3 detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton:false
                                })
                                .then(function(){
                                    window.location.href = "dashboard.php"
                                })
                            }else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Login gagal',
                                    text: 'silahkan coba lagi',
                                })
                            }
                            console.log(response)
                        },
                        error: function(response) {
                            
                            Swal.fire({
                                type: 'error',
                                title: 'Opps! ',
                                text : 'server error!'
                            })

                            console.log(response)
                        }
                    })
                }
            })
        })
    </script>