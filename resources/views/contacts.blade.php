@extends('layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="page-header">
                <h1>Contact List
                    <small> - Search</small>
                </h1>
            </div>

        </div>

        <div class="row">

            {{--Datatables implements search field, order field and number of rows for paginate.--}}
                {{--The javascript config file for this view is public/js/contact-list.js--}}

            <table id="tb-contacts" class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>

                <tbody>
                @if (isset($contacts))
                    @foreach($contacts as $contact)
                        <tr data-contact="{{ $contact->id }}">
                            <td><img width="40" height="40" src="{{ url('storage/' . $contact->image) }}" alt=""></td>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>
    </div>
@endsection()

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js"></script>
    <script src="{{ asset('js/contact-list.js') }}"></script>
@endpush()