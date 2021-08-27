<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-4 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Order Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-3">
            <form wire:submit.prevent="save" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-5">
                                <label for="user_id" class="df-form-label">User</label>
                                <div class="flex items-center">

                                    <div class="flex-shrink-0 h-10 w-10 ml-2">
                                        <img class="h-10 w-10 rounded-full flex-shrink-0 bg-gray-300"
                                            src="{{ $user->profile_photo_url }}" alt="{{ $user->name}}">
                                    </div>
                                    <div class="ml-4">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="text-sm leading-5 font-medium text-gray-900 hover:text-gray-800 hover:underline">
                                            {{ $user->name }} {{ $user->lastname }}
                                        </a>
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ $user->email}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-1">
                                <label for="status" class="df-form-label">Status</label>
                                <x-shared.display-status status="{{ $order->status }}" />
                            </div>

                            <div class="col-span-6">
                                <livewire:order.add-course-select :order="$order" />
                            </div>
                            <div class="col-span-6">
                                <livewire:order.courses-table :courses="$cids" :user="$user" :order="$order" />
                            </div>

                            <div class="col-span-6">
                                <div class="grid grid-cols-3 gap-5">
                                    <div class="col-span-3 sm:col-span-1">
                                        <label for="coupon_code" class="df-form-label">Coupon code</label>
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <input wire:model.lazy="coupon_code" class="form-input df-form-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="mt-8 w-full">
                            <tr>
                                <td><label for="subtotal" class="df-form-label">Subtotal</label></td>
                                <td><input wire:model="order.subtotal" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled></td>
                            </tr>
                            <tr>
                                <td class="w-1/3"><label for="discount" class="df-form-label">Multiple classes
                                        discount</label></td>
                                <td>
                                    <input wire:model="order.discount" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="reduction" class="df-form-label">Student / unemployment
                                        discount</label></td>
                                <td><input wire:model="order.reduction" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled></td>
                            </tr>
                            {{-- <tr>
                                <td><label for="vat" class="df-form-label">VAT (%)</label></td>
                                <td>
                                    <input wire:model.lazy="order.vat" type="number" step=".01"
                                        class="form-input df-form-input">
                                </td>
                            </tr> --}}
                            <tr>
                                <td><label for="adjustment" class="df-form-label">Adjustment</label></td>
                                <td><input wire:model="order.adjustment" type="number" step=".01"
                                        class="form-input df-form-input"></td>
                            </tr>
                            <tr>
                                <td><label for="total" class="df-form-label">Total</label></td>
                                <td>
                                    <input wire:model.lazy="order.total" type="number" step=".01"
                                        class="form-input df-form-input bg-gray-100" disabled>
                                </td>
                            </tr>
                        </table>

                        <div class="grid grid-cols-4 gap-6 mt-6">
                            <div class="col-span-6">
                                <label for="order.comments" class="df-form-label">Comments</label>
                                <textarea wire:model.lazy="order.comments" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-6 mt-6">
                            <div class="col-span-6">
                                <label for="comments_admin" class="df-form-label">Comments admin</label>
                                <textarea wire:model.lazy="comments_admin" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        @if ($errors->any())
                        <div class="alert alert-danger p-2 mb-6">
                            <ul class="list-disc mx-8">
                                @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
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