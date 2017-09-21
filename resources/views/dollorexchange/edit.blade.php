@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Update Dollor Exchange</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/dollorexchange/edit/{{ $dollorexchange->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $dollorexchange->name }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $dollorexchange->full_name }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cents</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $dollorexchange->cents }}" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Update</button>
                        </div>
                    </div>
                </div>
                </form>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
@endsection
@section('jquery')
<script type="text/javascript">
 
</script>
@endsection
