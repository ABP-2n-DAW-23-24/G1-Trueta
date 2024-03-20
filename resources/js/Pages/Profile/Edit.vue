<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, defineProps } from 'vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import WizardProfileHeader from '@/Components/WizardProfileHeader.vue';



import { Head } from '@inertiajs/vue3';

let props=defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    language:Object,
    traduction:Object,
    user: Object

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
</script>

<template style="background-color: white;"
>
    <Head title="Profile" />
            <WizardProfileHeader 
                :user="user"
                />
        <div class="py-12 mt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 sm:rounded-lg"  style="display: flex;
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
    <Footer />
</template>
