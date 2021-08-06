<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Payment methods
                </h1>
            </div>
        </div>
    </x-slot>
    <div class="px-4 mt-5 md:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-1">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg px-5 pt-3 pb-8">
                    <h3 class="text-3xl font-bold text-gray-800 capitalize">Bank transfer</h3>
                    <table class="w-full">
                        <tr>
                            <td valign="top" class="font-semibold pl-2">
                                Bank
                            </td>
                            <td class="text-gray-700">
                                Migros Bank AG <br>
                                8001 Zürich
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="font-semibold pl-2">
                                IBAN
                            </td>
                            <td class="text-gray-700">
                                CH65 0840 1000 0583 7151 6
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold pl-2">Name</td>
                            <td class="text-gray-700">DANCEFLOOR Kouadio & Te</td>
                        </tr>
                        <tr valign="top" class="bg-gray-50">
                            <td class="font-semibold pl-2">Address</td>
                            <td class="text-gray-700">
                                Route de Meyrin 5<br>
                                1202 Genève
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold px-2">Account Number</td>
                            <td class="text-gray-700">80-533-6</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="font-semibold pl-2">SWIFT / BIC</td>
                            <td class="text-gray-700">MIGR CH ZZ 12A</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pl-2">Commission</td>
                            <td class="text-gray-700">CHF 0.-</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-span-3 sm:col-span-1">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg px-5 pt-3 pb-8">
                    <h3 class="text-3xl font-bold text-gray-800 capitalize">Revolut</h3>
                    <p class="my-3">If you have a revolut account this is the fastest and easy way to make payments.
                    </p>
                    <b>How to configure your Revolut accound for Dancefloor payments (To Do only 1 time)</b>
                    <ol class="list-decimal ml-6">
                        <li>Go to Payments then choose Bank Transfer</li>
                        <li>Add a new recipient “company” (be careful not to choose a “individual” recipient. If you do
                            not
                            have
                            this
                            option, download the latest version of Revolut).</li>
                        <li>Enter the account information</li>
                        <li>Choose Country = UK</li>
                        <li>Choose Currency = CHF</li>
                        <li><strong>Beneficiary: </strong> DANCEFLOOR KOUADIO ET TE</li>
                        <li><strong>IBAN:</strong> GB31 REVO 0099 6955 2569 10</li>
                        <li><strong>BIC:</strong> REVOGB21</li>
                        <li><strong>Address of the beneficiary:</strong> 1202, Route de Meyrin 5, Geneva, Switzerland
                        </li>
                        <li><strong>Bank/payment institution:</strong> Revolut</li>
                        <li>And you can make the payment</li>
                    </ol>
                </div>
            </div>
            <div class="col-span-3 sm:col-span-1">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg px-5 pt-3 pb-8">
                    <h3 class="text-3xl font-bold text-gray-800 capitalize">Post office</h3>
                    <p class="mb-5">
                        If you prefer to pay at your nearest post office, you can also have the possibility do it
                    </p>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="rounded-md bg-yellow-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: solid/exclamation -->
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">
                                    Commission required
                                </h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>
                                        When using Post Office, you need to pay CHF 2.- extra
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="w-full">
                        <tr>
                            <td valign="top" class="font-semibold pl-2">
                                Bank
                            </td>
                            <td class="text-gray-700">
                                Migros Bank AG <br>
                                8001 Zürich
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="font-semibold pl-2">
                                IBAN
                            </td>
                            <td class="text-gray-700">
                                CH65 0840 1000 0583 7151 6
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold pl-2">Name</td>
                            <td class="text-gray-700">DANCEFLOOR Kouadio & Te</td>
                        </tr>
                        <tr valign="top" class="bg-gray-50">
                            <td class="font-semibold pl-2">Address</td>
                            <td class="text-gray-700">
                                Route de Meyrin 5<br>
                                1202 Genève
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold px-2">Account Number</td>
                            <td class="text-gray-700">80-533-6</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="font-semibold pl-2">SWIFT / BIC</td>
                            <td class="text-gray-700">MIGR CH ZZ 12A</td>
                        </tr>
                        <tr>
                            <td class="font-semibold pl-2">Commission</td>
                            <td class="text-gray-700">CHF 2.00.-</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="my-5">
            <a href="{{ route('dashboard') }}" class="df-btn-primary">
                Back to Dashboard
            </a>
        </div>
    </div>
</x-app-layout>