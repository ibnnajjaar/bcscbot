

@foreach ($ordered_inactive_group as $group)
    @foreach ($group as $weekday => $periods)
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
                        <div class="text-blue-light">
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
@endforeach
