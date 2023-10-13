{{--@props([--}}
{{--    'form' => true,--}}
{{--//    'thanks' => false,--}}
{{--])--}}
@php
$sayThankYou = data_get($_GET, 'say-thank-you', false);
@endphp
<div x-data="{ showPopup: {{ Js::from($sayThankYou) }} }"
     @if(! $sayThankYou) x-init="setTimeout(() => showPopup = true, 10000)" style="display: none" @endif
     x-effect="document.querySelector('body').style.overflow = (showPopup ? 'hidden' : 'auto');" x-show="showPopup"
     class="fixed z-[1000] top-0 inset-x-0 px-4 py-6 sm:px-0 sm:flex sm:items-top sm:justify-center w-full h-screen overflow-y-auto lg:overflow-hidden flex items-center">
    <div x-show="showPopup"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="z-50 lg:w-9/12 p-[0.75rem] lg:p-10 rounded-lg mt-30"
         style="background: url({{ asset('email-sub-images/cover.png') }}) fixed no-repeat;background-size: cover;">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="bg-gray-300/90 hidden lg:flex justify-center items-center h-20 lg:h-full overflow-hidden rounded-t-lg lg:rounded-none lg:rounded-l-lg p-8">
                @if($sayThankYou)
                    <img src="{{ asset('email-sub-images/thank-you.png') }}" alt="Thank you Image" class="" />
                @elseif(isset($form))
                    <img src="{{ asset('email-sub-images/emailler.png') }}" alt="Email Image" class="" />
                @endif
            </div>
            <div class="bg-gray-100/90 h-full rounded-lg lg:rounded-none lg:rounded-r-lg p-[0.75rem] lg:p-8 space-y-10 lg:px-10">
                <div @class(['flex items-center justify-between', 'pb-5' => isset($form)])>
                    <img src="{{ asset('email-sub-images/logo.png') }}" alt="Logo" class="" />
                    <button class="border-0 p-0 bg-transparent" type="button" @click="showPopup = ! showPopup">
                        <img src="{{ asset('email-sub-images/close-square.png') }}" alt="close-square" class="" />
                    </button>
                </div>
                <div class="">
                    @if($sayThankYou)
                        <div class="py-16">
                            <div class="text-center py-16 space-y-6">
                                <h1 class="text-indigo-700 text-2xl font-black text-center leading-8 tracking-wider">Welcome Onboard</h1>
                                <p class="text-xs text-gray-500 text-center lg:px-2">
                                    We're thrilled to have you on board and can't wait to share exciting updates, exclusive offers, and valuable insights straight to your inbox.
                                </p>
                                <p class="text-xs text-gray-500 text-center lg:px-2">
                                    If you ever have any questions, feedback, or suggestions, please don't hesitate to reach out to our dedicated support team. We're here to ensure your newsletter experience is seamless and enjoyable.
                                </p>
                            </div>
                        </div>
                    @elseif(isset($form))
                        <div class="space-y-2 pb-3">
                            <h1 class="text-indigo-700 text-2xl font-black text-center leading-8">Peer-peer Cross-border Transfers</h1>
                            <p class="text-xs text-gray-500 text-center lg:px-2">
                                Join the increasingly interconnected world of peer-to-peer cross-border transactions as a disruptive force in the realm of finance.
                            </p>
                        </div>
                        <div class="text-xs text-gray-500 text-center lg:px-2">
                            Be the first to know whatever is always coming next, get access to the sneak peeks and more of the cool stuff we do.
                        </div>
                        <form x-data="submitData()" x-init="form.thanks = '{{ request()->fullUrlWithQuery(['say-thank-you' => 'true']) }}'"
                              @submit.prevent="submit" class="space-y-8">
                            <input type="hidden" name="_token" x-ref="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="callULockR" x-ref="callULockR" value="{{ route('sub.email') }}">
                            <div class="">
                                <label for="first_name" class="block mb-2 text-sm font-bold text-indigo-700">Full Name</label>
                                <input type="text" id="first_name" x-model="form.name"
                                       class="block w-full text-xs md:text-sm text-black placeholder-gray-400 rounded-md px-4 py-2 md:py-3 transition ease-in-out duration-150
                                    shadow-sm border focus:ring-1 focus:outline-none border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Input your first and last name">
                                <template x-if="error.name">
                                    <p>
                                        <span class="text-red-500 text-xs" x-text="error.name"></span>
                                    </p>
                                </template>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-bold text-indigo-700">Email Address</label>
                                <input type="text" id="email" x-model="form.email"
                                       class="block w-full text-xs md:text-sm text-black placeholder-gray-400 rounded-md px-4 py-2 md:py-3 transition ease-in-out duration-150
                                    shadow-sm border focus:ring-1 focus:outline-none border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Input your email address">
                                <template x-if="error.email">
                                    <p>
                                        <span class="text-red-500 text-xs" x-text="error.email"></span>
                                    </p>
                                </template>
                            </div>
                            <div class="">
                                <button x-show="!loading" type="submit"
                                        class="block w-full text-center focus:outline-none text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300
                                     font-medium rounded-lg text-sm px-5 py-3 transition ease-in-out duration-150">
                                    Subscribe
                                </button>
                                <template x-if="loading" style="display: none;">
                                    <div class="text-indigo-500 flex items-center justify-center bg-gray-300 font-medium rounded-lg px-5 py-3
                                     transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 animate-spin mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle style="opacity: .25;" class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path style="opacity: .75;" class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="text-indigo-500 text-xs">please wait...</span>
                                    </div>
                                </template>
                            </div>
                            <p class="text-xs text-gray-500 text-center lg:px-2">
                                By signing up, I agree with the
                                <a href="javascript:" class="text-indigo-700 font-medium underline text-xs">privacy and data protection policy</a>
                                of KillPay.
                            </p>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div x-show="showPopup" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-gray-200/50"></div>
</div>
