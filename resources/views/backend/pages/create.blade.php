@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.pages.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        Create Page
        <small>Creating Page</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.pages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-page','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Page</h3>

                <div class="box-tools pull-right">
                    
                    <a class="btn btn-success" href="{{route('admin.pages.index')}}">Back To Page List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="title" class="control-label">Title</label>
                    </div>
                    <div class="col-lg-10">
                        
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Page Title" />
                    </div><!--col-lg-10-->
                </div><!--form control--> 

                <div class="form-group">
                    
                    <div class="col-lg-2">
                        <label for="slug" class="control-label">Slug</label>
                    </div>
                    <div class="col-lg-10">
                        
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug" />
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    
                    <div class="col-lg-2">
                        <label for="description" class="control-label">Descriptions</label>
                    </div>
                    <div class="col-lg-10">
                        
                        <input type="textarea" id="description" name="description" class="form-control" placeholder="Enter descriptions" />
                    </div><!--col-lg-10-->
                </div><!--form control-->               

                
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
