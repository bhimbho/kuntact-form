@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact Form') }}</div>

                <div class="card-body">
                    @include('includes.error')
                    <form action="{{ Route('contact-form.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Document <span class="text-danger"> .pdf, .xlsx and .csv</span></label>
                            <input name="upload_file" type="file" class="form-control" >
                       </div>
                       <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="fullname" class="form-control" value="{{ Auth::user()->name }}">
                       </div>
                       <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" class="form-control" value="{{ Auth::user()->email }}">
                       </div>
                       <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control" rows="4"></textarea>
                        </div>
                        <button class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
