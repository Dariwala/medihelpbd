<form id="form_validation" method="post" action="{{route('service-herbal-medicine-center')}}" class="uk-form-stacked">
{!! csrf_field() !!}
<input type="hidden" name="subject" value="Herbal Medicine Center" /> 
@if(Session('language')=='bn')

    <!--<p style="font-size: 16px;font-weight: bold;">সম্বন্ধে</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সম্বন্ধে</p>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">প্রকার (সরকারি/বেসরকারি/অন্যান্য)</label>
                <textarea type="text" name="ab_type" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">সেবা ঘণ্টা</label>
                <textarea type="text" name="ab_service_hour" class="md-input" rows="2" cols="10"></textarea>
            </div>
    </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">কার্য দিবস</label>
                <textarea type="text" name="ab_working_day" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
        <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">বন্ধ</label>
                <textarea type="text" name="ab_close" class="md-input" rows="2" cols="10"></textarea>
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
                <label for="address">ঠিকানা</label>
                <textarea type="text" name="con_info_address"address  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">    
             <div class="parsley-row">
                <label for="contact_cumber">যোগাযোগের নম্বর </label>
                <textarea type="text" name="con_info_contact_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">জরুরী নম্বর </label>
                <textarea type="text" name="con_info_emergency_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">হটলাইন</label>
                <textarea type="text" name="con_info_hotline"  class="md-input" rows="2" cols="10" ></textarea>
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
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">সাধারণ তথ্য  </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সাধারণ তথ্য</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">পরামর্শের জন্য কোন ‘ফি’ প্রদান করতে হয় না </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbarl_gre_info"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbarl_gre_info"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">ডাক্তার<br><small>যদি থাকে, ডক্টরস্‌ প্যানেলে বিস্তারিত লিখুন</small></p>
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">সেবা </p>
    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">রোগ নির্ণয় সংক্রান্ত পরীক্ষা-নিরীক্ষা  </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">রোগ নির্ণয় সংক্রান্ত পরীক্ষা-নিরীক্ষা<br><small>রোগ নির্ণয় সংক্রান্ত পরীক্ষা-নিরীক্ষা</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">  </label>
                <textarea type="text" name="diagnostic_test"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">সুযোগ-সুবিধা </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সুযোগ-সুবিধা</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">এ টি ম বুথ  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_atm_booth"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_atm_booth"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ক্যাফিটিরিয়া   </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_cafeteria"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_cafeteria"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ক্যান্টীন   </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_canteen"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_canteen"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">কফি সপ </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_coffee_shop"id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_coffee_shop"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">স্ন্যাক্‌স কর্নার  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_snacks_conrner"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_snacks_conrner"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ডে-কেয়ার সেন্টার  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_day_care_center"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_day_care_center"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">কার পার্কিং  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_car_parking"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_car_parking"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">মসজিদ   <label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_mosque"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_mosque"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">প্রার্থনা কক্ষ  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_prayer_room"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_prayer_room"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">চিকিৎসা সেবা </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">চিকিৎসা সেবা</p>
   
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">রক্তচাপ নির্ণয় করা হয়  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_blood"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_blood"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ডায়বেটিস পরীক্ষা করা হয়  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_diabetes"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_diabetes"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ওজন মাপা হয়  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_weight"id="val_radio_male" data-md-icheck ><span style="padding:5px">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_weight"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">আরও তথ্য<br><small>(যদি থাকে)</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="message">
                </label>
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
                <label for="fullname">Type (Government/Private/Others)</label>
                <textarea type="text" name="ab_type" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">Service Hour</label>
                <textarea type="text" name="ab_service_hour" class="md-input" rows="2" cols="10"></textarea>
            </div>
    </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">Working Day </label>
                <textarea type="text" name="ab_working_day" class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="fullname">Closed</label>
                <textarea type="text" name="ab_close" class="md-input" rows="2" cols="10"></textarea>
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
                <label for="address">Address</label>
                <textarea type="text" name="con_info_address"address  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">    
             <div class="parsley-row">
                <label for="contact_cumber">Contact Number </label>
                <textarea type="text" name="con_info_contact_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Emergency Number </label>
                <textarea type="text" name="con_info_emergency_number"  class="md-input" rows="2" cols="10"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Hotline</label>
                <textarea type="text" name="con_info_hotline"  class="md-input" rows="2" cols="10" ></textarea>
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
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">No ‘Fee’ is payable for consultation</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbarl_gre_info"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbarl_gre_info"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>

    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Doctor<br><small>If Any, Write details in the Doctors Panel</small></p>
    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Service</p>

    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Diagnostic Test</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Diagnostic Test<br><small>Write Test Name, Rate, Preparation & Contact Number</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email"></label>
                <textarea type="text" name="diagnostic_test"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Facilities</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Facilities</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ATM Booth </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_atm_booth"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_atm_booth"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Cafeteria  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_cafeteria"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_cafeteria"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Canteen  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_canteen"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_canteen"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Coffee Shop</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_coffee_shop"id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_coffee_shop"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Snacks Corner </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_snacks_conrner"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_snacks_conrner"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Day Care Center </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_day_care_center"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_day_care_center"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Car Parking  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_car_parking"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_car_parking"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Mosque  </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_mosque"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_mosque"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Prayer Room </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="facilities_prayer_room"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_prayer_room"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Medical Service</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Medical Service</p>
   
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Blood Pressure Assessment </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_blood"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_blood"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Diabetes Test </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_diabetes"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_diabetes"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Weight Measurement </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="herbal_ms_weight"id="val_radio_male" data-md-icheck ><span style="padding:5px">Yes</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="herbal_ms_weight"><span style="padding:5px;">NO</span></label> 
                 </span>
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