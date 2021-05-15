@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kuntact Form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('contact-form.create') }}" class="badge badge-success">Send Message</a>
                    
                    <h3 class="mt-3">Recent Messages</h3>
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Email</th>
                                    <th>Date Sent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->index +1}}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
