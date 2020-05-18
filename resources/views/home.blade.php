@extends('frontend.layouts.home')

@section('content')


<div class="row">
    @if(!empty(session('successmsg'))) 
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('successmsg')}} 
        </div> 
    @endif
    @if(!empty(session('errorsmsg'))) 
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('errorsmsg')}} 
        </div>
    @endif
    <form method="post" action="{{route('user.profile')}}" enctype="multipart/form-data">
        @csrf
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                </div>

                <div class="content with-padding padding-bottom-0">

                    <div class="row">

                        <div class="col-auto">
                            <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                <img class="profile-pic" src="{{asset('public/assets/images/'.$userDetail->profile_img)}}" alt="" />
                                <div class="upload-button"></div>
                                <input class="file-upload" type="file" name="profile_img" accept="image/*"/>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>First Name</h5>
                                        <input type="text" name="name" class="with-border" value="{{Auth::user()->name}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger" style="color:red">{{$errors->first('name')}}<span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Last Name</h5>
                                        <input type="text" name="lastname" class="with-border" value="{{Auth::user()->lastname}}">
                                        @if($errors->has('lastname'))
                                        <span class="text-danger" style="color:red">{{$errors->first('lastname')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Email</h5>
                                        <input type="text" name="email" class="with-border" value="{{Auth::user()->email}}">
                                        @if($errors->has('email'))
                                        <span class="text-danger" style="color:red">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-face"></i> My Profile</h3>
                </div>

                <div class="content">
                    <ul class="fields-ul">
                        <li>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Tagline</h5>
                                        <input type="text" name="tagline" class="with-border" value="@isset($userDetail->tagline){{$userDetail->tagline}}@endisset">
                                        @if($errors->has('tagline'))
                                        <span class="text-danger" style="color:red">{{$errors->first('tagline')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Nationality</h5>
                                        <select class="selectpicker with-border" data-size="7" title="Select Country" data-live-search="true" name="country">
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AR">Argentina</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AM">Armenia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AW">Aruba</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AU">Australia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AT">Austria</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="AZ">Azerbaijan</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BS">Bahamas</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BH">Bahrain</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BD">Bangladesh</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BB">Barbados</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BY">Belarus</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BE">Belgium</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BZ">Belize</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BJ">Benin</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BM">Bermuda</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BT">Bhutan</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BG">Bulgaria</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BF">Burkina Faso</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="BI">Burundi</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="KH">Cambodia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CM">Cameroon</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CA">Canada</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CV">Cape Verde</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="KY">Cayman Islands</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CO">Colombia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="KM">Comoros</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CG">Congo</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CK">Cook Islands</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CR">Costa Rica</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CI">Côte d'Ivoire</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="HR">Croatia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CU">Cuba</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CW">Curaçao</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CY">Cyprus</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CZ">Czech Republic</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="DK">Denmark</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="DJ">Djibouti</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="DM">Dominica</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="DO">Dominican Republic</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="EC">Ecuador</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="EG">Egypt</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GP">Guadeloupe</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GU">Guam</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GT">Guatemala</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GG">Guernsey</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GN">Guinea</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GW">Guinea-Bissau</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GY">Guyana</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="HT">Haiti</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="HN">Honduras</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="HK">Hong Kong</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="HU">Hungary</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="IS">Iceland</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="IN">India</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="ID">Indonesia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="NO">Norway</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="OM">Oman</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PK">Pakistan</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PW">Palau</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PA">Panama</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PG">Papua New Guinea</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PY">Paraguay</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PE">Peru</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PH">Philippines</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PN">Pitcairn</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PL">Poland</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PT">Portugal</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="PR">Puerto Rico</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="QA">Qatar</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="RE">Réunion</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="RO">Romania</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="RU">Russian Federation</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="RW">Rwanda</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="SZ">Swaziland</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="SE">Sweden</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="CH">Switzerland</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="TR">Turkey</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="TM">Turkmenistan</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="TV">Tuvalu</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="UG">Uganda</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="UA">Ukraine</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="GB">United Kingdom</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="US">United States</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="UY">Uruguay</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="UZ">Uzbekistan</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="YE">Yemen</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="ZM">Zambia</option>
                                            <option @isset($userDetail->country){{"selected"}}@endisset value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Introduce Yourself</h5>
                                        <textarea cols="30" rows="5" name="about" class="with-border">@isset($userDetail->about){{$userDetail->about}}@endisset</textarea>
                                        @if($errors->has('about'))
                                        <span class="text-danger" style="color:red">{{$errors->first('about')}}</span>
                                        @endif

                                    </div>
                                </div>



                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="dashboard-box">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-face"></i> Contact Information</h3>
                </div>

                <div class="content">
                    <ul class="fields-ul">
                        <li>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Email</h5>
                                        <input type="text" name="contact_email" class="with-border" value="@isset($userDetail->contact_email){{$userDetail->contact_email}}@endisset">
                                        @if($errors->has('contact_email'))
                                        <span class="text-danger" style="color:red">{{$errors->first('contact_email')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Phone Number</h5>
                                        <input type="text" name="phone" class="with-border" value="@isset($userDetail->phone){{$userDetail->phone}}@endisset">
                                        @if($errors->has('phone'))
                                        <span class="text-danger" style="color:red">{{$errors->first('phone')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Address</h5>
                                        <input type="text" name="address" class="with-border" value="@isset($userDetail->address){{$userDetail->address}}@endisset">
                                        @if($errors->has('address'))
                                        <span class="text-danger" style="color:red">{{$errors->first('address')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>City</h5>
                                        <input type="text" name="city" class="with-border" value="@isset($userDetail->city){{$userDetail->city}}@endisset">
                                        @if($errors->has('city'))
                                        <span class="text-danger" style="color:red">{{$errors->first('city')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Postal Code</h5>
                                        <input type="text" name="postal_code" class="with-border" value="@isset($userDetail->postal_code){{$userDetail->postal_code}}@endisset">
                                        @if($errors->has('postal_code'))
                                        <span class="text-danger" style="color:red">{{$errors->first('postal_code')}}</span>
                                        @endif
                                    </div>
                                </div>



                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-xl-12">
            <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
        </div>
    </form>
</div>

@endsection
