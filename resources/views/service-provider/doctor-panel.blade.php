<form id="form_validation" method="post" action="{{route('service-doctor-panel')}}" class="uk-form-stacked">
{!! csrf_field() !!}
<input type="hidden" name="subject" value="Doctor Panel" />
@if(Session('language')=='bn')

      <!--<p style="font-size: 16px;font-weight: bold;">সম্বন্ধে </p>-->
      <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সম্বন্ধে</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">বিভাগ</label>
                <textarea type="text" name="ab_type" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold;">যোগাযোগের তথ্য </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">যোগাযোগের তথ্য</p>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="name">নাম </label>
                <textarea type="text" name="con_info_name" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="address">ঠিকানা (শুধুমাত্র জেলা এবং উপজেলা)</label>
                <textarea type="text" name="con_info_address"address  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">যোগাযোগের নম্বর </p>
    
    <!--<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">    
             <div class="parsley-row">
                <label for="contact_cumber">যোগাযোগের নম্বর  </label>
                <textarea type="text" name="con_info_contact_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>-->
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">ব্যাক্তিগত </label>
                <textarea type="text" name="con_info_personal"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">আবাসিক</label>
                <textarea type="text" name="con_info_residence"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>       
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ই-মেইল</label>
                <textarea type="text" name="con_info_email"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">সাধারণ তথ্য</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সাধারণ তথ্য</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নিবন্ধনের প্রকার (বিএম এবং ডিসি/অন্যান্য) </label>
                <textarea type="text" name="dc_reg_type"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নিবন্ধন নম্বর </label>
                <textarea type="text" name="dc_reg_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগ্যতা</label>
                <textarea type="text" name="dc_reg_qualification"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">পদবী</label>
                <textarea type="text" name="dc_reg_designation"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">হোম সার্ভিস </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">হোম সার্ভিস<br><small>দুঃসহ যানজট কিংবা গুরুতর অসুস্থ বা বার্ধক্যের কারণে বাইরে যেতে অক্ষম ব্যাক্তির বাসায় গিয়ে চিকিৎসা সেবা প্রদান করা হয়</small></p>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবার পরিধি</label>
                <textarea type="text" name="dc_home_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সার্ভিস চার্জ </label>
                <textarea type="text" name="dc_home_service_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">সার্ভিস চার্জ আলোচনা সাপেক্ষে </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="dc_home_service_charge_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_home_service_charge_negotiable"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবা ঘণ্টা</label>
                <textarea type="text" name="dc_home_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্য দিবস</label>
                <textarea type="text" name="dc_home_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="dc_home_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="dc_home_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">চেম্বার-১   </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">চেম্বার-১</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নাম</label>
                <textarea type="text" name="dc_cham_1_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ঠিকানা</label>
                <textarea type="text" name="dc_cham_1_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="dc_cham_1_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">জরুরী নম্বর</label>
                <textarea type="text" name="dc_cham_1_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">হটলাইন</label>
                <textarea type="text" name="dc_cham_1_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার সময়</label>
                <textarea type="text" name="dc_cham_1_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_1_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সরাসরি সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_1_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">এসএমএস এর মাধ্যমে সিরিয়াল</label>
                <textarea type="text" name="dc_cham_1_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ফোনে সিরিয়াল নম্বর দেওয়া হয় না। সরাসরি এসে সিরিয়াল দিতে হয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_1_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_1_come"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সাক্ষাতের সময়</label>
                <textarea type="text" name="dc_cham_1_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কক্ষ নম্বর</label>
                <textarea type="text" name="dc_cham_1_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্য দিবস</label>
                <textarea type="text" name="dc_cham_1_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="dc_cham_1_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ডাক্তারের সহকারীর ফোন নম্বর</label>
                <textarea type="text" name="dc_cham_1_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">পরামর্শ ফি   </p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নতুন</label>
                <textarea type="text" name="dc_cham_1_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">পুরাতন</label>
                <textarea type="text" name="dc_cham_1_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">প্রতিবেদন</label>
                <textarea type="text" name="dc_cham_1_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    
     <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">চেম্বার-২   </p>-->
     <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">চেম্বার-২</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নাম</label>
                <textarea type="text" name="dc_cham_2_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ঠিকানা</label>
                <textarea type="text" name="dc_cham_2_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="dc_cham_2_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">জরুরী নম্বর</label>
                <textarea type="text" name="dc_cham_2_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">হটলাইন</label>
                <textarea type="text" name="dc_cham_2_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার সময়</label>
                <textarea type="text" name="dc_cham_2_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_2_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সরাসরি সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_2_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">এসএমএস এর মাধ্যমে সিরিয়াল</label>
                <textarea type="text" name="dc_cham_2_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ফোনে সিরিয়াল নম্বর দেওয়া হয় না। সরাসরি এসে সিরিয়াল দিতে হয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_2_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_2_come"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সাক্ষাতের সময়</label>
                <textarea type="text" name="dc_cham_2_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কক্ষ নম্বর</label>
                <textarea type="text" name="dc_cham_2_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্য দিবস</label>
                <textarea type="text" name="dc_cham_2_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="dc_cham_2_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ডাক্তারের সহকারীর ফোন নম্বর</label>
                <textarea type="text" name="dc_cham_2_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">পরামর্শ ফি   </p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নতুন</label>
                <textarea type="text" name="dc_cham_2_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">পুরাতন</label>
                <textarea type="text" name="dc_cham_2_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">প্রতিবেদন</label>
                <textarea type="text" name="dc_cham_2_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    
     <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">চেম্বার-৩   </p>-->
     <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">চেম্বার-৩</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নাম</label>
                <textarea type="text" name="dc_cham_3_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ঠিকানা</label>
                <textarea type="text" name="dc_cham_3_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="dc_cham_3_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">জরুরী নম্বর</label>
                <textarea type="text" name="dc_cham_3_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">হটলাইন</label>
                <textarea type="text" name="dc_cham_3_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার সময়</label>
                <textarea type="text" name="dc_cham_3_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_3_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সরাসরি সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_3_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">এসএমএস এর মাধ্যমে সিরিয়াল</label>
                <textarea type="text" name="dc_cham_3_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ফোনে সিরিয়াল নম্বর দেওয়া হয় না। সরাসরি এসে সিরিয়াল দিতে হয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_3_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_3_come"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সাক্ষাতের সময়</label>
                <textarea type="text" name="dc_cham_3_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কক্ষ নম্বর</label>
                <textarea type="text" name="dc_cham_3_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্য দিবস</label>
                <textarea type="text" name="dc_cham_3_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="dc_cham_3_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ডাক্তারের সহকারীর ফোন নম্বর</label>
                <textarea type="text" name="dc_cham_3_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">পরামর্শ ফি   </p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নতুন</label>
                <textarea type="text" name="dc_cham_3_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">পুরাতন</label>
                <textarea type="text" name="dc_cham_3_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">প্রতিবেদন</label>
                <textarea type="text" name="dc_cham_3_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">বহির্বিভাগ পরামর্শ (যদি থাকে)  </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">বহির্বিভাগ পরামর্শ<br><small>(যদি থাকে)</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নাম</label>
                <textarea type="text" name="dc_cham_4_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ঠিকানা</label>
                <textarea type="text" name="dc_cham_4_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="dc_cham_4_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">জরুরী নম্বর</label>
                <textarea type="text" name="dc_cham_4_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">হটলাইন</label>
                <textarea type="text" name="dc_cham_4_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার সময়</label>
                <textarea type="text" name="dc_cham_4_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_4_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সরাসরি সিরিয়াল দেওয়ার নম্বর</label>
                <textarea type="text" name="dc_cham_4_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">এসএমএস এর মাধ্যমে সিরিয়াল</label>
                <textarea type="text" name="dc_cham_4_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ফোনে সিরিয়াল নম্বর দেওয়া হয় না। সরাসরি এসে সিরিয়াল দিতে হয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_4_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_4_come"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সাক্ষাতের সময়</label>
                <textarea type="text" name="dc_cham_4_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কক্ষ নম্বর</label>
                <textarea type="text" name="dc_cham_4_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্য দিবস</label>
                <textarea type="text" name="dc_cham_4_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="dc_cham_4_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ডাক্তারের সহকারীর ফোন নম্বর</label>
                <textarea type="text" name="dc_cham_4_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">পরামর্শ ফি   </p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">নতুন</label>
                <textarea type="text" name="dc_cham_4_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">পুরাতন</label>
                <textarea type="text" name="dc_cham_4_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">প্রতিবেদন</label>
                <textarea type="text" name="dc_cham_4_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">আরও তথ্য<br><small>(যদি থাকে)</small></p>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="message"></label>
                <textarea class="md-input" name="more_details" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
            </div>
        </div>
    </div>
    <br>
   
   <input  type="submit" class="md-btn md-btn-danger md-btn-large" name="submit" value="পাঠিয়ে দিন" style="float:right;background: #FD0100;color: #fff;">

@else  

    <!--<p style="font-size: 16px;font-weight: bold;">About</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">About</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">Department</label>
                <textarea type="text" name="ab_type" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold;">Contact Info</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Contact Info</p>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="name">Name </label>
                <textarea type="text" name="con_info_name" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="address">Address (Only District & Sub-District)</label>
                <textarea type="text" name="con_info_address"address  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Contact Number</p>
    
    <!--<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">    
             <div class="parsley-row">
                <label for="contact_cumber">Contact Number </label>
                <textarea type="text" name="con_info_contact_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>-->
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Personal </label>
                <textarea type="text" name="con_info_personal"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Residence</label>
                <textarea type="text" name="con_info_residence"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>       
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">E-mail</label>
                <textarea type="text" name="con_info_email"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">General Info</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">General Info</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Registration Type (BM & DC/Others)  </label>
                <textarea type="text" name="dc_reg_type"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Registration Number</label>
                <textarea type="text" name="dc_reg_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Qualification</label>
                <textarea type="text" name="dc_reg_qualification"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Designation</label>
                <textarea type="text" name="dc_reg_designation"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Home Service</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Home Service<br><small>Medical service is provided to the patient at home who is unable to go out because of illness, being old age or severe traffic jam</small></p>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Area</label>
                <textarea type="text" name="dc_home_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Charge </label>
                <textarea type="text" name="dc_home_service_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Service Charge Negotiable</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="dc_home_service_charge_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_home_service_charge_negotiable"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Hour</label>
                <textarea type="text" name="dc_home_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="dc_home_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="dc_home_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="dc_home_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Chamber-1</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Chamber-1</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Name</label>
                <textarea type="text" name="dc_cham_1_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Address</label>
                <textarea type="text" name="dc_cham_1_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="dc_cham_1_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Emergency Number</label>
                <textarea type="text" name="dc_cham_1_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Hotline</label>
                <textarea type="text" name="dc_cham_1_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Time of Serial</label>
                <textarea type="text" name="dc_cham_1_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial Number</label>
                <textarea type="text" name="dc_cham_1_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Direct Serial Number</label>
                <textarea type="text" name="dc_cham_1_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial by SMS</label>
                <textarea type="text" name="dc_cham_1_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">The serial number is not given on the phone. Come directly to the serial </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_1_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_1_come"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Visiting Hour</label>
                <textarea type="text" name="dc_cham_1_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Room Number</label>
                <textarea type="text" name="dc_cham_1_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="dc_cham_1_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="dc_cham_1_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Doctor’s Assistant Phone Number</label>
                <textarea type="text" name="dc_cham_1_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Consultation Fee</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">New</label>
                <textarea type="text" name="dc_cham_1_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Old</label>
                <textarea type="text" name="dc_cham_1_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Report</label>
                <textarea type="text" name="dc_cham_1_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Chamber-2</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Chamber-2</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Name</label>
                <textarea type="text" name="dc_cham_2_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Address</label>
                <textarea type="text" name="dc_cham_2_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="dc_cham_2_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Emergency Number</label>
                <textarea type="text" name="dc_cham_2_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Hotline</label>
                <textarea type="text" name="dc_cham_2_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Time of Serial</label>
                <textarea type="text" name="dc_cham_2_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial Number</label>
                <textarea type="text" name="dc_cham_2_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Direct Serial Number</label>
                <textarea type="text" name="dc_cham_2_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial by SMS</label>
                <textarea type="text" name="dc_cham_2_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">The serial number is not given on the phone. Come directly to the serial </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_2_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_2_come"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Visiting Hour</label>
                <textarea type="text" name="dc_cham_2_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Room Number</label>
                <textarea type="text" name="dc_cham_2_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="dc_cham_2_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="dc_cham_2_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Doctor’s Assistant Phone Number</label>
                <textarea type="text" name="dc_cham_2_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Consultation Fee</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">New</label>
                <textarea type="text" name="dc_cham_2_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Old</label>
                <textarea type="text" name="dc_cham_2_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Report</label>
                <textarea type="text" name="dc_cham_2_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Chamber-3</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Chamber-3</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Name</label>
                <textarea type="text" name="dc_cham_3_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Address</label>
                <textarea type="text" name="dc_cham_3_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="dc_cham_3_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Emergency Number</label>
                <textarea type="text" name="dc_cham_3_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Hotline</label>
                <textarea type="text" name="dc_cham_3_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Time of Serial</label>
                <textarea type="text" name="dc_cham_3_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial Number</label>
                <textarea type="text" name="dc_cham_3_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Direct Serial Number</label>
                <textarea type="text" name="dc_cham_3_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial by SMS</label>
                <textarea type="text" name="dc_cham_3_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">The serial number is not given on the phone. Come directly to the serial </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_3_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_3_come"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Visiting Hour</label>
                <textarea type="text" name="dc_cham_3_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Room Number</label>
                <textarea type="text" name="dc_cham_3_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="dc_cham_3_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="dc_cham_3_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Doctor’s Assistant Phone Number</label>
                <textarea type="text" name="dc_cham_3_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Consultation Fee</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">New</label>
                <textarea type="text" name="dc_cham_3_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Old</label>
                <textarea type="text" name="dc_cham_3_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Report</label>
                <textarea type="text" name="dc_cham_3_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Outdoor Consultation (If Any) </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Outdoor Consultation<br><small>(If Any)</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Name</label>
                <textarea type="text" name="dc_cham_4_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Address</label>
                <textarea type="text" name="dc_cham_4_address"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="dc_cham_4_contact_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Emergency Number</label>
                <textarea type="text" name="dc_cham_4_emergency_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Hotline</label>
                <textarea type="text" name="dc_cham_4_hotline"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Time of Serial</label>
                <textarea type="text" name="dc_cham_4_time_serial"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial Number</label>
                <textarea type="text" name="dc_cham_4_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Direct Serial Number</label>
                <textarea type="text" name="dc_cham_4_direct_serial_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Serial by SMS</label>
                <textarea type="text" name="dc_cham_4_serial_sms"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">The serial number is not given on the phone. Come directly to the serial </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="dc_cham_4_come" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="dc_cham_4_come"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Visiting Hour</label>
                <textarea type="text" name="dc_cham_4_visiting"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Room Number</label>
                <textarea type="text" name="dc_cham_4_room_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="dc_cham_4_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="dc_cham_4_closed"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Doctor’s Assistant Phone Number</label>
                <textarea type="text" name="dc_cham_4_assis_phone"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 5px;">Consultation Fee</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">New</label>
                <textarea type="text" name="dc_cham_4_consult_new"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Old</label>
                <textarea type="text" name="dc_cham_4_consult_old"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Report</label>
                <textarea type="text" name="dc_cham_4_consult_report"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">More Information<br><small>(If Any)</small></p>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="message"></label>
                <textarea class="md-input" name="more_details" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
            </div>
        </div>
    </div>
    <br>
    <input  type="submit" class="md-btn md-btn-danger md-btn-large" name="submit"value="send" style="float:right;background: #FD0100;color: #fff;">
                    
@endif

</form>