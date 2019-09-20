@component('mail::message')

Your Company <strong>{{$company["name"]}}</strong> has been added to Fullstack's CRM.

with the following Informations: <br>
website : <a href="{{$company['website']}}"> {{$company['website']}}</a> <br>
Email   : {{$company['email']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
