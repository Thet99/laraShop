@extends('frontend.layouts.app')

@section('content')
  
  <div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;color:#fff;">
                        Complete Your Order
                    </h2>
                    
                    <div class="shopping_cart">
                        
                         {{ Form::open(['route' => 'frontend.checkout_process', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'payment-form', 'files'=>true]) }}
    
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing
                                            information.</b>
                                        <br/><br/>
                                        <table class="table table-striped" style="font-weight: bold;">
                                           
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_name">Name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_name" name="name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email" value="{{Auth::user()->email}}" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="address">Address:</label></td>
                                                <td>
                                                    <input class="form-control" id="address"
                                                           name="address" required="required" type="textarea"/>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">Region:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="YGN">Yangon</option>
                                                        <option value="MDY">Mandalay</option>
                                                        <option value="MGW">Magway</option>
                                                        <option value="SAG">Sagaing</option>
                                                        <option value="TNY">Thaninthayee</option>
                                                        
                                                        
                                                    </select>
                                                </td>
                                            </tr>
                                            

                                        </table>
                                    </div>
                                </div>
                            </div>
            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse">
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend>What method would you like to pay with today?</legend>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label" for="card-holder-name">Payment Method</label>
                                              <div class="col-sm-9">     
                                            <input type="radio" class="form-control" checked="" name="payment_method" value="1">Cash on delivery
                                            <input type="radio" class="form-control" checked="" name="payment_method" value="2">Paypel
                                            </div>
                                            </div>

                                            <div class="Payment Phone"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name">Payment Phone
                                                    </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="payment_phone">
                                                           
                                                </div>
                                            </div>
                                            <div class="Payment Phone"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name">Payment Email
                                                    </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="payment_phone">
                                                           
                                                </div>
                                            </div>
                                             
                                            
                                                    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
                                            Now
                                        </button>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="/legal/billing/">universal
                                                billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
               {{ Form::close() }}
            </div>
        </div>
    </div>


 
@endsection