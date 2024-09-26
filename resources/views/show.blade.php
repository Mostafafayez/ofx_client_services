@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <h2>Client Details</h2>
    <p><strong>Client Name:</strong> {{ $client->client_name }}</p>
    <p><strong>Company Name:</strong> {{ $client->company_name }}</p>
    <p><strong>Mission:</strong> {{ $client->mission }}</p>
    <p><strong>Vision:</strong> {{ $client->vision }}</p>

    <h4>Services</h4>
    <ul>
        @foreach($client->services as $service)
            <li>{{ $service->service_name }}: {{ $service->description }}</li>
        @endforeach
    </ul>

    <h4>Contacts</h4>
    <ul>
        @foreach($client->contacts as $contact)
            <li>
                Email: {{ $contact->email }},
                WhatsApp: {{ $contact->whatsapp }},
                Phone Numbers:
                @foreach($contact->phones as $phone)
                    {{ $phone->phone_number }}
                @endforeach
            </li>
        @endforeach
    </ul>

    <h4>References</h4>
    <ul>
        @foreach($client->references as $reference)
            <li>{{ $reference->reference_detail }}</li>
        @endforeach
    </ul>
</div>

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/show.css') }}">

@endsection
