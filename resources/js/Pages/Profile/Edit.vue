<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, defineProps } from 'vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import LanguageSelect from './Partials/LanguageSelect.vue';

import { Head } from '@inertiajs/vue3';

let props=defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    language:Object,
    traduction:Object
});
let idiomDefault=ref("");

let traductions=JSON.parse(props.traduction);

switch(props.language){
    case 'ca':
        idiomDefault.value='Catala'
    break;
    case 'es':
        idiomDefault.value='Español'
    break;
    case 'en':
        idiomDefault.value='Angles'
    break;
}
console.log(idiomDefault.value)
console.log(props.language)
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ traductions.profile }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"  style="    display: flex;
                    justify-content: space-around;">

                    <div>
                        <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        :traductions="traductions"
                        class="max-w-xl"
                    />
                    </div>
                    <div>
                    <UpdatePasswordForm class="max-w-xl"
                    :traductions="traductions"
                    />
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
