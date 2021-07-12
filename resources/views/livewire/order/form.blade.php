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

                            <div class="col-span-6 sm:col-span-2">
                                <label for="status" class="df-form-label">Status</label>
                                <select wire:model.lazy="status" class="form-select df-form-select">
                                    <option>Select status</option>
                                    <option value="open">Open</option>
                                    <option value="canceled">Canceled</option>
                                    <option value="paid">Paid</option>
                                    <option value="expired">Expired</option>
                                    <option value="partial">Partial</option>
                                </select>
                                @error('status')
                                <p class="dkdkd">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6" wire:ignore>
                                <label for="comments" class="df-form-label">Courses</label>
                                <select id="cids" class="w-full" multiple>
                                    @foreach (\App\Models\Course::all() as $item)
                                    <option value="{{ $item->id }}" @isset($order)
                                        {{ $order->hasCourse($item->id) ? 'selected' : '' }} @endisset>
                                        {{ $item->name }} ({{ implode('', $item->days) }} -
                                        @foreach ($item->teachers as $t)
                                        {{ $t->name}}
                                        @endforeach
                                        )
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="coupon_code" class="df-form-label">Coupon code</label>
                                <input wire:model.lazy="coupon_code" class="form-input df-form-input">
                            </div>
                        </div>
                        <table class="mt-8">
                            <tr>
                                <td><label for="subtotal" class="df-form-label">Subtotal</label></td>
                                <td><input wire:model.lazy="subtotal" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled></td>
                            </tr>
                            <tr>
                                <td class="w-1/3"><label for="discount" class="df-form-label">Multiple classes
                                        discount</label></td>
                                <td>
                                    <input wire:model.lazy="discount" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="reducedPrice" class="df-form-label">Student / unemployment
                                        discount</label></td>
                                <td><input wire:model.lazy="reducedPrice" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled></td>
                            </tr>
                            {{-- <tr>
                                <td><label for="vat" class="df-form-label">VAT (%)</label></td>
                                <td>
                                    <input wire:model.lazy="vat" type="number" step=".01"
                                        class="form-input df-form-input">
                                </td>
                            </tr> --}}
                            <tr>
                                <td><label for="adjustment" class="df-form-label">Adjustment</label></td>
                                <td><input wire:model.lazy="adjustment" type="number" step=".01"
                                        class="form-input df-form-input"></td>
                            </tr>
                            <tr>
                                <td><label for="total" class="df-form-label">Total</label></td>
                                <td>
                                    <input wire:model.lazy="total" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled>
                                </td>
                            </tr>
                        </table>

                        <div class="grid grid-cols-4 gap-6 mt-6">
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
    @push('modals')
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cids').select2();
            $('#cids').on('change', function(e){                
                let value = Array.from(e.target.selectedOptions, option => option.value);
                @this.set('cids', value);            
            });
        });
    </script>
    @endpush
</div>