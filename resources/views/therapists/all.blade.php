<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @foreach($users as $user)
      <script type="application/ld+json">
      {
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "{{$user->first_name}} {{$user->last_name}}",
        "url": "{{url('/therapist/'.$user->id)}}",
        "image": ""
      }
      </script>
      @endforeach
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - All Therapists</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <ul>
          @foreach($users as $user)
          <li><a href="{{url('/therapist/'.$user->id)}}">{{$user->first_name}} {{$user->last_name}}</a></li>
          @endforeach
        </ul>
    </body>
</html>
