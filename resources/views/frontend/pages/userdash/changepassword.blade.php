@extends('frontend.layouts.home')

@section('content')
<div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div id="test1" class="dashboard-box">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                        </div>

                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Current Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>New Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Repeat New Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="two-step" checked>
                                        <label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
                <div class="col-xl-12">
                    <a href="#" class="button ripple-effect big margin-top-30">Save Changes</a>
                </div>
            </div>

@endsection
