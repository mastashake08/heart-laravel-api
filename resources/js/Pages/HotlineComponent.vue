<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome To HEART
            </h2>
        </template>

        <div class="font-sans text-gray-900 antialiased">
            <div class="pt-4 bg-gray-100">
                <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                    <div>
                        <jet-authentication-card-logo />
                    </div>

                    <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                      <p>The HEART Hotline is designed to help connect those in need in real time. Call or SMS (502) 677-3370 24/7 to be connected with a HEART Specialist.</p>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'

export default {
    props: ['terms'],

    components: {
        JetAuthenticationCardLogo,
    },
}
</script>
