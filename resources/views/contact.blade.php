@extends('layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/libs/Jcrop/css/Jcrop.min.css') }}">
@endpush

@section('content')
    <div class="container">

        <div class="box-add-contact">
            <div class="row">
                <div class="page-header">
                    @if (!isset($contact))
                        <h1>Add a new Contact</h1>
                    @else
                        <h1>Update Contact</h1>
                    @endif
                </div>
            </div>

            {{--
                if $contact variable exists this view will be to contact update selected in contact list page
            --}}

            <div class="row">
                @if (isset($contact))
                    {{ Form::model($contact, ['route' => ['contacts.update', $contact->id], 'id'=> 'form-contact', 'files' => true]) }}
                    {{ method_field('PUT') }}
                    {{ Form::hidden('action', 'update') }}
                    {{ Form::hidden('imageSrc', asset('storage/' . $contact->image)) }}
                @else
                    {!! Form::open(['url' => 'contacts', 'method' => 'POST', 'id'=> 'form-contact', 'files' => true]) !!}
                @endif
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">

                        <div class="well">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="box-canvas img-thumbnail">
                                        <canvas id="canvas-contact" height="100" width="100"></canvas>
                                    </div>
                                    <input type="hidden" name="imageData" id="imageData"/>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First name</label>

                                    {{ Form::text('first_name', old('first_name'), [
                                        'class'=>'form-control',
                                        'required' => 'required',
                                        'placeholder'=>'First name',
                                        'pattern' => '.{4,30}'
                                    ]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last name</label>

                                    {{ Form::text('last_name', old('last_name'), [
                                        'class'=>'form-control',
                                        'required' => 'required',
                                        'placeholder'=>'Last name',
                                        'pattern' => '.{2,50}'
                                    ]) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email address</label>

                                    {{ Form::email('email', old('email'), [
                                        'class'=>'form-control',
                                        'id' => 'email',
                                        'placeholder'=>'Email',
                                        'required' => 'required',
                                        'pattern' => '.{7,60}'
                                    ]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>

                                    {{ Form::text('phone', old('phone'), [
                                        'class'=>'form-control',
                                        'required' => 'required',
                                        'placeholder'=>'Phone',
                                        'id' => 'phone',
                                        'placeholder' => 'Contact phone',
                                        'pattern' => '^[^a-zA-Z]+$'
                                    ]) }}

                                    {{-- regExp "/^\+[0-9]{1,3}\([0-9]{2,3}\) [0-9]{4,5}-[0-9]{4}$/"--}}

                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modal-image" tabindex="-1" role="dialog"
                             aria-labelledby="label-modal-image">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Upload and Crop image</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                @if (!isset($contact))
                                                    <div id="box-img" class="row">
                                                        <img id="show-img" width="50%"
                                                             src="{{ asset('images/placeholder_avatar.jpg') }}"
                                                             alt="">
                                                    </div>
                                                    <div class="row">
                                                        <div class="upload">
                                                            {{ Form::file('image', ['id' => 'image']) }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div id="box-img" class="row">
                                                        <img id="show-img" width="50%"
                                                             src="{{ url('storage/' . $contact->image) }}"
                                                             alt="">
                                                    </div>
                                                    <div class="row">
                                                        <div class="upload">
                                                            {{ Form::file('image',['id' => 'image']) }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <input type="hidden" id="x" name="x"/>
                                        <input type="hidden" id="y" name="y"/>
                                        <input type="hidden" id="w" name="w"/>
                                        <input type="hidden" id="h" name="h"/>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button id="btn-crop" type="button" class="btn btn-primary">Save changes </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{ Form::submit('Save', ['class'=>'btn btn-primary btn-lg']) }}
                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection()

@push('scripts')
    <script src="{{ asset('/libs/jquery.browser/dist/jquery.browser.min.js') }}"></script>
    <script src="{{ asset('/libs/Jcrop/js/jquery.Jcrop.js') }}"></script>
    <script src="{{ asset('/js/contact.js') }}"></script>
@endpush()