<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('BCSc') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Styles -->

        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-lightest">
    <div class="flex flex-row justify-center items-center mt-8 mx-4">
        <h3 class="text-2xl font-semibold flex flex-col">
            <span class="text-gray-welcome">{{ __('Welcome to') }}</span>
            <span class="text-blue-dark">{{ __("Bachelors Of Computer Science") }}</span>
            <span class="text-blue-dark">{{ __("Semester 4") }}</span>
        </h3>
    </div>

        @if ($active_group)
            @foreach ($active_group as $day_name => $periods)
            <div class="text-gray-lightest bg-blue-card rounded-lg p-4 m-4 mt-8 relative">
                <div class="absolute rounded-full px-3 py-2 text-xs bg-white shadow-lg text-blue-dark font-semibold" style="right:29px;top:-16px;">{{ __("TODAY") }}</div>
                <div class="font-medium">{{ strtoupper($day_name) }}</div>
                @foreach ($periods as $period)
                    <div class="bg-blue-card_highlight p-4 rounded-lg mt-4">
                        <div class="flex flex-row justify-between items-center text-xs">
                            <div class="flex flex-row">
                                <div>{{ $period->formatted_start_at }}</div>
                                <div class="px-1">-</div>
                                <div>{{ $period->formatted_end_at }}</div>
                            </div>
                            <div>
                                {{ strtoupper($period->location) }}
                            </div>
                        </div>
                        <div class="mt-2 font-medium">
                            {{ \Illuminate\Support\Str::title(optional($period->subject)->name) }}
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        @endif

        @foreach ($inactive_group as $weekday => $periods)
            <div class="px-4">
                <div class="text-gray-welcome font-medium mt-4">{{ strtoupper($weekday) }}</div>

                @foreach ($periods as $period)
                    <div class="bg-gray-light p-4 rounded-lg mt-2">
                        <div class="flex flex-row justify-between items-center text-xs">
                            <div class="flex flex-row text-blue-light">
                                <div>{{ $period->formatted_start_at }}</div>
                                <div class="px-1">-</div>
                                <div>{{ $period->formatted_end_at }}</div>
                            </div>
                            <div class="text-blue-dark">
                                {{ strtoupper($period->location) }}
                            </div>
                        </div>
                        <div class="mt-2 font-medium">
                            {{ \Illuminate\Support\Str::title(optional($period->subject)->name) }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="flex justify-center items-center pt-8">
            <span class="text-gray-300 pb-4 text-sm">{{ __('Made with ♥ by @abunooh') }}</span>
        </div>
    </body>
</html>
