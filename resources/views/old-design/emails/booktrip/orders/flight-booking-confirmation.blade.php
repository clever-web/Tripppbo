<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="x-apple-disable-message-reformatting">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34eb7c7267.js" crossorigin="anonymous"></script>

    <title>Trippbo</title>

    <style type="text/css" media="screen">
      @media only screen and (max-device-width: 450px), only screen and (max-width: 450px) {
        		h3{font-size: 15px !important;}
        		.booing_num{padding: 10px !important;}
        		.booing_num a{font-size: 13px; !important}
        		.table_area{display: block; }
        		.mid_left {padding: 10px !important;display: block !important;  border-right: none !important; width: 100% !important; border-bottom: 1px solid #f5dfe6;}
        		.mid_right{width:100% !important; }
        	}
    </style>
  </head>
  <body width="100%" style="font-family: Roboto; padding:0; margin:0;background:#000 !important;">
    <center style="width: 100%; background-color:#000; color: #000; line-height: 1.75;">
      <div style="max-width: 600px; margin: 0 auto; padding: 0;">
        <table width="100%" role="presentation" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
          <tbody>
            <tr style="box-sizing: border-box;">
              <td align="center" valign="top" style="padding: 2rem 0;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <!-- Header -->
                    <tr style="box-sizing: border-box;">
                      <td style="box-sizing: border-box; ">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody>
                            <tr style="box-sizing:border-box;">
                              <td style="margin: 0; box-sizing:border-box; background: #fff; padding-left: 1rem; padding-bottom: 1rem; border-bottom: 2px solid #ddd;">
                                <table class="header_top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" style="color: #fe2f70; ">
                                  <tbody>
                                    <tr style="box-sizing:border-box; ">
                                      <!-- <td style="box-sizing:border-box;  vertical-align: middle; width:30px;">
                                        <img src="https://i.ibb.co/DV7br2g/1.png" alt="4" width="30px" style="vertical-align: middle;">
                                      </td> -->
                                      <td style="box-sizing: border-box; vertical-align: middle;">
                                        <img src="https://i.ibb.co/PrtkzP7/trippbo-new.png" alt="TRIPPBOTEXT" border="0" style="width: 150px; height: 100%; vertical-align:middle;">
                                        <!-- <h3 style="font-size: 20px; color:#fe2f70; margin:0;">Budget<span style="color:#8DBF15; font-weight: 600;">Air</span>.se E-tcket </h3> -->
                                      </td>
                                      <td class="booing_num" style="box-sizing:border-box; margin: 0; background: #fe2f70; box-sizing: border-box; vertical-align: middle; text-align: right; padding:10px 1rem;">
                                        <p style="font-size: 10px; color:#fff; margin: 0; line-height:1">Booking number </p>
                                        <a href="tel:0966652" style="font-size: 15px; color:#fff; margin: 0; font-weight: 600; text-decoration: none;">{{$order->id}}</a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                          {{--       <table class="header_top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" style="color: #fe2f70; ">
                                  <tbody>
                                    <tr style="box-sizing:border-box; ">
                                      <td style="box-sizing:border-box;  vertical-align: middle; width: 30px;"><!-- https://i.ibb.co/cbK7zH0/5.png -->
                                        <img src="https://i.ibb.co/rfm2Fzw/users.png" alt="users" width="25px" style="vertical-align:bottom;">
                                      </td>
                                      <td style="box-sizing:border-box;  vertical-align: middle;">
                                        <p style="margin: 0; font-size:12px; color: #23242C; font-weight:600; vertical-align:middle;">Noura Makhzoum</p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table> --}}
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- Mid Area -->
                    <!-- 1st Table -->
                    @foreach ($booking_information['CommitBooking']['BookingDetails']['JourneyList']['FlightDetails']['Details'] as $segment )
                    <tr style="box-sizing: border-box;">
                        <td style="box-sizing: border-box;">
                          <table width="100%" cellspacing="0" cellpadding="20" border="0">
                            <tbody>
                              <tr style="box-sizing:border-box;">
                                <td style="margin: 0; box-sizing:border-box; background: #fff; ">
                                  <table class="mid-area" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" style="color: #fe2f70;">
                                    <tbody>
                                      <!-- 1st Table Head -->
                                      <tr style="box-sizing:border-box; ">
                                        <td style="background:#fe2f70; padding:10px 20px; border-radius: 10px 10px 0 0; vertical-align: middle;">
                                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                              <tr style="box-sizing:border-box">
                                                <td style="box-sizing:border-box;  vertical-align: middle; width:35px; ">
                                                  <img src="https://i.ibb.co/37p4FT8/Screenshot-21.jpg" alt="plane" width="30px" style="vertical-align:middle;">
                                                </td>
                                                <td style="box-sizing: border-box; vertical-align: middle;">
                                                  <h4 style="font-size: 13px; color:#fff; margin:0; font-weight: 500;"> {{$loop->first ? 'Departing Flight' : 'Returning Flight'}}, {{$booking_information['CommitBooking']['BookingDetails']['JourneyList']['FlightDetails']['Details'][0][0]['Origin']['DateTime']}}</h4>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                      <!-- 1st Table Body -->

                                      @foreach ($segment as $stop )
                                      <tr style="box-sizing:border-box; ">
                                        <td style="background:#fff; vertical-align: middle; border: 1px solid #f5dfe6;">
                                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                              <tr class="table_area" style="box-sizing:border-box">
                                                <!-- Left Area -->
                                                <td class="mid_left" style="box-sizing:border-box;  vertical-align: top; width:65%; background: #fff; padding: 10px 20px; border-right: 1px solid #f5dfe6; ">
                                                  <!-- 1St Table -->
                                                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                      <!-- 1St -->
                                                      <tr style="box-sizing:border-box; color: #fe2f70;">
                                                        <td style="font-size: 13px; color:#fe2f70; margin:0; font-weight: 500;">Depurture</td>
                                                        <td style="font-size: 13px; color:#fe2f70; margin:0; font-weight: 500;">Arrival</td>
                                                      </tr>
                                                      <!-- 2nd -->
                                                      <tr style="box-sizing:border-box">
                                                        <td style="box-sizing:border-box; vertical-align:top;">
                                                          <h6 style="font-size: 15px; color:#23242C; margin:0; font-weight: 600;">
                                                            @php
                                                                $departure = new Carbon\Carbon($stop['Origin']['DateTime']);
                                                            @endphp
                                                            {{$departure->format('h:i')}}
                                                        </h6>
                                                          <p style="font-size: 10px; color:#757575; margin:0; font-weight: 400;line-height:1;">{{$departure->format('l j F Y')}}</p>
                                                        </td>
                                                        <td style="box-sizing:border-box; vertical-align:top;">
                                                          <h6 style="font-size: 15px; color:#23242C; margin:0; font-weight: 600;">
                                                            @php
                                                            $arrival = new Carbon\Carbon($stop['Destination']['DateTime']);
                                                        @endphp
                                                            {{$arrival->format('h:i')}}
                                                        </h6>
                                                          <p style="font-size: 10px; color:#757575; margin:0; font-weight: 400;line-height:1;">{{$arrival->format('l j F Y')}}</p>
                                                        </td>
                                                      </tr>
                                                      <!-- 3rd -->
                                                      <tr style="box-sizing:border-box;">
                                                        <td style="box-sizing:border-box; vertical-align:top; padding:10px 0;">
                                                          <h6 style="font-size: 14px; color:#23242C; margin:0; font-weight: 600;">{{$stop['Origin']['CityName']}}</h6>
                                                          <p style="font-size: 10px; color:#757575; margin:0; font-weight: 400;line-height:1;">({{$stop['Origin']['AirportCode']}}) {{$stop['Origin']['AirportName']}}</p>
                                                        </td>
                                                        <td style="box-sizing:border-box; vertical-align:top; padding:10px 0;">
                                                          <h6 style="font-size: 14px; color:#23242C; margin:0; font-weight: 600;">{{$stop['Destination']['CityName']}}</h6>
                                                          <p style="font-size: 10px; color:#757575; margin:0; font-weight: 400;line-height:1;">({{$stop['Destination']['AirportCode']}}) {{$stop['Destination']['AirportName']}}</p>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <!--2nd Table -->

                                                </td>
                                                <!-- Right Area -->
                                                <td class="mid_right" style="box-sizing:border-box;  vertical-align: top; background: #fff; padding: 10px 20px;  width:35%;">
                                                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                      <!-- 1st -->
                                                      <tr style="box-sizing:border-box">
                                                        <td style="font-size: 12px; color:#fe2f70; margin:0; font-weight: 500;">PNR: {{$booking_information['CommitBooking']['BookingDetails']['PNR']}}</td>
                                                      </tr>
                                                      <tr style="box-sizing:border-box">
                                                        <td style="font-size: 12px; color:#fe2f70; margin:0; font-weight: 600; ">Airline PNR: {{$stop['AirlinePNR']}}</td>
                                                      </tr>
                                                      <!-- 2nd -->
                                                      <tr style="box-sizing:border-box">
                                                        <td style="font-size: 12px; color:#23242C; margin:0; font-weight: 600; padding-top:5px;">{{$stop['OperatorName']}}</td>
                                                      </tr>
                                                      <tr style="box-sizing:border-box">
                                                        <td style="font-size: 11px; color:#23242C; margin:0; font-weight: 600;">Operated by. {{$stop['OperatorName']}}</td>
                                                      </tr>
                                                   {{--    <tr style="box-sizing:border-box">
                                                        <td style="font-size: 9px; color:#23242C; margin:0; font-weight: 600; padding-bottom: 5px;">Flight time. 3 hour(s) 10 minute (s)</td>
                                                      </tr> --}}
                                                      <!-- 3rd -->
                                                      <tr style="box-sizing:border-box">
                                                        <td style="font-size: 10px; color:#23242C; margin:0; font-weight: 400;">Flight number. {{$stop['OperatorCode']}}-{{$stop['FlightNumber']}}</td>
                                                      </tr>

                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                      @endforeach



                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    @endforeach


                    <!-- Footer -->
                    <tr style="box-sizing:border-box">
                      <td style="box-sizing:border-box; background:#fe2f70; padding:10px 20px; vertical-align: middle;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr style="box-sizing:border-box">
                              <td style="font-size: 12px; color:#fff; margin:0; font-weight: 300;">Questions? <a href="#" style="color: #fff;font-weight: 400;"> FAQs</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </center>
  </body>
</html>
