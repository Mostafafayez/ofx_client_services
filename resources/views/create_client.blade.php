@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Client</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_name">Client Name</label>
            <input type="text" name="client_name" id="client_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="client_name_ar">Client Name (Arabic)</label>
            <input type="text" name="client_name_ar" id="client_name_ar" class="form-control">
        </div>

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="company_name_ar">اسم الشركه</label>
            <input type="text" name="company_name_ar" id="company_name_ar" class="form-control">
        </div>

        <div class="form-group">
            <label for="mission">Mission</label>
            <textarea name="mission" id="mission" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="vision">Vision</label>
            <textarea name="vision" id="vision" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="about_us">About Us</label>
            <textarea name="about_us" id="about_us" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="additional_info">Additional Info</label>
            <textarea name="additional_info" id="additional_info" class="form-control"></textarea>
        </div>

        <h4>Services</h4>
        <div id="services">
            <div class="service">
                <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input type="text" name="services[0][service_name]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="service_name_ar">Service Name (Arabic)</label>
                    <input type="text" name="services[0][service_name_ar]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="services[0][description]" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="description_ar">Description (Arabic)</label>
                    <textarea name="services[0][description_ar]" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="addService">Add Another Service</button>

        <h4>Contacts</h4>
        <div id="contacts">
            <div class="contact">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="contacts[0][email]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" name="contacts[0][whatsapp]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phones">Phone Numbers</label>
                    <input type="text" name="contacts[0][phones][0][phone_number]" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="addContact">Add Another Contact</button>

        <button type="submit" class="btn btn-primary">Create Client</button>
    </form>
</div>

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Link to JavaScript -->
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection
