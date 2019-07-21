<form id="form_validation" method="post" action="{{route('service-pharmacy24hours')}}" class="uk-form-stacked">
{!! csrf_field() !!}
<input type="hidden" name="subject" value="24 Hours Pharmacy" />

@if(Session('language')=='bn')

    <!--<p style="font-size: 16px;font-weight: bold;">সম্বন্ধে</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">সম্বন্ধে</p>
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
     <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">যোগাযোগের তথ্য </p>
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
  <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">সাধারণ তথ্য </p>
  
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ব্যবসার ধরণ  </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Retailer" name="business_category"id="val_radio_male" data-md-icheck ><span style="padding:5px"> খুচরা বিক্রেতা</span></label> 
                </span> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                     <label class="inline-label"><input type="radio" value="whole Seller" id="val_radio_male" data-md-icheck name="business_category"> <span style="padding:5px">পাইকারি বিক্রেতা</span></label> 
                </span>
                 <br>
                <span  style="padding:5px 5px 5px 0px" class="icheck-inline">
                  <label  class="inline-label"><input type="radio"  value="Retailer & whole Seller"id="val_radio_male" data-md-icheck name="business_category"><span style="padding:5px"> উভয়</span></label>
              </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ঔষধ ব্যবহারের বিভিন্ন নিয়ম-কানুন ব্যাখ্যা করার জন্য একজন কম্পাউণ্ডার রয়েছেন 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="pharmacist" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="pharmacist"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">ডাক্তার<br><small>যদি থাকে, ডক্টরস্‌ প্যানেলে বিস্তারিত লিখুন</small> </p>
      
    <br>
    
    <p style="font-size: 18px;font-weight: bold;background:red;color:white; text-align:center">সেবা </p>
    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold">অ্যাম্বুলেন্স</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">অ্যাম্বুলেন্স</p>

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
    <!--<p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">সুযোগ-সুবিধা</p>-->
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
                <label for="emergency_number" class="">শীতাতপ নিয়ন্ত্রিত নয়</label> <br>
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
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">আই সি ইউ অ্যাম্বুলেন্স</p>

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
                <textarea type="text" name="ac_amb_fare"  class="md-input"></textarea>
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
    <!--<p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">সুযোগ-সুবিধা </p>-->
    
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
                <label for="emergency_number" class="">চাকাওয়ালা চেয়ার </label>
                <br>
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

    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom:25px;"> হোম ডেলিভারি সার্ভিস  </p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">হোম ডেলিভারি সার্ভিস  </p>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সর্বনিম্ন অর্ডার মূল্য (টাকা) </label>
                <textarea type="text" name="home_delivary_minumum_ord"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবার পরিধি</label>
                <textarea type="text" name="home_delivary_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">ডেলিভারি চার্জ</label>
                <textarea type="text" name="home_delivary_delivery_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ডেলিভারি চার্জ আলোচনা সাপেক্ষে </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_delivary_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_delivary_negotiable"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবা ঘণ্টা</label>
                <textarea type="text" name="home_delivary_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">কার্যদিবস  </label>
                <textarea type="text" name="home_delivary_working_day"  class="md-input" roww="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">বন্ধ</label>
                <textarea type="text" name="home_delivary_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="home_delivary_contuct_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom:25px;">হোম সার্ভিস </p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">হোম সার্ভিস <br><small>বাসায় গিয়ে রোগীকে চিকিৎসা বিষয়ক বিভিন্ন সেবা প্রদান করা হয়</small> </p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">রক্তচাপ নির্ণয় করা হয়</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_blood_presssure" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_blood_presssure"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ডায়বেটিস পরীক্ষা করা হয়</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_diabets_test" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_diabets_test"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ওজন মাপা হয় </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_weight_measrement" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_weight_measrement"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">নেবুলাইজারের মাধ্যমে গ্যাস দেওয়া হয়</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_nebulization" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_nebulization"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">সুন্নত (খতনা) করা হয় </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_circumcisiont" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_circumcisiont"><span style="padding:5px;">না</span></label> 
                </span>
                 
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ইনজেকশন পুশ করা হয়  <label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_injection_push" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_injection_push"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবার পরিধি</label>
                <textarea type="text" name="home_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সার্ভিস চার্জ</label>
                <textarea type="text" name="home_delivary_service_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">সার্ভিস চার্জ আলোচনা সাপেক্ষে </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="home_service_charge_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_charge_negotiable"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>


    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">সেবা ঘণ্টা</label>
                <textarea type="text" name="home_service_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">কার্য দিবস  </label>
                <textarea type="text" name="home_service_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">বন্ধ  </label>
                <textarea type="text" name="home_service_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>

         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">যোগাযোগের নম্বর</label>
                <textarea type="text" name="home_service_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom:25px;">চিকিৎসা সেবা</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">চিকিৎসা সেবা</p>

     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">রক্তচাপ নির্ণয় করা হয় </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_blood_presssure" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_blood_presssure"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ডায়বেটিস পরীক্ষা করা হয় </label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_diabets_test" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_diabets_test"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ওজন মাপা হয়</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_weight_measrement" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_weight_measrement"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">নেবুলাইজারের মাধ্যমে গ্যাস দেওয়া হয়</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_nebulization" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_nebulization"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">সুন্নত (খতনা) করা হয় </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_circumcisiont" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_circumcisiont"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ইনজেকশন পুশ করা হয় </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="medical_service_injection_push" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_injection_push"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>

    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">আরও তথ্য<br><small>(যদি থাকে)</small>  </p>

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
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">About</p>
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
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Contact Info</p>
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
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">General Info</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Business Category</label> <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Retailer" name="business_category"id="val_radio_male" data-md-icheck ><span style="padding:5px">Retailer</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                     <label class="inline-label"><input type="radio" value="whole Seller" id="val_radio_male" data-md-icheck name="business_category"><span style="padding:5px">Whole Seller</span></label> 
                 </span>
                 <br>
                <span  style="padding:5px 5px 5px 0px" class="icheck-inline">
                  <label  class="inline-label"><input type="radio"  value="Retailer & whole Seller"id="val_radio_male" data-md-icheck name="business_category"><span style="padding:5px">Both</span></label>
              </span>
              <br>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">There is a pharmacist to explain the various rules and regulations of medication</label> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="pharmacist" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="pharmacist"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div> 
    </div>
    
    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Doctor <br><small>If Any, Write details in the Doctors Panel</small></p>
     
    <br>
    
    <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Service</p>
    
    <br>
    
    <!--<p style="font-size: 16px;font-weight: bold">Ambulance</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Ambulance</p>
    
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
    <!--<p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Facilities</p>-->
    
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
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">ICU Ambulance</p>
    
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
                <span style="padding:5px 5px 5px 0px;" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="Yes" name="ac_fare_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px;" class="icheck-inline">
                     <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="ac_fare_negotiable"><span style="padding:5px">NO</span></label> 
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
    
    <p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;"> Facilities </p>
    <!--<p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Facilities</p>-->
    <!--<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Air Conditioned </label> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                   <label class="inline-label"><input type="radio" value="yes" name="ac_air_condition"id="val_radio_male" data-md-icheck ><span style="padding:5px">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                     <label class="inline-label"><input type="radio" value="no" id="fare_negotiable" data-md-icheck name="ac_air_condition"> <span style="padding:5px">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>-->
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
    
    <!--<p style="font-size: 16px;font-weight: bold"> Home Delivery Service </p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Home Delivery Service</p>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Minimum Order Value (TK)</label>
                <textarea type="text" name="home_delivary_minumum_ord"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Area</label>
                <textarea type="text" name="home_delivary_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Delivery Charge</label>
                <textarea type="text" name="home_delivary_delivery_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Delivery Charge Negotiable</label> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_delivary_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_delivary_negotiable"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Hour</label>
                <textarea type="text" name="home_delivary_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Working Day</label>
                <textarea type="text" name="home_delivary_working_day"  class="md-input" roww="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Closed</label>
                <textarea type="text" name="home_delivary_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="home_delivary_contuct_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Home Service</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Home Service<br><small>Patient can receive various medical services staying at home</small></p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Blood Pressure Assessment</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_blood_presssure" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_blood_presssure"><span style="padding:5px;">NO</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_diabets_test" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_diabets_test"><span style="padding:5px;">NO</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_weight_measrement" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_weight_measrement"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Nebulization</label> 
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_nebulization" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_nebulization"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Circumcision</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_circumcisiont" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_circumcisiont"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Injection Push </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_injection_push" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_injection_push"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Area</label>
                <textarea type="text" name="home_service_area"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
     <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Charge</label>
                <textarea type="text" name="home_delivary_service_charge"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Service Charge Negotiable </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="home_service_charge_negotiable" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="home_service_charge_negotiable"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    
    
    <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Service Hour</label>
                <textarea type="text" name="home_service_service_hour"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="emergency_number">Working Day </label>
                <textarea type="text" name="home_service_working_day"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="hotline">Closed </label>
                <textarea type="text" name="home_service_close"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    <div class="uk-grid" data-uk-grid-margin>
    
         <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="email">Contact Number</label>
                <textarea type="text" name="home_service_number"  class="md-input" rows="2" cols="10" ></textarea>
            </div>
        </div>
    </div>
    
    
    <!--<p style="font-size: 16px; font-weight: bold; margin-bottom: 25px;">Medical Service</p>-->
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">Medical Service</p>
    
     <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Blood Presssure Assessment</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_blood_presssure" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_blood_presssure"><span style="padding:5px;">NO</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_diabets_test" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_diabets_test"><span style="padding:5px;">NO</span></label> 
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
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_weight_measrement" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_weight_measrement"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Nebulization</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_nebulization" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_nebulization"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
      <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Circumcision </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_circumcisiont" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_circumcisiont"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Injection Push </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="medical_service_injection_push" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="medical_service_injection_push"><span style="padding:5px;">NO</span></label> 
                 </span>
            </div>
        </div>
    </div>
    <p style="font-size: 18px;font-weight: bold;background:black;color:white; text-align:center">More Information<br><small>(If Any)</small></p>
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