<?php
	/**
	 * view_login.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 00:23
	 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="login, signin">

    <title><?= (!empty($this->app_title) ? $this->app_title : 'Kugeza') . (isset($title) && !empty($title) ? " - $title" : "") ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="<?= base_url() ?>/assets/theme/assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/theme/assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/theme/assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/<?= base_url() ?>/assets/img/faviconapple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= base_url() ?>/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>/assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <style type="text/css">
        .update-pass {
            display: none;
        }

        .left {
            float: left;
            max-width: available;
            margin-left: -40px;

            margin-top: -46px;
            font-family: inherit;
            width: 60%;
        }

        .first-heading {
            color: darkred;
            font-weight: bold;
            font-size: xxx-large;

        }

        .second-heading {
            color: darkred;
            font-weight: bolder;
            font-size: xxx-large;

        }

        .third-heading {
            font-weight: bolder;

        }

        .fourth-heading {
            font-weight: bolder;

        }


    </style>
</head>

<body>
<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>


<div class="row min-h-fullscreen center-vh p-20 m-0">
    <div class="left">
        <h2 class="first-heading">Student Portal  </h2>
        <img style="width: 110px; float: right; margin-top: -70px;" class="img-fluid "
             src="<?= base_url('assets/img/logo.jpg') ?>">
        <h1 class="second-heading">Gusoma Education <br>School of Kinyarwanda <br>
            <br>
        </h1>
        <h1 class="third-heading">
            All the information in one place.

        </h1>
        <h2 class="fourth-heading">
            Timetables, learning materials, student directory,<br> practical exercises platform.
        </h2>


    </div>
    <div class="right" style="float: right">

        <div class="col-12">
            <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
                <h5 class="text-uppercase">Sign in</h5>
                <br>

                <div class="form-type-material">
                    <div class="form-group">
                        <input type="email" class="form-control" id="username" name="username">
                        <label for="username">Email</label>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="password">Password</label>
                    </div>

                    <div class="form-group flexbox flex-column flex-md-row">
                        <a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="#" data-toggle="modal"
                           data-target="#modal-reset-pass">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-bold btn-block btn-primary button-login" type="submit">Login</button>
                    </div>
                    <div class="divider">Or Register Your Account</div>
                    <div class="text-center">
                        <button id="new-student" class="btn btn-info" href="#"><i class="fa fa-plus"></i> Register
                            Account
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>


<div class="modal fade" id="modal-reset-pass" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-reset-pass-Label">Reset My Password</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group has-form-text get-pass">
                    <label for="txtemail">Your Email: </label>
                    <input type="email" class="form-control" id="txtemail" value="" placeholder="Enter email">
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group has-form-text update-pass">
                    <label for="txtpassword">Your New Password: </label>
                    <input readonly type="text" class="form-control" id="txtpassword" value="" placeholder="">
                    <small class="form-text">Save the password somewhere else or in your browser.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-bold btn-pure btn-primary get-pass">Get Password</button>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Scripts -->
<script src="<?= base_url() ?>/assets/theme/assets/js/core.min.js" data-provide="sweetalert"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/app.min.js"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/script.min.js"></script>
<script>
    $('.button-login').click(e => {
        if ($("#username").val() == "") {
            app.toast('Please enter valid username');
        } else if ($("#password").val() == "") {
            app.toast('Please enter valid password');
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('login')?>`,
                type: 'POST',
                data: {
                    username: $("#username").val().trim(),
                    password: $("#password").val().trim(),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "success") {
                        window.location.href = '<?=base_url('/')?>';
                    } else {
                        $(".preloader ").css('display', 'none');
                        if (response.status == "validation") {
                            app.toast(response.msg, {
                                actionTitle: 'Validation',
                                actionColor: 'info'
                            });
                        } else {
                            app.toast('Something went wrong.Please Try again', {
                                actionTitle: 'Failed',
                                actionUrl: '<?=base_url('/')?>',
                                actionColor: 'danger'
                            });
                            window.location.reload();
                        }
                    }


                }
            })
        }
    });
    $('#modal-reset-pass button.get-pass').click(e => {
        if ($('#modal-reset-pass #txtemail').val() == "") {
            app.toast('Please enter valid email');
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('validate-email')?>`,
                type: 'POST',
                data: {
                    email: $('#modal-reset-pass #txtemail').val(),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "success") {
                        $(".update-pass").show();
                        $(".get-pass").hide();
                        $(".preloader ").css('display', 'none');
                        $('#modal-reset-pass #txtpassword').val(response.password)
                    } else {
                        $(".preloader ").css('display', 'none');
                        if (response.status == "validation") {
                            app.toast(response.msg, {
                                actionTitle: 'Validation',
                                actionColor: 'info'
                            });
                        } else {
                            app.toast('Something went wrong.Please Try again', {
                                actionTitle: 'Failed',
                                actionUrl: '<?=base_url('/')?>',
                                actionColor: 'danger'
                            });
                            window.location.reload();
                        }
                    }


                }
            })
        }
    });


    $("#new-student").click((_e) => {
        app.modaler({
            url: `<?=base_url('student-reg-content')?>?redirect=login`,
            type: 'center',
            size: 'lg',
            title: 'Student Registration',
            confirmVisible: false,
            onCancel: function (modal) {
                app.toast('You canceled it!');
            }
        });
    })
	<?php if(!empty($this->session->flashdata('message'))): ?>
    app.toast('<?=$this->session->flashdata('message')?>', {

        actionColor: 'info'
    });
	<?php endif; ?>
</script>
</body>
</html>


