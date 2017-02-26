@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        Create Orders
        <small>Creating Orders</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.orders.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Order</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.orders.index')}}">Back To Order List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="customer_id" class="control-label">Product</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        {!! Form::select("product_id[]",$products,null,["class"=>"form-control","multiple"=>"multiple"],null)!!}
                    </div><!--col-lg-10-->
                </div><!--form group-->
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="customer_id" class="control-label">Customer</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        {!! Form::select("customer_id",$users,null,["class"=>"form-control"],null)!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="order_amount" class="control-label">Order Amount</label>
                    </div>
                   
                    <div class="col-lg-10">
                        <input type="text" name="order_amount" id="order_amount" class="form-control" placeholder="Enter Order Amount">
                    </div><!--col-lg-10-->
                    
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Order Address</label>
                    </div>
                    
                    <div class="col-lg-10">
                        <input type="text" name="order_address" id="order_address" class="form-control" placeholder="Enter Address">
                    </div><!--col-lg-10-->
                </div><!--form group-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_phone" class="control-label">Order Phone</label>
                    </div>
                    
                    <div class="col-lg-10">
                        <input type="text" name="order_phone" id="order_phone" class="form-control" placeholder="Enter phone">
                    </div><!--col-lg-10-->
                </div><!--form group-->
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="order_status" class="control-label">Order Status</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        {!! Form::select("order_status",[0=>"pending",1=>"complete"],null,["class"=>"form-control"],null)!!}
                    </div><!--col-lg-10-->
                </div><!--form group-->
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="payment_status" class="control-label">Payment Status</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        {!! Form::select("payment_status",[0=>"pending",1=>"complete"],null,["class"=>"form-control"],null)!!}
                    </div><!--col-lg-10-->
                </div><!--form group-->
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="payment_method" class="control-label">Payment Method</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.roles.name')]) }} -->
                        {!! Form::select("payment_method",[1=>"Cash On Delivery",2=>"MPU",3=>"Visa"],null,["class"=>"form-control"],null)!!}
                    </div><!--col-lg-10-->
                </div><!--form group-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
