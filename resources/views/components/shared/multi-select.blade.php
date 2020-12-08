<!-- This is an example component -->
<div>
    <x-slot name="head">
        <style>
            [x-cloak] {
                display: none;
                border: 1px solid red;
            }
        </style>
    </x-slot>

    <select x-cloak id="select">
        @foreach (\App\Models\Style::all() as $style)
        <option value="{{ $style->id }}">{{ $style->name }}</option>
        @endforeach
    </select>

    <div x-data="dropdown()" x-init="loadOptions()" class="w-full md:w-1/2 flex flex-col items-center h-64 mx-auto">
        <input name="styles[]" type="text" x-bind:value="selectedValues()" wire:model="styles">
        <div class="inline-block relative w-full">
            <div class="flex flex-col items-center relative">
                <div x-on:click="open" class="w-full">
                    <div
                        class="appearance-none w-full border text-gray-700 px-1 bg-white rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 border-gray-200 flex rounded svelte-1l8159u">
                        <div class="flex flex-auto flex-wrap">
                            <template x-for="(option,index) in selected" :key="options[option].value">
                                <div
                                    class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-red-700 bg-red-100 border border-red-300 ">
                                    <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                        options[option]" x-text="options[option].text"></div>
                                    <div
                                        class="flex flex-auto flex-row-reverse ml-2 cursor-pointer outline-none focus:outline-none">
                                        <div x-on:click="remove(index,option)">
                                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <div x-show="selected.length == 0" class="flex-1">
                                <input placeholder="Select a option"
                                    class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                    x-bind:value="selectedValues()">
                            </div>
                        </div>

                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 flex items-center border-gray-200">
                            <button type="button" x-show="isOpen() === true" x-on:click="open"
                                class="cursor-pointer w-3 h-3 text-gray-500 outline-none focus:outline-none">
                                @include('icons.arrow-down')
                            </button>
                            <button type="button" x-show="isOpen() === false" @click="close"
                                class="cursor-pointer w-3 h-3 text-gray-500 outline-none focus:outline-none">
                                @include('icons.arrow-up')
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <div x-show.transition.origin.top="isOpen()"
                        class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj"
                        x-on:click.away="close">
                        <div class="flex flex-col w-full">
                            <template x-for="(option,index) in options" :key="option">
                                <div>
                                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                        @click="select(index,$event)">
                                        <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                            <div class="w-full items-center flex">
                                                <div class="mx-2 leading-6" x-model="option" x-text="option.text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function dropdown() {
              return {
                  options: [],
                  selected: [],
                  show: false,
                  open() { this.show = true },
                  close() { this.show = false },
                  isOpen() { return this.show === true },
                  select(index, event) {

                      if (!this.options[index].selected) {

                          this.options[index].selected = true;
                          this.options[index].element = event.target;
                          this.selected.push(index);

                      } else {
                          this.selected.splice(this.selected.lastIndexOf(index), 1);
                          this.options[index].selected = false
                      }
                  },
                  remove(index, option) {
                      this.options[option].selected = false;
                      this.selected.splice(index, 1);


                  },
                  loadOptions() {
                      const options = document.getElementById('select').options;
                      for (let i = 0; i < options.length; i++) {
                          this.options.push({
                              value: options[i].value,
                              text: options[i].innerText,
                              selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                          });
                      }


                  },
                  selectedValues(){
                      return this.selected.map((option)=>{
                          return this.options[option].value;
                      })
                  }
              }
          }
        </script>
    </div>