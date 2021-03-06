@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.roles.management') }}
        <small>{{ trans('labels.backend.access.roles.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($pages, ['route' => ['admin.pages.update', $pages], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-page','files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Page</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-success" ahref="{{route('admin.categories.index')}}">Back To Pages</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Slug</label>

                    <div class="col-lg-10">
                        {{ Form::text('slug', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Description</label>

                    <div class="col-lg-10">
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
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
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop