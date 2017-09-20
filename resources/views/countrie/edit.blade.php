@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Update Company</b></div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/countrie/edit/{{ $country->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{  $country->name }}" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-sm-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary"> Update</button>
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
