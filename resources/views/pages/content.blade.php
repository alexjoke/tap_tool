@extends('app')

@section('content')
    <div class="row head">
        <a class="right" href="{{route('bad')}}">Bad Domains &#8594;</a>
    </div>
    <div class="row ">
            <table class="table table-bordered table-striped dataTable  no-footer"
                   id="clicksDatatable" role="grid"
                   data-url="{{route('click.datatable')}}">
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
                        style="width: 433px;">Country
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Type: activate to sort column ascending"
                        style="width: 386px;">IP
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Organization: activate to sort column ascending"
                        style="width: 386px;">Referrer
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Organization: activate to sort column ascending"
                        style="width: 386px;">User Agent
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Source: activate to sort column ascending"
                        style="width: 386px;">Param 1
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Medium: activate to sort column ascending"
                        style="width: 386px;">Param 2
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Campaign: activate to sort column ascending"
                        style="width: 386px;">Errors
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-editable"
                        rowspan="1" colspan="1"
                        aria-label="Term: activate to sort column ascending"
                        style="width: 386px;">Bad Domain
                    </th>
                </tr>
                </thead>
            </table>
   
    </div>
@endsection
