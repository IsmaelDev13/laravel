<x-mail::message>
# Introduction
<h2>
  {{$job->title}}
</h2>

The body of your message.

<p>
  <a href="{{url('/jobs/')}}">View your job listing</a>
</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
