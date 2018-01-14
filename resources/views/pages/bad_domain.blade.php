@extends('app')

@section('content')
    <div class="row head">
        <a class="left" href="{{route('home')}}">&#8592; Clicks </a>
    </div>
    
    <div class="row ">
        <h3>Add a new bad domain</h3>
        <form  method="POST" action="{{route('bad.create')}}">
            {{ csrf_field() }}
            <div class="err-block"></div>
            <div class="form-group">
                <label for="domain">Domain</label>
                <input id="name" type="url"  name="name"
                       value="{{ old('name') }}" required >
            </div>
            <button type="submit">Add Domain</button>
        </form>
        
        <div class="col-sm-12">
            <table class="table table-bordered table-striped dataTable  no-footer"
                   id="domainsDatatable" role="grid"
                   data-url="{{route('bad.datatable')}}">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0"
                        aria-controls="datatable-editable" rowspan="1" colspan="1"
                        aria-sort="ascending"
                        aria-label="#: activate to sort column descending"
                        style="width: 50px;">#
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Name: activate to sort column ascending"
                        style="width: 433px;">Name
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
