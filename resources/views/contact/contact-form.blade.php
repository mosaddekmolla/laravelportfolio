@component('mail::message')
    <h3>New Message from {{$contact_form_data['email']}}</h3>

    Name: {{$contact_form_data['name']}}

    Phone Number: {{$contact_form_data['phone']}}

    Message: {{$contact_form_data['message']}}


@endcomponent
