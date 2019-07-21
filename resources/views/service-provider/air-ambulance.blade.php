<form id="form_validation" method="post" action="{{route('service-air-ambulance')}}" class="uk-form-stacked">
{!! csrf_field() !!}
<input type="hidden" name="subject" value="Air Ambulance" />
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
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom:25px;">সুযোগ-সুবিধা </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">সুযোগ-সুবিধা</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">আই সি ইউ </label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="amb_facilities_icu" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="amb_facilities_icu"><span style="padding:5px;">না</span></label> 
                </span>
                <span  style="padding:5px 5px 5px 0px" class="icheck-inline">
                
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">সাধারণ  </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="Yes" name="amb_facilities_normal" id="val_radio_male" data-md-icheck ><span style="padding:5px;">হ্যাঁ</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
	                <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="amb_facilities_normal"><span style="padding:5px;">না</span></label> 
                </span>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">গুরুতর যত্নের জন্য মেডিক্যাল কর্মী </label> 
                <br>
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
    
   <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">সেবা</p>

   <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="message">
                </label>
                <textarea class="md-input" name="service_details" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
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
    
    <!--<p style="font-size: 16px;font-weight: bold; margin-bottom: 25px;">Facilities </p>-->
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">Facilities</p>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">ICU</label> 
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="amb_facilities_icu" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="amb_facilities_icu"><span style="padding:5px;">NO</span></label> 
                 </span>
                <span  style="padding:5px 5px 5px 0px" class="icheck-inline">
                
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            
            <div class="uk-form-row parsley-row">
                <label for="emergency_number" class="">Normal </label>
                <br>
                 <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="Yes" name="amb_facilities_normal" id="val_radio_male" data-md-icheck ><span style="padding:5px;">YES</span></label> 
                </span>
                <br>
                <span style="padding:5px 5px 5px 0px" class="icheck-inline">
                    <label class="inline-label"><input type="radio" value="No" id="val_radio_male" data-md-icheck name="amb_facilities_normal"><span style="padding:5px;">NO</span></label> 
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
    
   <p style="font-size: 18px;font-weight: bold; background:red; color:white; text-align: center; margin-bottom: 2px;">Service</p>
   <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="parsley-row">
                <label for="message">
                </label>
                <textarea class="md-input" name="service_details" cols="10" rows="2" data-parsley-trigger="keyup"  data-parsley-validation-threshold="10" d></textarea>
            </div>
        </div>
    </div>    
    <p style="font-size: 18px;font-weight: bold; background:black; color:white; text-align: center;">More Information <br><small>(If Any)</small></p>

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