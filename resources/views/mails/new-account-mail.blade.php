<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../../images/favicon.ico">
    <style type="text/css">
        /* FONTS */
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

    <!-- HIDDEN PREHEADER TEXT -->
    <div
        style="display: none; font-size: 1px; color: #000000; line-height: 1px; font-family: 'Poppins', sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        We're thrilled to have you here! Get ready to dive into your new account.
    </div>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td align="center">
                <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                            <a href="#" target="_blank" style="text-decoration: none;">
                                <img onerror="if (this.src != 'error.jpg') this.src = '/images/404-placeholder.png';" style="width:200px;" src="{{ asset('images/logo-dark-text.png') }}" alt="{{ config('app.name') }}" />
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            </td>
        </tr>
        <!-- HERO -->
        <tr>
            <td align="center" style="padding: 0px 10px 0px 10px;">
                <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 40px 20px 10px 20px; border-radius: 4px 4px 0px 0px;">
                            <h1
                                style="color: #000000; font-size: 29px; font-weight: 400; margin: 0; font-family: 'Poppins', sans-serif;">
                                Welcome to {{ config('app.name') }}</h1>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td align="center" style="padding: 0px 10px 0px 10px;">
                <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 10px 30px 10px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: center;">
                            <p style="margin: 0;">Thank you for signing up with {{ config('app.name') }}! We hope you
                                enjoy your time
                                with us. Check your account and update your profile.</p>
                        </td>
                    </tr>
                    <!-- BULLETPROOF BUTTON -->
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#ffffff">
                                                    <p target="_blank"
                                                        style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #000000; text-decoration: none; color: #000000; text-decoration: none; padding: 12px 50px; border-radius: 5px; display: inline-block;">
                                                        Email Address : {{ $account['email'] }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#ffffff">
                                                    <p target="_blank"
                                                        style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #000000; text-decoration: none; color: #000000; text-decoration: none; padding: 12px 50px; border-radius: 5px; display: inline-block;">
                                                        Password : {{ $account['password'] }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 20px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                            <p style="margin: 0;">If you have any questions, just reply to this email—we're always
                                happy
                                to help out.</p>
                        </td>
                    </tr>
                    <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                            <p style="margin: 0;">Cheers,<br>Team</p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            </td>
        </tr>
        <!-- FOOTER -->
        <tr>
            <td align="center" style="padding: 10px 10px 50px 10px;">
                <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <!-- NAVIGATION -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 30px 30px 30px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">
                                <a href="{{ route('dashboard') }}" target="_blank"
                                    style="color: #000000; font-weight: 500;">Dashboard</a>
                            </p>
                        </td>
                    </tr>
                    <!-- PERMISSION REMINDER -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 30px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">You received this email because you just signed up for a new account.
                                If it looks weird, <a href="{{ config('app.url') }}" target="_blank"
                                    style="color: #000000; font-weight: 500;">view it in your browser</a>.</p>
                        </td>
                    </tr>
                    <!-- UNSUBSCRIBE -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 30px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">If these emails get annoying, please feel free to <a href="#"
                                    target="_blank" style="color: #000000; font-weight: 500;">unsubscribe</a>.</p>
                        </td>
                    </tr>
                    <!-- ADDRESS -->
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 30px 30px; color: #000000; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">Admin - {{ config('app.name') }}</p>
                        </td>
                    </tr>
                    <!-- COPYRIGHT -->
                    <tr>
                        <td align="center"
                            style="padding: 30px 30px 30px 30px; color: #333333; font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">Copyright ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Admin. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
            </td>
        </tr>
    </table>

</body>

</html>
