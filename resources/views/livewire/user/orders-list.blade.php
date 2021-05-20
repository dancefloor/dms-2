<div>
    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
        @foreach ($orders as $o)
        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
                <a href="{{ route('orders.show', $o) }}" class="flex text-gray-600 hover:text-red-700">
                    @include('icons.orders')
                    <span class="ml-2">
                        Order ID:
                        {{ $o->id }} |
                        {{ $o->created_at }}
                    </span>
                </a>

            </div>
            <div class="ml-4 flex-shrink-0">
                <x-shared.display-status status="{{ $o->status }}" />
            </div>
        </li>
        @endforeach
    </ul>
    <div class="my-2">
        {{ $orders->links() }}
    </div>
</div>