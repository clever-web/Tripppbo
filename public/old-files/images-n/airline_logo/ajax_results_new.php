<?php //echo '<pre>'; print_r($flight_result); exit; ?>
<?php //echo '<pre>san'; print_r($this->user_currency); exit;
  //echo '<pre>flight_result'; print_r($flight_result); exit;
if(!empty($flight_result)){  
    $flight_count_result=count($flight_result);
    $flight_count_result=$flight_count_result - 2;
    for($i=0;$i<$flight_count_result;$i++){ ?>

    <div class="f_r_one">

    <?php //for ($a=0; $a < count($CityAttraction) ; $a++) {
              
              //$name[] =  $attractionslist->results[$i]->name;
               $cntry =  $this->Flight_Model->get_airport_cityname($request->destination);
               $citycntry =  $this->Flight_Model->get_airport_citylist($request->destination);
             // echo '<pre>CityAttraction'; print_r(); exit;
                $height = $CityAttraction[$i]->photos[0]->height;
                $width = $CityAttraction[$i]->photos[0]->width;
                $photo_reference = $CityAttraction[$i]->photos[0]->photo_reference;
               $ref =  "https://maps.googleapis.com/maps/api/place/photo?photoreference=".$photo_reference."&sensor=false&maxheight=".$height."&maxwidth=".$width."&key=AIzaSyBJ21qviWcTinyciO6pEVFBSJp4FFQY1qY"
              ?>
             
             <div class="attractin_loop" data-id="<?php echo $i; ?>" >
                <div class="col-sm-4 nopad">
              <div class="flt_img">
                <img src="<?php echo $ref; ?>" alt="">
                <div class="weahter_icon">
                  <span><span class="sprte comm_weather weather"></span> <?php echo round($CityWether); ?> &#8451;</span>

                </div>
                <div class="img_citynm">
                  <!-- <span class="city_name"><?php echo $CityAttraction[$i]->name; ?></span>
                  <span class="city_txt"><?php echo $cntry; ?></span> -->
                  <span class="city_name"><?php echo $cntry; ?></span>
                  <span class="city_txt"><?php echo $citycntry->country; ?></span>
                </div>
              </div>
              <div class="left_sectxt_hide left_sectxt_hide_<?php echo $i; ?>">
              <?php echo $CityAttraction[$i]->formatted_address;  ?>
                <!-- <button type="button" class="btn btn_find_more">FIND OUT MORE</button> -->
              </div> 
           </div>
           </div>

     <?php  if ($flight_result[$i]['api_id'] == '4') {
        //echo '<pre>sas'; print_r(); exit;
      
   ?>
          
       
             <!-- City Tours -->
             
           <?php //} ?>
                <!-- End Of City Tours -->

           
          <div class="currentDiv<?php echo $i; ?>">
        <div class="flight_resul_loop filters" data-amount = "<?php echo $flight_result[$i]['amount']; ?>" data-onwardduration = "<?php echo $flight_result[$i]['onwards_duration']; ?>" data-returnduration = "<?php echo $flight_result[$i]['returns_duration']; ?>" data-onwardstops = "<?php echo $flight_result[$i]['onwards_stops']; ?>" data-returnstops = "<?php echo $flight_result[$i]['returns_stops']; ?>" data-airline = "<?php echo $flight_result[$i]['airline']; ?>" data-takeoff_one = "<?php echo $flight_result[$i]['takeoff_one']; ?>" data-landing_one = "<?php echo $flight_result[$i]['landing_one']; ?>" data-takeoff_round = "<?php echo @$flight_result[$i]['takeoff_round']; ?>" data-landing_round = "<?php echo @$flight_result[$i]['landing_round']; ?>" >
           <div class="col-sm-8 padfive_l_r right_all_result">

           <?php $detail_count = count($flight_result[$i]['FlightDetails']); 
                for($j=0;$j<$detail_count;$j++){ 
                  
                  if(isset($flight_result[$i]['FlightDetails'][$j]['flightId']) && $flight_result[$i]['FlightDetails'][$j]['flightId'] != ''){
                                    $flight_id=$flight_result[$i]['FlightDetails'][$j]['flightId'];
                                    $inner_segment_len=count($flight_result[$i]['FlightDetails'][$j]['dateOfDeparture']) - 1; ?>

               
              <div class="result_repeat">
                <div class="col-sm-2 col-xs-2 nopad text-center">
                  <div class="airline_logo">
                    <img src="https://c.fareportal.com/n/common/air/ai/<?php echo $flight_result[$i]['FlightDetails'][$j]['marketingCarrier'][0]; ?>.gif">
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="sprte comm_img plan"></span>
                  <div class="airname_time">
                  <?php 
                 /* $tes = number_format((float)$flight_result[$i]['FlightDetails'][$j]['timeOfDeparture'][0], 2, ':', '');
                  echo '<pre>'; print_r($tes);*/
                  //echo '<pre>san'; print_r($flight_result[$i]['FlightDetails'][$j]); exit;
                  $departuretime = str_split($flight_result[$i]['FlightDetails'][$j]['timeOfDeparture'][0],2);
                  $departuretime = $departuretime[0].':'.$departuretime[1];
                  
                  $arrivaltime = str_split($flight_result[$i]['FlightDetails'][$j]['timeOfArrival'][$inner_segment_len],2);
                  $arrivaltime = $arrivaltime[0].':'.$arrivaltime[1];
                  ?>
                    <span class="air_time"><?php echo $departuretime;   ?> - <?php echo $arrivaltime;  ?></span>
                    <span class="air_name"><?php echo $flight_result[$i]['FlightDetails'][$j]['airlineName'][0]; ?></span>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-3 text-center nopad">
                  <span class="no_stop"><?php  
                                        if($flight_result[$i]['FlightDetails'][$j]['stops']==0){
                                            echo "Non-Stop";
                                        }else{
                                            echo $flight_result[$i]['FlightDetails'][$j]['stops']." "."Stop"; 
                                        }
                                      ?></span>
                    <span> 
                    <?php if (count($flight_result[$i]['FlightDetails'][$j]['disp_name']) > 1) { ?>
                      <?php 
                      //$cou = count($flight_result[$i]['FlightDetails'][$j]['disp_name']);
                      $val = $flight_result[$i]['FlightDetails'][$j]['disp_name'];
                      for ($m=0; $m < count($val) ; $m++) { 
                        $km = $m+1;
                        
                        $tst = substr($val[$km], 0, 3);  
                        
                        //echo $tst.',';
                        echo $tst;
                        
                      }
                      
                      //$cou = $cou - 1;
                     /* for ($i=0; $i < $cou; $i++) { 
                        

                      }*/
                      ?>
                   <?php  } ?> </span>
                </div>
               
                
                <div class="col-sm-3 col-xs-3 nopad">
                  <span class="hr_cal"><?php echo  str_replace(":","",substr($flight_result[$i]['FlightDetails'][$j]['durationFinalEft'], 0, -2));  ?></span>
                  <!-- $flight_result[$i]['FlightDetails'][$j]['timeOfArrival'][$inner_segment_len] -->
                  <?php //echo '<pre>dad'; print_r(); exit; ?>
                  <span class="from_whre"><?php echo  $flight_result[$i]['FlightDetails'][$j]['locationIdDeparture'][0];  ?> - <?php echo  $flight_result[$i]['FlightDetails'][$j]['locationIdArival'][$inner_segment_len]; ?></span>
                </div>
              </div>
              <?php } ?>
              <?php } ?>
              <!-- <div class="result_repeat">
                <div class="col-sm-2 col-xs-2 nopad text-center">
                  <div class="airline_logo">
                    <img src="<?php echo base_url(); ?>assets/images/wizzair.png">
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="sprte comm_img plan"></span>
                  <div class="airname_time">
                    <span class="air_time">14:25 - 16:55</span>
                    <span class="air_name">WizzAir</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3 text-center nopad">
                  <span class="no_stop">non-stop</span>
                </div>
                <div class="col-sm-3 col-xs-3 nopad">
                  <span class="hr_cal">2h 30m</span>
                  <span class="from_whre">KUT - ATH</span>
                </div>
              </div> -->
              <div class="clearfix"></div>
              <div id="demo<?php echo $i; ?>" class="collapse animate_right">
              <?php $segment = $this->Flight_Model->get_flight_data_segments($flight_result[$i]['flight_id']); 
                $segment_data  = json_decode($segment->segment_data,1); 
              // echo '<pre>segment_data'; print_r($segment_data); exit;
                ?>
                <!--  echo '<pre>test'; print_r($flight_result[$i]['FlightDetails']); exit; -->
                <?php
                      $req_typ1=json_decode($segment->request_scenario);
                      $req_typ=$req_typ1->type;
                      

                      if($req_typ=="roundtrip"){ ?>
                        <div class="all_flt_dtl">
                         <?php //echo '<pre/>san';print_r($segment_data));exit;
                    for($s=0;$s<(count($segment_data));$s++){
                      //echo $s;
                         //echo '<pre/>';print_r($segment_data[$s]);exit;
                     ?>
                     
                     <!-- echo '<pre>disp_name'; print_r($disp_name); -->
                  <?php //echo '<pre>segment'; print_r(); exit;  ?>
                     
                      <?php for($ss=0;$ss<count($segment_data[$s]['dateOfDeparture']);$ss++){
                        //echo '<pre>segment_data'; print_r(); exit;
                       ?>
                  <div class="flit_details">                    
                    <?php if ($s == 0) { ?>
                    <span class="sprte comm_img depart_plan"></span>
                       <span class="air_time">Depart</span>
                    <span class="from_whre fm_origin"><?php echo $segment_data[$s]['locationIdDeparture'][$ss]; ?> - <?php echo $segment_data[$s]['locationIdArival'][$ss]; ?></span>
                    <?php }else{  ?>
                    <span class="sprte comm_img arrival_plan"></span>
                    <span class="air_time">Return</span>
                    <span class="from_whre fm_origin"><?php echo $segment_data[$s]['locationIdDeparture'][$ss]; ?> - <?php echo $segment_data[$s]['locationIdArival'][$ss]; ?></span>
                    <?php } ?>
                  </div>
                  <?php //echo '<pre>segment'; print_r($segment_data); exit;  ?>
                  <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2><?php echo date("d", strtotime($segment_data[$s]['DepartureDate'][$ss])); ?></h2>
                      <span class="moths"><?echo date("M", strtotime($segment_data[$s]['DepartureDate'][$ss])); ?></span>
                      <span class="years"><?php echo date("Y", strtotime($segment_data[$s]['DepartureDate'][$ss]));  ?></span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                      <?php $Segmentdeparturetime = str_split($segment_data[$s]['timeOfDeparture'][$ss],2);
                            $Segmentdeparturetime = $Segmentdeparturetime[0].':'.$Segmentdeparturetime[1];

                            $Segmentarrivaltime = str_split($segment_data[$s]['timeOfArrival'][$ss],2);
                            $Segmentarrivaltime = $Segmentarrivaltime[0].':'.$Segmentarrivaltime[1]; ?>
                        <span class="air_time"><?php echo $Segmentdeparturetime; ?> - <?php echo $Segmentarrivaltime; ?></span>
                        <span class="flt_frmwhere"><?php echo $this->Flight_Model->get_airport_name_new($segment_data[$s]['locationIdDeparture'][$ss]); ?>- <?php echo $this->Flight_Model->get_airport_name_new($segment_data[$s]['locationIdArival'][$ss]); ?></span>
                        <span class="flit_number"><?php echo $segment_data[$s]['airlineName'][$ss]; ?> <?php echo $segment_data[$s]['flightOrtrainNumber'][$ss]; ?> . <?php echo $segment_data[$s]['Equipment'][$ss]; ?></span>
                      </div>
                      <?php //echo strtolower(ltrim($segment->baggage)); exit(); ?>
                      <?php $bagg =  preg_replace("/\s+/","",$segment->baggage); ?>
                      <div class="col-sm-4 col-xs-3 nopad">
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF ?></span><span class="sprte bag_comm_icon baggage"></span></span>
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo strtolower($bagg); ?></span><span class="sprte bag_comm_icon baggage_1"></span></span>
                      </div>
                      <div class="col-sm-3 col-xs-4 nopad text-center">
                        <span class="hr_cal"><?php echo $segment_data[$s]['Flight_Time'][$ss]; ?></span>
                        <span class="from_whre economy_fnt">Economy</span>
                      </div>
                    </div>
                  </div>


                  
                 <!-- <div class="flit_details">
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Return</span>
                    <span class="from_whre fm_origin">LPA - KUT</span>
                  </div>

                   <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2>09</h2>
                      <span class="moths">Sept</span>
                      <span class="years">2018</span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                        <span class="air_time">14:25 - 16:55</span>
                        <span class="flt_frmwhere">Kutaisi- Thessaloniki</span>
                        <span class="flit_number">WizzAir 1755 . Airbus A321</span>
                      </div>
                      <div class="col-sm-3 col-xs-3 nopad">
                       <span class="suit_solid"><span class="sprte comm_icon baggage">2</span></span>
                        <span class="suit_solid"><span class="sprte comm_icon baggage_1">2</span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal">2h 30m</span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div> -->
                 
                  <?php } ?>

                
                    <?php } ?>
                    <!-- fare rules and baggage -->
                    <?php //echo '<pre>flight_result'; print_r(); ?>
                  <div class="fare_bagg">
                    <div class="baggage_ul">
                      <ul>
                      <!-- href="#costumModal10" -->
                        <li><a  data-toggle="modal" onclick="show_flightpopup('<?php echo  $flight_result[$i]['flight_id'];  ?>', 'itenerary')" data-target="#flight_res" >Fare Rules</a></li>
                        <!-- <li><a href="#">Baggage Details</a></li> -->
                      </ul>
                    </div>
                  </div>
                  
                  <!-- fare rules and baggage -->
                    </div>
                    <?php }elseif ($req_typ=="oneway") { ?>
                    <div class="all_flt_dtl">
                    <?php for($s=0;$s<(count($segment_data));$s++){
                     ?>
                      
                      <?php for($ss=0;$ss<count($segment_data[$s]['dateOfDeparture']);$ss++){
                        // echo '<pre>segment_data'; print_r(); exit;
                       ?>
                  <div class="flit_details">                    
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Depart</span>
                    <span class="from_whre fm_origin"><?php echo $segment->origin; ?> - <?php echo $segment->destination; ?></span>
                  </div>
                  
                  <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2><?php echo date("d", strtotime($segment_data[$s]['DepartureDate'][$ss])); ?></h2>
                      <span class="moths"><?echo date("M", strtotime($segment_data[$s]['DepartureDate'][$ss])); ?></span>
                      <span class="years"><?php echo date("Y", strtotime($segment_data[$s]['DepartureDate'][$ss]));  ?></span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                      <?php $Segmentdeparturetime = str_split($segment_data[$s]['timeOfDeparture'][$ss],2);
                            $Segmentdeparturetime = $Segmentdeparturetime[0].':'.$Segmentdeparturetime[1];

                            $Segmentarrivaltime = str_split($segment_data[$s]['timeOfArrival'][$ss],2);
                            $Segmentarrivaltime = $Segmentarrivaltime[0].':'.$Segmentarrivaltime[1]; ?>
                        <span class="air_time"><?php echo $Segmentdeparturetime; ?> - <?php echo $Segmentarrivaltime; ?></span>
                        <span class="flt_frmwhere"><?php echo $this->Flight_Model->get_airport_name_new($segment_data[$s]['locationIdDeparture'][$ss]); ?>- <?php echo $this->Flight_Model->get_airport_name_new($segment_data[$s]['locationIdArival'][$ss]); ?></span>
                        <span class="flit_number"><?php echo $segment_data[$s]['airlineName'][$ss]; ?> <?php echo $segment_data[$s]['flightOrtrainNumber'][$ss]; ?> . <?php echo $segment_data[$s]['Equipment'][$ss]; ?></span>
                      </div>
                      <?php $bagg =  preg_replace("/\s+/","",$segment->baggage);  ?>
                      <div class="col-sm-3 col-xs-3 nopad">
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF ?></span><span class="sprte bag_comm_icon baggage"></span></span>
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo strtolower($bagg); ?></span><span class="sprte bag_comm_icon baggage_1"></span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal"><?php echo $segment_data[$s]['Flight_Time'][$ss]; ?></span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div>

                 <!-- <div class="flit_details">
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Return</span>
                    <span class="from_whre fm_origin">LPA - KUT</span>
                  </div>

                   <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2>09</h2>
                      <span class="moths">Sept</span>
                      <span class="years">2018</span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                        <span class="air_time">14:25 - 16:55</span>
                        <span class="flt_frmwhere">Kutaisi- Thessaloniki</span>
                        <span class="flit_number">WizzAir 1755 . Airbus A321</span>
                      </div>
                      <div class="col-sm-3 col-xs-3 nopad">
                       <span class="suit_solid"><span class="sprte comm_icon baggage">2</span></span>
                        <span class="suit_solid"><span class="sprte comm_icon baggage_1">2</span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal">2h 30m</span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div> -->

                  <?php } ?>
                
                     <?php } ?>
                     <!-- fare rules and baggage -->
                    <?php //echo '<pre>flight_result'; print_r(); ?>
                  <div class="fare_bagg">
                    <div class="baggage_ul">
                      <ul>
                      <!-- href="#costumModal10" -->
                        <li><a  data-toggle="modal" onclick="show_flightpopup('<?php echo  $flight_result[$i]['flight_id'];  ?>', 'itenerary')" data-target="#flight_res" >Fare Rules</a></li>
                        <!-- <li><a href="#">Baggage Details</a></li> -->
                      </ul>
                    </div>
                  </div>
                  
                  <!-- fare rules and baggage -->
                     </div>
                      <?php } ?>
                
              </div>
              <?php   $data_v['sessionid'] = $flight_result[$i]['session_id'];
                      $data_v['id']        = $flight_result[$i]['flight_id'];
                      $uid  =  base64_encode(json_encode($data_v));
                      //echo '<pre>Req_before_decode'; print_r($Req_before_decode); exit;
                 ?>
              <div class="clearfix"></div>
              <div class="view_detbtn">
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="view_detil" id="<?php echo $i; ?>" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">VIEW DETAILS</span>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                <!-- data-id-attr="<?php echo $data_v['id']; ?>"  data-pass-attr="<?php echo $Req_before_decode; ?>"  data-attr="<?php echo $uid; ?>" -->
                <a href="#" class="btn btnbook_fligt FlightbookNow" id="filght_package_select" href="#" data-id-attr="<?php echo $data_v['id']; ?>"  data-pass-attr="<?php echo $Req_before_decode; ?>"  data-attr="<?php echo $uid; ?>" >BOOK FLIGHT</a>
                  <!-- <button type="button" class="btn btnbook_fligt FlightbookNow">BOOK FLIGHT</button> -->
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="flight_price"><?php echo $this->user_currency .' '. (round($this->user_currency_val * $flight_result[$i]['amount'])); ?></span>
                  <span class="arrowrght text-right"> <?php if ($req_typ=="oneway") { ?><span class="sprte exchange_icon oneway"></span>
                 <?php  }else{ ?> <span class="sprte exchange_icon round"></span>  <?php } ?></span>
                </div>
              </div>
              </div>
              </div>
              
           </div>
           <!-- </div> -->
           <?php } ?>
            <!-- <div class="carttoloadr"><strong>Confirming your flight...</strong></div> -->
            
           <?php if ($flight_result[$i]['api_id'] == '1') {
           // echo '<pre>'; print_r($this->display_currency);
          //  echo '<pre>'; print_r($this->display_value);
            // echo '<pre>'; print_r($this->display_symbol);
            //echo '<pre>'; print_r($_SESSION); exit;
           //echo '<pre>flight_result'; print_r($flight_result[$i]); exit; ?>
           <!-- <div class="f_r_one" > -->
              <span class="currentDiv<?php echo $i; ?>" >
            <!-- City Tours -->
            <!-- <div class="attractin_loop">
                <div class="col-sm-4 nopad">
              <div class="flt_img">
                <img src="<?php echo base_url(); ?>assets/images/flight_img2.jpg" alt="">
                <div class="weahter_icon">
                  <span><span class="sprte comm_weather weather"></span> <?php echo $CityWether; ?> C</span>

                </div>
                <div class="img_citynm">
                  <span class="city_name">Thessaloniki</span>
                  <span class="city_txt">Greece</span>
                </div>
              </div>
              <div class="left_sectxt_hide left_sectxt_hide_<?php echo $i; ?>">
                Quisque vitae nisi ac lectus pellentesque aliquam sit amet sed nulla.
                Praesent a enim sed orci dignissim lacinia. Nullam aliquam elit vitae tellus
                molestie pulvinar. Maecenas in lobortis ipsum dolor amet sit. Nullam aliquam elit vitae tellus molestie pulvinar. Nullam aliquam elit vitae tellus.
                <button type="button" class="btn btn_find_more">FIND OUT MORE</button>
              </div> 
           </div>
          </div> -->
                <!-- End Of City Tours -->

            <?php   
            //echo $request_type; exit;
            //$detail_count = count($flight_result[$i][$bnd]); 
            //for($j=0;$j<$detail_count;$j++){  
            
              if($request_type == "oneway"){

                $carrier = 'KK'; 
                  $CI =&get_instance();
                  $CI->load->model('Flight_Model');

                  $origin = $CI->Flight_Model->get_airport_cityname($request->origin);
                  $destination = $CI->Flight_Model->get_airport_cityname($request->destination); 
                  

                 $data_v['sessionid'] = $flight_result[$i]['session_id'];
                   $data_v['id'] = $flight_result[$i]['flight_id'];
                   //echo '<pre>tst'; print_r($data_v); exit;

                   $uid  =  base64_encode(json_encode($data_v)); 

                  $flightData = $flight_result[$i];

                  $classData = $flightData['PricingDetails'];
                   //$flightSegmentData = $flightData['paxFareProduct']['depData']['segmentData'];
                  //foreach ($flightData['classData'] as $kclass => $classData) { 

                  $dataTotal = $flightData['PricingDetails']['TotalFare'];
                  $segkey = 0;

                  $segData = $flightData['paxFareProduct']['depData'][0];
                  //echo '<pre>request_type'; print_r($segData); 
                  $segkeylast = count($flightData['PricingDetails']['TotalFare'])-1;

                  $onward_stops = $flightData['onwards_stops'];
                  if($onward_stops == 0){
                  $onward_stops = 'Non Stop';
                  }
                  else{
                   $onward_stops = $onward_stops.' Stop'; 
                  }

                  $onwards_duration1 = $segData['Duration'];

                  $onwards_duration1 = explode(":",$onwards_duration1);
                  //echo '<pre>onwards_duration1'; print_r($segData); exit;
                  $onwards_duration = $onwards_duration1[0]." H".": ".$onwards_duration1[1]." M";
                //~ echo '<pre>onwards_duration'; print_r($flightData['paxFareProduct']['depData']['carCode']); exit;
                  //echo '<pre>flightData'; print_r($flightData); exit();
                  
                ?>
          <div class="flight_resul_loop filters" data-amount = "<?php echo $flight_result[$i]['amount']; ?>" data-onwardduration = "<?php echo $flight_result[$i]['onwards_duration']; ?>" data-returnduration = "<?php echo $flight_result[$i]['returns_duration']; ?>" data-onwardstops = "<?php echo $flight_result[$i]['onwards_stops']; ?>" data-returnstops = "<?php echo $flight_result[$i]['returns_stops']; ?>" data-airline = "<?php echo $flight_result[$i]['airline']; ?>" data-takeoff_one = "<?php echo $flight_result[$i]['takeoff_one']; ?>" data-landing_one = "<?php echo $flight_result[$i]['landing_one']; ?>" data-takeoff_round = "<?php echo @$flight_result[$i]['takeoff_round']; ?>" data-landing_round = "<?php echo @$flight_result[$i]['landing_round']; ?>">
           <div class="col-sm-8 padfive_l_r right_all_result">
              <div class="result_repeat">
                <div class="col-sm-2 col-xs-2 nopad text-center">
                  <div class="airline_logo">
                    <img src="<?php echo WEB_URL;?>assets/flight/<?php echo $segData['carCode'];?>.png">
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="sprte comm_img plan"></span>
                  <div class="airname_time">
                    <span class="air_time"><?php echo $segData['DepTime']; ?> - <?php echo $segData['ArrTime']; ?></span>
                    <span class="air_name"><?php echo $segData['carName']; ?></span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3 text-center nopad">
                  <span class="no_stop"><?php echo $onward_stops; ?></span>
                </div>
                <div class="col-sm-3 col-xs-3 nopad">
                  <span class="hr_cal"><?php echo $onwards_duration; ?></span>
                  <span class="from_whre"><?php echo $segData['depCode']; ?> - <?php echo $segData['arrcode']; ?></span>
                </div>
              </div>
              
              <div class="clearfix"></div>

               <?php  
              $result = $this->Flight_Model->get_flight_data_segments($flight_result[$i]['flight_id']); 
              //echo "<pre>"; print_r($result); exit;
              
              $segment_data  = $result;
              $req_typ1=json_decode($result->request_scenario);
           ?>

              <div id="demo<?php echo $i; ?>" class="collapse">
                <div class="all_flt_dtl">
                 <?php 
                  $segment_data = json_decode($result->all_results);
                  $segDatas = $segment_data->depData;
                  foreach ($segDatas as $key => $segData) { ?>
                  <div class="flit_details">                    
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Depart</span>
                    <span class="from_whre fm_origin"><?php echo $segData->depCode; ?> - <?php echo $segData->arrcode; ?></span>
                  </div>
                  <?php $depdate = explode(T, $segData->DepDateTime); ?>
                  <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2><?php echo date("d", strtotime($depdate[0])); ?></h2>
                      <span class="moths"><?php echo date("M", strtotime($depdate[0])); ?></span>
                      <span class="years"><?php echo date("Y", strtotime($depdate[0])); ?></span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                        <span class="air_time"><?php echo $segData->DepTime; ?> - <?php echo $segData->ArrTime; ?></span>
                        <span class="flt_frmwhere"><?php echo $segData->deptStat; ?> - <?php echo $segData->destStat; ?></span>
                        <span class="flit_number"><?php echo $segData->carName; ?> <?php echo $segData->FlightNo; ?> . <?php echo $segData->carCode; ?></span>
                      </div>
                      
                      <div class="col-sm-3 col-xs-3 nopad">
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF ?></span><span class="sprte bag_comm_icon baggage"></span></span>
                        <span class="suit_solid"><span class="txt_bag_num"></span><span class="sprte bag_comm_icon baggage_1"></span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal"><?php echo $segData->Duration; ?></span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                  <!-- fare rules and baggage -->
                    <?php //echo '<pre>flight_result'; print_r(); ?>
                  <div class="fare_bagg">
                    <div class="baggage_ul">
                      <ul>
                      <!-- href="#costumModal10" -->
                        <li><a  data-toggle="modal" onclick="show_flightpopup('<?php echo  $data_v['id'];  ?>', 'itenerary')" data-target="#flight_res" >Fare Rules</a></li>
                        <!-- <li><a href="#">Baggage Details</a></li> -->
                      </ul>
                    </div>
                  </div>
                  
                  <!-- fare rules and baggage -->
                </div>
              </div>
              
              <div class="clearfix"></div>
              <div class="view_detbtn">
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="view_detil" id="<?php echo $i; ?>" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">VIEW DETAILS</span>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <!-- <button type="button" class="btn btnbook_fligt FlightbookNow" >BOOK FLIGHT</button> -->
                  <a href="#" class="btn btnbook_fligt FlightbookNow" id="filght_package_select" href="#" data-id-attr="<?php echo $data_v['id']; ?>"  data-pass-attr="<?php echo $Req_before_decode; ?>"  data-attr="<?php echo $uid; ?>" >BOOK FLIGHT</a>
                </div>

                <div class="col-sm-4 col-xs-4 nopad">
                
                  <span class="flight_price"><?php echo $this->user_currency .' '. (round($this->user_currency_val * $dataTotal)); ?></span>
                  <span class="arrowrght text-right"><span class="sprte exchange_icon oneway"></span></span>
                </div>
              </div>

           </div>
           </div>
           <?php }else{  ?>

              <?php 
                $carrier = 'KK'; 
                $this->load->model('Flight_Model');
                $origin = $this->Flight_Model->get_airport_cityname($request->origin);
                $destination = $this->Flight_Model->get_airport_cityname($request->destination); ?>


                <?php 
                $data_v['sessionid'] = $flight_result[$i]['session_id'];
                $data_v['id'] = $flight_result[$i]['flight_id'];
                $uid  =  base64_encode(json_encode($data_v)); 

                $flightData = $flight_result[$i];
                //echo '<pre>flightData'; print_r($flightData); exit;
                //$retData = $flights['retData'];

                //foreach ($flight_result as $flightkey => $flightData) {  //echo "<pre>";print_r($flightData);exit;
                 //foreach ($flights['depData'] as $flightkey => $flightData) { 

                $flight_dep_class = $flightData['paxFareProduct']['depData'];
                $flight_ret_class = $flightData['paxFareProduct']['retData'];

                $dep_segmentData = $flightData['paxFareProduct']['depData'][0];
                $ret_segmentData = $flightData['paxFareProduct']['retData'][0];
                //echo '<pre>dep_segmentData'; print_r($dep_segmentData);
                //echo '<pre>ret_segmentData'; print_r($ret_segmentData); exit();
                ?>
                <?php 
                $rd=0;
                $classData = $flightData['PricingDetails']['outbound'];
                $retclass = $flightData['PricingDetails']['inbound'];
                //foreach ($flight_dep_class['classData'] as $kclass => $classData) { 

                //$retclass = $retData[$flightkey]['classData'][$kclass];
                 // $retclass = $flight_ret_class['classData'][$kclass];
                 
                $dataTotal_dep = $classData['TotalFare']; 
                $dataTotal_ret = $retclass['TotalFare']; 

                $dataTotal = $flightData['amount'];

                $segkey = 0;


                $onwards_duration1 = $dep_segmentData['Duration'];

                $onwards_duration1 = explode(":",$onwards_duration1);

                $onwards_duration = $onwards_duration1[0]."h".": ".$onwards_duration1[1]."m";


                $returns_duration1 = $ret_segmentData['Duration'];

                $returns_duration1 = explode(":",$returns_duration1);

                $returns_duration = $returns_duration1[0]."h".": ".$returns_duration1[1]."m";

                $onward_stops = $flightData['onwards_stops'];
                                  if($onward_stops == 0){
                                  $onward_stops = 'Non Stop';
                                  }
                                  else{
                                   $onward_stops = $onward_stops.' Stop'; 
                                  }
                $onward_stops = $flightData['onwards_stops'];
                                  if($onward_stops == 0){
                                  $onward_stops = 'Non Stop';
                                  }
                                  else{
                $onward_stops = $onward_stops.' Stop'; 
                }
                $return_stops = $flightData['returns_stops'];
                                  if($return_stops == 0){
                                  $return_stops = 'Non Stop';
                                  }
                                  else{
                $return_stops = $return_stops.' Stop'; 
                }

                //echo '<pre>dep_segmentData'; print_r($flight_result[$i]['landing_round']); exit;
              ?>  
            <div class="flight_resul_loop filters" data-amount = "<?php echo $flight_result[$i]['amount']; ?>" data-onwardduration = "<?php echo $flight_result[$i]['onwards_duration']; ?>" data-returnduration = "<?php echo $flight_result[$i]['returns_duration']; ?>" data-onwardstops = "<?php echo $flight_result[$i]['onwards_stops']; ?>" data-returnstops = "<?php echo $flight_result[$i]['returns_stops']; ?>" data-airline = "<?php echo $flight_result[$i]['airline']; ?>" data-takeoff_one = "<?php echo $flight_result[$i]['takeoff_one']; ?>" data-landing_one = "<?php echo $flight_result[$i]['landing_one']; ?>" data-takeoff_round = "<?php echo @$flight_result[$i]['takeoff_round']; ?>" data-landing_round = "<?php echo @$flight_result[$i]['landing_round']; ?>">
           <div class="col-sm-8 padfive_l_r right_all_result">
              <div class="result_repeat">
                <div class="col-sm-2 col-xs-2 nopad text-center">
                  <div class="airline_logo">
                    <img src="<?php echo WEB_URL;?>assets/flight/<?php echo $dep_segmentData['carCode'];?>.png">
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="sprte comm_img plan"></span>
                  <div class="airname_time">
                    <span class="air_time"><?php echo $dep_segmentData['DepTime']; ?> - <?php echo $dep_segmentData['ArrTime'] ?></span>
                    <span class="air_name"><?php echo $dep_segmentData['carName']; ?></span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3 text-center nopad">
                  <span class="no_stop"><?php echo $onward_stops;  ?></span>
                </div>
                <div class="col-sm-3 col-xs-3 nopad">
                  <span class="hr_cal"><?php echo  $onwards_duration;  ?></span>
                  <span class="from_whre"><?php echo $dep_segmentData['depCode']; ?> - <?php echo $dep_segmentData['arrcode']; ?></span>
                </div>
              </div>
              
              <div class="result_repeat">
                <div class="col-sm-2 col-xs-2 nopad text-center">
                  <div class="airline_logo">
                    <img src="<?php echo WEB_URL?>assets/flight/<?php echo $ret_segmentData['carCode'];?>.png">
                  </div>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="sprte comm_img plan"></span>
                  <div class="airname_time">
                    <span class="air_time"><?php echo $ret_segmentData['DepTime']; ?> - <?php echo $ret_segmentData['ArrTime']; ?></span>
                    <span class="air_name"><?php echo $ret_segmentData['carName']; ?></span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-3 text-center nopad">
                  <span class="no_stop"><?php echo $return_stops; ?></span>
                </div>
                <div class="col-sm-3 col-xs-3 nopad">
                  <span class="hr_cal"><?php echo $returns_duration; ?></span>
                  <span class="from_whre"><?php echo $ret_segmentData['depCode']; ?> - <?php echo $ret_segmentData['arrcode']; ?></span>
                </div>
              </div>
              <div class="clearfix"></div>

              <?php  
              $result = $this->Flight_Model->get_flight_data_segments($flight_result[$i]['flight_id']); 
              //echo "<pre>"; print_r($result); exit;
              
              $segment_data  = $result;

           ?>
            <?php  $req_typ1=json_decode($result->request_scenario);
                   $req_typ=$req_typ1->type;
                   
                   $segment_data = json_decode($result->all_results);
                   $departure_segData = $segment_data->depData;
                   $arrival_segData = $segment_data->retData;

                   //echo '<pre>req_typ'; print_r($req_typ1->ADT); exit;
                     ?>
              <div id="demo<?php echo $i; ?>" class="collapse">
                <div class="all_flt_dtl">
                <?php foreach ($departure_segData as $key => $departure_segData) { 
                  //echo '<pre>departure_segData'; print_r($departure_segData); exit; ?>
                  <div class="flit_details">                    
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Depart</span>
                    <span class="from_whre fm_origin"><?php echo $departure_segData->depCode; ?> - <?php echo $departure_segData->arrcode; ?></span>
                  </div>
                  <?php $depdate = explode(T, $departure_segData->DepDateTime);
                      //echo '<pre>da'; print_r($depdate[0]); exit; ?>
                  <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                      <h2><?php echo date("d", strtotime($depdate[0])); ?></h2>
                      <span class="moths"><?php echo date("M", strtotime($depdate[0])); ?></span>
                      <span class="years"><?php echo date("Y", strtotime($depdate[0])); ?></span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                        <span class="air_time"><?php echo $departure_segData->DepTime; ?> - <?php echo $departure_segData->ArrTime; ?></span>
                        <span class="flt_frmwhere"><?php echo $departure_segData->deptStat; ?> - <?php echo $departure_segData->destStat; ?></span>
                        <span class="flit_number"><?php echo $departure_segData->carName; ?> <?php echo $departure_segData->FlightNo; ?> . <?php echo $departure_segData->carCode; ?></span>
                      </div>
                      <!-- <div class="col-sm-3 col-xs-3 nopad">
                        <span class="suit_solid"><span class="sprte comm_icon baggage"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF; ?></span></span>
                        <span class="suit_solid"><span class="sprte comm_icon baggage_1"></span></span>
                      </div> -->
                      <div class="col-sm-3 col-xs-3 nopad">
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF ?></span><span class="sprte bag_comm_icon baggage"></span></span>
                        <span class="suit_solid"><span class="txt_bag_num"></span><span class="sprte bag_comm_icon baggage_1"></span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal"><?php echo $departure_segData->Duration; ?></span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php foreach ($arrival_segData as $key => $arrival_segData) {
                  //echo '<pre>da'; print_r($arrival_segData); exit; ?>
                  <div class="flit_details">
                    <span class="sprte comm_img depart_plan"></span>
                    <span class="air_time">Return</span>
                    <span class="from_whre fm_origin"><?php echo $arrival_segData->depCode; ?> - <?php echo $arrival_segData->arrcode; ?></span>
                  </div>

                  <div class="over_lay">
                    <div class="col-sm-3 col-xs-3 nopad left_over_sec">
                    <?php $arrdate = explode(T, $arrival_segData->DepDateTime); ?>
                      <h2><?php echo date("d", strtotime($arrdate[0])); ?></h2>
                      <span class="moths"><?php echo date("M", strtotime($arrdate[0])); ?></span>
                      <span class="years"><?php echo date("Y", strtotime($arrdate[0])); ?></span>
                    </div>
                    <div class="col-sm-9 col-xs-9 nopad">
                      <div class="col-sm-5 col-xs-5 nopad">
                        <span class="air_time"><?php echo $arrival_segData->DepTime; ?> - <?php echo $arrival_segData->ArrTime; ?></span>
                        <span class="flt_frmwhere"><?php echo $arrival_segData->deptStat; ?> - <?php echo $arrival_segData->destStat; ?></span>
                        <span class="flit_number"><?php echo $arrival_segData->carName; ?> <?php echo $arrival_segData->FlightNo; ?> . <?php echo $arrival_segData->carCode; ?></span>
                      </div>
                      <!-- <div class="col-sm-3 col-xs-3 nopad">
                       <span class="suit_solid"><span class="sprte comm_icon baggage"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF; ?></span></span>
                        <span class="suit_solid"><span class="sprte comm_icon baggage_1"></span></span>
                      </div> -->
                      <div class="col-sm-3 col-xs-3 nopad">
                        <span class="suit_solid"><span class="txt_bag_num"><?php echo $req_typ1->ADT + $req_typ1->CHD + $req_typ1->INF ?></span><span class="sprte bag_comm_icon baggage"></span></span>
                        <span class="suit_solid"><span class="txt_bag_num"></span><span class="sprte bag_comm_icon baggage_1"></span></span>
                      </div>
                      <div class="col-sm-4 col-xs-4 nopad text-center">
                        <span class="hr_cal"><?php echo $arrival_segData->Duration; ?></span>
                        <span class="from_whre">Economy</span>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                   <!-- fare rules and baggage -->
                    <?php //echo '<pre>flight_result'; print_r(); ?>
                  <div class="fare_bagg">
                    <div class="baggage_ul">
                      <ul>
                      <!-- href="#costumModal10" -->
                        <li><a  data-toggle="modal" onclick="show_flightpopup('<?php echo  $data_v['id'];  ?>', 'itenerary')" data-target="#flight_res" >Fare Rules</a></li>
                        <!-- <li><a href="#">Baggage Details</a></li> -->
                      </ul>
                    </div>
                  </div>
                  
                  <!-- fare rules and baggage -->
                </div>
              </div>
             
              <div class="clearfix"></div>
              <div class="view_detbtn">
                <div class="col-sm-4 col-xs-4 nopad">
                  <span class="view_detil" id="<?php echo $i; ?>" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">VIEW DETAILS</span>
                </div>
                <div class="col-sm-4 col-xs-4 nopad">
                  <!-- <button type="button" class="btn btnbook_fligt">BOOK FLIGHT</button> -->
                  <a href="#" class="btn btnbook_fligt FlightbookNow" id="filght_package_select" href="#" data-id-attr="<?php echo $data_v['id']; ?>"  data-pass-attr="<?php echo $Req_before_decode; ?>"  data-attr="<?php echo $uid; ?>" >BOOK FLIGHT</a>
                </div>
                
                <div class="col-sm-4 col-xs-4 nopad">
                
                
                  <span class="flight_price"><?php echo $this->user_currency .' '. (round($this->user_currency_val * $dataTotal)); ?></span>
                  
                  <span class="arrowrght text-right"><span class="sprte exchange_icon round"></span></span>
                </div>
              </div>

           </div>
           </div>
           <?php } ?>
           </span>
           
           <?php } ?>
           </div>
           <?php } ?>
           <?php } ?>

<div class="progress1" style="display: none;margin-top: 35%">
          
          <!-- Flight All Results End -->
          <div class="say_go_center_loader">
            <img src="<?php echo ASSETS?>images/preloader.gif">
            
          </div>
        </div>
<div id="flight_res" class="modal" data-easein="bounceIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
                        
                    </div>
 
<script>
  
   /* $('.flight_fliter_loader').fadeIn();
   $('.flight_fliter_loader').fadeOut();*/

    function show_flightpopup(id, divclass){
     var idval = id;
     $.ajax({
      type:'GET', 
      url: '<?php echo WEB_URL;?>flight/call_iternary/'+idval,
      beforeSend: function(XMLHttpRequest){
       
      }, 
      success: function(response) {
        $('#flight_res').html(response);
        $( "li.active" ).removeClass( "active" );
        //$( "div.active" ).removeClass( "active" );
        $('#'+divclass+'_li').addClass('active');
        $('#'+divclass).addClass('active');
        
        //$('.logins').css('display','block');
         }
     });  
    }
</script>
<script>
  $(document).on("click", ".FlightbookNow", function (e) {
    var that = $(this);
          e.preventDefault();
          var att = $(this).attr('data-attr');
          //ar action = WEB_URL+'flight/addToCart/'+att;
      $.ajax({
        type: "GET",
        //url: action,
        url: '<?php echo WEB_URL;?>flight/addToCart/'+att,
        data: '',
        dataType: "json",
        beforeSend: function(){
          //$('.progress1').fadeIn();
          $(".FlightbookNow").attr("disabled", true);
          $('.flight_resut').find('.carttoloadr').fadeIn();
          },
        success: function(data){
          //$('.progress1').fadeOut();
          $('.flight_resut').find('.carttoloadr').fadeOut();
          if(data.isCart == false){
            alert('error')
          }else{
            if(data.status == 1){
              console.log('ajaxsuccess');
                window.location.href = data.C_URL;
            }else{
              console.log('ajaxsuccess');
              alert(data.error);
            }
          }
        }
      });
      callFlightCart(att);
      });
</script>

<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () { //alert();
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
});

function timerIncrement() { //alert("hello");
    idleTime = idleTime + 1; //alert(idleTime);
    if (idleTime > 15) { //alert("hi"); // 20 minutes
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("flight/signout"); ?>',
            data:{},
            success:function(){
               window.location.href = WEB_URL;       
            }
        });

       // window.location.href = WEB_URL;
        // window.location.reload();
    }
}
$('.view_detil').click(function(){
  if($('.animate_right').hasClass('collapse')) {
    $(".animate_right").addClass("wow fadeInRight animated");
    $(".animate_right").attr("style","visibility: visible; animation-name: fadeInRight;");
  }   
});

</script>   