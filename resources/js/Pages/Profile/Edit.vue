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

<template>
    <div class="container-profile">
        <Head title="Profile" />
         <div class="profile-header">
            <WizardProfileHeader :user="user" :traductions="traductions" /> 
        </div> 

        <div class="">
            <div class="">
                <div class="form-container ">
                    <div class="form">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            :traductions="traductions"
                        />
                    </div>
                    <div class="form">
                        <UpdatePasswordForm :traductions="traductions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer class="footer" />
</template>
<style>
.container-profile {
   padding: 30px;
}

.form-container {
    display: flex;
    justify-content: space-evenly;
    padding: 30px;
}

.form {
    max-width: 400px;
}

.footer{
    padding: 0 !important;
}


@media screen and (max-width: 768px) {
   .form-container{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
   }
}

@media screen and (max-width: 600px){
    .form-container{
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        margin-top: 40px;
    }
}

</style>

