<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, defineProps } from 'vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import Footer from '@/Components/Footer.vue';
import Logo from '@/Components/Logo.vue';
import WizardProfileHeader from '@/Components/WizardProfileHeader.vue';
//ola


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
    <div class="container">
        <Head title="Profile" />
        <div class="profile-header">
            <WizardProfileHeader :user="user" />
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="form-container p-4 sm:p-8 sm:rounded-lg">
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
    <Footer class="footer"/>
</template>
<style>
.container {
    background-color: white;
}

.profile-header {
    margin-bottom: 15px; 
}

.form-container {
    display: flex;
    justify-content: space-around;
}

.form {
    max-width: 400px;
}

.footer {
    margin-bottom: 0;
}

@media screen and (max-width: 768px) {
    .profile-header {
        margin-bottom: 160px; /* Espacio inferior entre el header y los formularios */
    }
    /* Estilos específicos para pantallas más pequeñas */
    .form-container {
        flex-direction: column; /* Apila los formularios en pantallas pequeñas */
        align-items: center; /* Centra los formularios en pantallas pequeñas */
    }

    .form {
        margin-bottom: 20px; /* Espacio entre los formularios en pantallas pequeñas */
    }

}

</style>

