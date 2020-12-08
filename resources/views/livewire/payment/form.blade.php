<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Order Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Use a permanent address where you can receive mail.
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
                                    <option></option>
                                    @foreach (\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="order_id" class="df-form-label">Order</label>
                                <select wire:model.lazy="order_id" class="form-select df-form-select">
                                    <option></option>
                                    @foreach (\App\Models\Order::isUnpaid() as $order)
                                    <option value="{{ $order->id }}">
                                        ID: {{ $order->id}} | {{ $order->user->name }} {{ $order->user->lastname }} |
                                        amount: CHF {{ $order->total }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="method" class="df-form-label">Method</label>
                                <select wire:model.lazy="method" class="form-select df-form-select">
                                    <option></option>
                                    <option value="credit card">Credit Card</option>
                                    <option value="revolut">Revolut</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="cash">Cash</option>
                                    <option value="multiple">Multiple</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="provider" class="df-form-label">Provider</label>
                                <input wire:model.lazy="provider" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="status" class="df-form-label">Status</label>
                                <select wire:model.lazy="status" class="form-select df-form-select">
                                    <option disabled></option>
                                    <option value="open">Open</option>
                                    <option value="canceled">Canceled</option>
                                    <option value="paid">Paid</option>
                                    <option value="expired">Expired</option>
                                    <option value="partial">Partial</option>
                                    <option value="overpaid">Overpaid</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="received_date" class="df-form-label">Received date</label>
                                <input wire:model.lazy="received_date" type="date" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="amount" class="df-form-label">Amount</label>
                                <input wire:model.lazy="amount" type="number" step=".01"
                                    class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="currency" class="df-form-label">Currency</label>
                                <select wire:model.lazy="currency" class="form-select df-form-select">
                                    <option disabled></option>
                                    <option value="CHF">CHF</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="amount_received" class="df-form-label">Amount Received</label>
                                <input wire:model.lazy="amount_received" type="number" step=".01"
                                    class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="mollie_payment_id" class="df-form-label">Mollie payment ID</label>
                                <input wire:model.lazy="mollie_payment_id" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="code" class="df-form-label">Code</label>
                                <input wire:model.lazy="code" class="form-input df-form-input">
                            </div>

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