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
