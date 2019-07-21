<form id="form_validation" method="post" action="{{route('service-blood-bank')}}" class="uk-form-stacked">
{!! csrf_field() !!}
<input type="hidden" name="subject" value="Blood Bank"/>
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
            <div class="parsley-row">
                <label for="message">
                </label>
                <textarea class="md-input" name="general_info" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
            </div>
        </div>
    </div>
     
    
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">ডাক্তার<br><small>যদি থাকে, ডক্টরস্‌ প্যানেলে বিস্তারিত</small> </p>
      
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">সেবা </p>
    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold">অ্যাম্বুলেন্স</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">অ্যাম্বুলেন্স</p>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">সেবার পরিধি</label>
                <textarea type="text" name="amb_service_area"  class="md-input"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">ভাড়া</label>
                <textarea type="text" name="amb_fare"  class="md-input"></textarea>
            </div>
        </div>
    </div>


     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ভাড়া আলোচনা সাপেক্ষে </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="fare_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="fare_negotiable"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবা ঘণ্টা</label>
                <textarea type="text" name="amb_service_hour"  class="md-input"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">কার্য দিবস  </label>
                <textarea type="text" name="amb_working_day"  class="md-input"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">বন্ধ </label>
                <textarea type="text" name="amb_cont_close"  class="md-input"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>

         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="amb_cont_number"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom:25px;">সুযোগ-সুবিধা </p>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">শীতাতপ নিয়ন্ত্রিত </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="air_condition" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="air_condition"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">শীতাতপ নিয়ন্ত্রিত নয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="no_air_condition" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="no_air_condition"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">গুরুতর যত্নের জন্য মেডিক্যাল কর্মী </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_staf_cate" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_staf_cate"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">অক্সিজেন সিলিন্ডার </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="oxygen_cylinder" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="oxygen_cylinder"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">স্ট্রেচার</label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="stretcher" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="stretcher"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">চাকাওয়ালা চেয়ার </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="wheel_chair" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="wheel_chair"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold">আই সি ইউ অ্যাম্বুলেন্স</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">আই সি ইউ অ্যাম্বুলেন্স</p>

     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">সেবার পরিধি</label>
                <textarea type="text" name="ac_amb_service_area"  class="md-input"></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">ভাড়া</label>
                <textarea type="text" name="ac_amb_fare"  class="md-input" ></textarea>
            </div>
        </div>
    </div>

     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ভাড়া আলোচনা সাপেক্ষে </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="ac_fare_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_fare_negotiable"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবা ঘণ্টা</label>
                <textarea type="text" name="ac_amb_service_hour" class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">কার্য দিবস  </label>
                <textarea type="text" name="ac_amb_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">বন্ধ </label>
                <textarea type="text" name="ac_amb_cont_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>

         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="ac_amb_cont_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 16px;font-weight: bold; margin-bottom:25px;"> সুযোগ-সুবিধা </p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">গুরুতর যত্নের জন্য মেডিক্যাল কর্মী</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="ac_medical_staf_cate" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_medical_staf_cate"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">স্ট্রেচার</label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="ac_stretcher" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_stretcher"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">চাকাওয়ালা চেয়ার </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="ac_wheel_chair" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_wheel_chair"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">রোগ নির্ণয় সংক্রান্ত পরীক্ষা-নিরীক্ষা  </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">রোগ নির্ণয় সংক্রান্ত পরীক্ষা-নিরীক্ষা<br><small>পরীক্ষার নাম, মূল্য, পূর্ব-প্রস্তুতি এবং যোগাযোগের নম্বর লিখুন</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email"></label>
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_atm_booth" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_cafeteria" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_canteen" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_coffee_shop" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_snacks_conrner" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_day_care_center" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_car_parking" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_mosque" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
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
	                <label class="inline-label"><input type="radio" value="Yes" name="facilities_prayer_room" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_prayer_room"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">কক্ষ সেবা (ওয়ার্ড, ক্যাবিন ইত্যাদি)   </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">কক্ষ সেবা (ওয়ার্ড, ক্যাবিন ইত্যাদি)<br><small>শয্যার নাম, মোট শয্যা সংখ্যা, ফ্রি শয্যা সংখ্যা, ভাড়া এবং যোগাযোগের নম্বর লিখুন</small></p>
   
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email"></label>
                <textarea type="text" name="room_service_name"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">আরও তথ্য <br><small>(যদি থাকে)</small></p>

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
            <div class="parsley-row">
                <label for="message">
                </label>
                <textarea class="md-input" name="general_info" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
            </div>
        </div>
    </div>
    

    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Doctor<br><small>If Any, Write details in the Doctors Panel</small></p>
     
    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Service</p>
    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold">Ambulance</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Ambulance</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Service Area</label>
                <textarea type="text" name="amb_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Fare</label>
                <textarea type="text" name="amb_fare"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Fare Negotiable</label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="fare_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="fare_negotiable"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Hour</label>
                <textarea type="text" name="amb_service_hour"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Working Day</label>
                <textarea type="text" name="amb_working_day"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Closed</label>
                <textarea type="text" name="amb_cont_close"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
    
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="amb_cont_number"  class="md-input"></textarea>
            </div>
        </div>
    </div>
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Facilities </p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Air Conditioned</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="air_condition" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="air_condition"><span style="padding:5px;">NO</span></label> 
                 </span>
                <span  style="padding:5px 5px 5px 0px" class="icheck-inline">
                
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Non Air Conditioned </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="no_air_condition" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="no_air_condition"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Medical Staff for Critical Care</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_staf_cate" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_staf_cate"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Oxygen Cylinder</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="oxygen_cylinder" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="oxygen_cylinder"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Stretcher</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="stretcher" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="stretcher"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Wheel Chair</label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="wheel_chair" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="wheel_chair"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold">ICU Ambulance</p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">ICU Ambulance</p>
    
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Service Area</label>
                <textarea type="text" name="ac_amb_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Fare</label>
                <textarea type="text" name="ac_amb_fare"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Fare Negotiable</label> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="ac_fare_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_fare_negotiable"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Hour</label>
                <textarea type="text" name="ac_amb_service_hour" class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Working Day</label>
                <textarea type="text" name="ac_amb_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Closed</label>
                <textarea type="text" name="ac_amb_cont_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
    
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="ac_amb_cont_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Facilities </p>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Medical Staff for Critical Care</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="ac_medical_staf_cate" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_medical_staf_cate"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Stretcher</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="ac_stretcher" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_stretcher"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Wheel Chair</label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="ac_wheel_chair" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_wheel_chair"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_atm_booth" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_cafeteria" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_canteen" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_coffee_shop" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_snacks_conrner" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_day_care_center" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_car_parking" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_mosque" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="facilities_prayer_room" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="facilities_prayer_room"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
   
   <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Room Service (Ward, Cabin etc)</p>-->
   <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Room Service (Ward, Cabin etc)<br><small>Write Bed Name, Total Bed Number, Free Bed Number, Rent & Contact Number</small></p>
   
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email"></label>
                <textarea type="text" name="room_service_name"  class="md-input" rows="2" cols="10" ></textarea>
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