<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Transaction Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Add all the necesary information regarding the transaction
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $action == 'create' ? 'create' : 'update' }}" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="user_id" class="df-form-label">User</label>
                                <select wire:model.lazy="user_id" class="form-select df-form-select">
                                    <option value="" selected disabled>Select user</option>
                                    @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }} {{ $u->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="order_id" class="df-form-label">Order</label>
                                <select wire:model.lazy="order_id"
                                    class="form-select df-form-select @error('order_id') border-red-600 @enderror">
                                    <option value="" selected disabled>Select order</option>
                                    @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">
                                        ID: {{ $order->id}} | {{ $order->user->name }} {{ $order->user->lastname }} |
                                        to pay: CHF {{ $order->total - $order->received }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('order_id')
                                <span class="text-red-600 text-xs">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="method" class="df-form-label">Method</label>
                                <select wire:model.lazy="method"
                                    class="form-select df-form-select @error('method') border-red-600 @enderror">
                                    <option value="" selected disabled>Choose a method</option>
                                    <option value="credit card">Credit Card</option>
                                    <option value="revolut">Revolut</option>
                                    <option value="post">Post</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="cash">Cash</option>
                                    <option value="multiple">Multiple</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('method')
                                <span class="text-red-600 text-xs">{{ $message}}</span>
                                @enderror
                            </div>

                            {{-- <div class="col-span-6 sm:col-span-2">
                                <label for="provider" class="df-form-label">Provider</label>
                                <input wire:model.lazy="provider" class="form-input df-form-input">
                            </div> --}}

                            <div class="col-span-6 sm:col-span-2">
                                <label for="type" class="df-form-label">Type</label>
                                <select wire:model.lazy="type" class="form-select df-form-select">
                                    <option disabled>Choose Type</option>
                                    <option value="in">Credit (in)</option>
                                    <option value="out">Debit (out)</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-form.date-input name="received_date" label="Received date" />
                                {{-- <label for="" class="df-form-label">Received date</label>
                                <input wire:model.lazy="received_date" type="date"
                                    class="form-input df-form-input @error('received_date') border-red-600 @enderror">
                                @error('received_date')
                                <span class="text-red-800 text-xs">{{ $message}}</span>
                                @enderror --}}
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="amount"
                                    class="df-form-label">{{ $type == 'in' ? 'Amount credited' : 'Amount debited'}}</label>
                                @if ($type == 'in')
                                <input wire:model.lazy="credit" type="number" step=".01"
                                    class="form-input df-form-input">
                                @error('credit')
                                <span class="text-red-600 text-xs">{{ $message}}</span>
                                @enderror
                                @else
                                <input wire:model.lazy="debit" type="number" step=".01"
                                    class="form-input df-form-input">
                                @error('debit')
                                <span class="text-red-600 text-xs">{{ $message}}</span>
                                @enderror
                                @endif
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="currency" class="df-form-label">Currency</label>
                                <select wire:model.lazy="currency" class="form-select df-form-select">
                                    <option value="CHF">CHF</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="amount_received" class="df-form-label">Amount Received</label>
                                <input wire:model.lazy="amount_received" type="number" step=".01"
                                    class="form-input df-form-input">
                                @error('amount_received')
                                <span class="text-red-600 text-xs">{{ $message}}</span>
                                @enderror
                            </div>

                            {{-- <div class="col-span-6 sm:col-span-2">
                                <label for="mollie_payment_id" class="df-form-label">Mollie payment ID</label>
                                <input wire:model.lazy="mollie_payment_id" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="code" class="df-form-label">Code</label>
                                <input wire:model.lazy="code" class="form-input df-form-input">
                            </div> --}}

                            <div class="col-span-6">
                                <label for="comments" class="df-form-label">Comments</label>
                                <textarea wire:model.lazy="comments" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>