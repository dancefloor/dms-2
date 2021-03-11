<div class="text-gray-600 text-sm mb-1">
    <span class="inline-flex items-start">
        @include('icons.time', ['style' => 'w-4 mr-2 mt-1'])
        <table>
            @foreach ($dailySchedule as $item)
            <tr>
                @if ($displayDay)
                <td class="pr-3">{{ $item['day'] }}</td>
                @endif
                <td>{{ $item['start_time'] }}</td>
                <td>- {{ $item['end_time'] }}</td>
            </tr>
            @endforeach
        </table>
    </span>
</div>