<!DOCTYPE html>
<html lang="en">

<head>
    <title>trippbo</title>
    <style>
        body {
            margin: 0;
            background-color: rgb(211, 203, 203);
            padding: 0% 0% 2%;
        }

        td {
            padding: 0
        }

        img {
            border: 0
        }

        .wrapper {
            background-color: rgb(211, 203, 203);
            width: 100%;
            table-layout: fixed;
            margin: 0;
        }

        table {
            border-spacing: 0;
        }

        .main {
            width: 100%;
            max-width: 650px;
            background-color: rgb(255, 255, 255);
            font-family: sans-serif;
            border-spacing: 0;
            margin: 0;
        }

        .cosale {
            margin-left: 11px;
            width: 43px
        }

        .button {
            text-decoration: none;
            padding: 12px 20px;
            background: #FD2F70;
            color: white;
            font-size: 15px;
        }

    </style>
</head>

<body>
    <center class="wrapper">
        <table class="main">
            <!-- LOGO SECTION -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td class="logo"
                                style="text-align:center;background-color:#000941;padding:30px 0px 20px">
                                <a href="#"><img src="https://i.ibb.co/10NFrHg/TRIPPBOTEXT.png" width="140px"></a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- TEXT SECTION -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="font-size:13px;color: #333;padding: 35px 45px 90px 50px;">
                                <p style="font-size:19px;color:#524949">Your Request Has Been Accepted!</p>
                                <p style="font-size:14px;color:#524949;font-weight:600">Hi
                                    {{ $join_request->user->name }}</p>
                                <p style="padding:0px 0px 27px;line-height: 24px;">Your request to join <strong
                                        style="color:#FD2F70">{{ $join_request->trip->title }}</strong> has been
                                    accepted!.</p>
                                <!--  LINK -->
                                <a href="{{ route('trip-browse', $join_request->trip->id) }}" class="button">Go
                                    To Trip</a>

                                <p style="padding: 30px 0px 10px;">Sincerely</p>
                                <p>Trippbo</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="text-align:center;color:#4F567C;font-size: 13px;">
                                <p style="padding:0px 0px 20px">Sent With <img
                                        src="https://i.ibb.co/xSFT94j/Group-63499.jpg" width="20px"> From Trippbo</p>
                                <a href="#" target="_blank"><img src="https://i.ibb.co/z6Czrm0/Group-63199-1.jpg"
                                        class="cosale" alt="circle-facebook" width="32px"></a>
                                <a href="#" target="_blank"><img src="https://i.ibb.co/rvg861s/Group-63200.jpg"
                                        class="cosale" alt="circle-instagram" width="32px"></a>
                                <a href="#" target="_blank"><img src="https://i.ibb.co/SsJkmSx/Group-63198.jpg"
                                        class="cosale" alt="circle-linkedin" width="32px"></a>
                                <p style="padding:14px 0px 0px;margin: 0;">Främsteby Karlsborg 13, KÄvlinge . Sweden</p>
                                <img src="https://i.ibb.co/pd0WXZf/Group-63498-1-1.png"
                                    style="width: 657px;height: 120px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </center>
</body>

</html>
