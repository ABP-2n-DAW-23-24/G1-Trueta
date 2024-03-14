<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, defineProps } from 'vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
let form = useForm({
    idiomSelect: "",
});

const submit = () => {
console.log(form.idiomSelect)
 form.post(route('idiom_save'));
};
let props=defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    language:Object,
    
});
let idiomDefault=ref("");

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"  style="    display: flex;
    justify-content: space-around;">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                    <div>
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                </div>

               

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex" style="display: flex;
    flex-direction: row;
    justify-content: space-between;
    justify-content: space-around;">
                    <div>
                        Idioma
                        <div >
                            <p>Idoma seleccionado: {{idiomDefault}}
                        </p>
                        </div>
                        <form @submit.prevent="submit" class="flex flex-col" style="    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">
                            <select v-model="form.idiomSelect">
                                <option value="ca" >Catalan</option>
                                <option value="es">Castellano</option>
                                <option value="en">Ingles</option>
                            </select>
                            <button type="sumbit"
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-50"
    >
    Save
    </button>                  
                                  </form>
                    </div>
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
