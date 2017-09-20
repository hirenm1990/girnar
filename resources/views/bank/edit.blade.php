@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-default">
                <div class="panel-heading"><b>Update Bank Details</b></div>

                <div class="panel-body">
                @if (Session()->has('message')) 
                  <div class="alert alert-success msg" role="alert">
                    {{ Session()->get('message') }}
                  </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{ URL::to('/') }}/bank/edit/{{ $bank->id }}">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $bank->name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="address">{{ $bank->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{ $bank->phone }}">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone 2</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone2" value="{{ $bank->phone2 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="account_no" value="{{ $bank->account_no }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">SWIFT Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="swift_code" value="{{ $bank->swift_code }}">
                        </div>
                    </div>
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
