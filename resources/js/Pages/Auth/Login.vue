<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="login">

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="main">
            <div class="image-container">
                <img src="../../../assets/img/doctor.jpeg" alt="Doctor">
                <img src="../../../assets/img/logoTrueta.png" alt="Hospital Josep Trueta">
            </div>

            <form @submit.prevent="submit" class="form">
                <div class="flex-column">
                    <label>Correu electrònic</label>
                </div>

                <div class="inputForm">
                    <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <g id="Layer_3" data-name="Layer 3">
                            <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                        </g>
                    </svg>
                    <input
                        autofocus
                        title="Correu Electrònic"
                        type="text"
                        class="input" 
                        v-model="form.email"
                        required
                        placeholder="El teu correu electrònic"
                    >
                </div>
                <InputError class="mt-2" :message="form.errors.email" />
        
                <div class="flex-column">
                    <label>Contrasenya</label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                        <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                    </svg>        
                    <input
                        title="Contrasenya"
                        type="password" 
                        class="input"
                        v-model="form.password"
                        required
                        placeholder="La teva contrasenya"
                    >
                </div>
                <InputError class="mt-2" :message="form.errors.password" />

                <button class="button-submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Iniciar Sessió</button>
            </form>
        </div>
    </div>
</template>

<style>
.login {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.main {
    display: flex;
    margin: 0;
    border-radius: 15px;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
}

.image-container {
    position: relative;
    max-width: 500px;
    width: 100%;
    overflow: hidden;
}

.image-container img {
    height: 100%;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    pointer-events: none;
}

.image-container img:first-child {
    filter: blur(2.5px);
    opacity: 0.6;
}

.image-container img:last-child {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-height: 80px;
    filter: drop-shadow(0 0 2px white);
}


.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    background-color: #ffffff;
    padding: 30px;
    max-width: 400px;
    width: 100%;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

::placeholder {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form button {
    align-self: flex-end;
}

.flex-column > label {
    color: #151717;
    font-weight: 600;
}

.inputForm {
    border: 1.5px solid #ecedec;
    border-radius: 10px;
    height: 50px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    transition: 0.2s ease-in-out;
}

.input {
    border-radius: 10px;
    border: none !important;
    width: 85%;
    height: 100%;
}

[type='checkbox']:focus,
.input:focus:focus {
    --tw-ring-color: none !important;
    --tw-ring-offset-shadow: none !important;
    --tw-ring-shadow: none !important;
    border-color: none;
}

.inputForm:focus-within {
    border: 1.5px solid #00599c;
}

.flex-row {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    justify-content: space-between;
}

.flex-row > div > label {
    font-size: 14px;
    color: black;
    font-weight: 400;
}

.span {
    font-size: 14px;
    margin-left: 5px;
    color: #e87d0d;
    font-weight: 500;
    cursor: pointer;
}

.button-submit {
    margin: 20px 0 10px 0;
    background-color: #b85e00;
    filter: brightness(125%);
    border: none;
    color: white;
    font-size: 15px;
    font-weight: 500;
    border-radius: 10px;
    height: 50px;
    width: 100%;
    cursor: pointer;
}

.button-submit:hover {
    transition: all 0.3s ease-in-out;
    background-color: #ab5900;
}

.p {
    text-align: center;
    color: black;
    font-size: 14px;
    margin: 5px 0;
}

.btn {
    margin-top: 10px;
    width: 100%;
    height: 50px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    gap: 10px;
    border: 1px solid #ededef;
    background-color: white;
    cursor: pointer;
    transition: 0.2s ease-in-out;
}

.btn:hover {
    border: 1px solid #00599c;
}


/* RESPONSIVE */
@media (max-width: 768px) {
    .main {
        flex-direction: column;
        border-radius: 0 0 0 0;
        box-shadow: 1px solid #4648481e;
        max-width: 350px;
    }

    .image-container {
        border-radius: 0 0 0 0;
        box-shadow: 1px solid #151717;
    }

    .image-container img:first-child {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form {
        border-radius: 0 0 0 0;
    }
}
</style>
