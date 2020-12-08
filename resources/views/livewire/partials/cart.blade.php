{{-- @if (session()->has('success'))
<div x-data="{ open: true }" x-show="open">
    <!--Header Alert-->
    <div class="alert-banner w-full mb-10">
        <label
            class="close cursor-pointer flex items-center justify-between w-full py-4 px-5 bg-green-400 rounded text-white font-bold"
            title="close" for="banneralert">
            {{ session()->get('success') }}
<button type="button" @click="open = false">
    @include('icons.x', ['style'=>'w-3'])
</button>
</label>
</div>
</div>
@endif --}}


<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" width="45%"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" width="35%"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Period
                            </th>
                            <th scope="col" width="20%"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class=bg-gray-50 text-right"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach (auth()->user()->pendingCourses as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $item->name }}
                                <span class="block text-xs text-gray-600">{{ $item->level }} {{ $item->focus }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if ($item->start_date)
                                {{ \Carbon\Carbon::parse( $item->start_date )->format('M d, y') }} -
                                {{ \Carbon\Carbon::parse( $item->end_date )->format('M d, y') }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                CHF {{ $item->full_price }}
                            </td>
                            <td class="pr-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                <button wire:click="removeCourse({{$item}})" class="text-gray-500 hover:text-red-700">
                                    @include('icons.trash')
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br>

<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th scope="col" width="45%"
                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>

                <th scope="col" width="20%"
                    class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Price
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Subtotal
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    CHF {{ $subtotal }}
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                    Total
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                    CHF {{ $total }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="my-10 flex justify-end">
    <a href="" class="df-btn-primary">
        @include('icons.checkout-cart')
        <span class="ml-2">Checkout</span>
    </a>
</div>