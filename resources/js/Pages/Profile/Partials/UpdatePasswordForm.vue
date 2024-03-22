<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Button from '@/Components/Button.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

let props=defineProps({
    traductions:Object
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section class="profile-section">
        <header class="profile-header">
            <h2 class="profile-title">{{ props.traductions.password_information }}</h2>
            <p class="profile-description">
                {{ props.traductions.password_update_information }}
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="password-form">
            <div class="form-group">
                <label for="current_password" class="label">{{ props.traductions.current_password }}</label>
                <input
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="input"
                    autocomplete="current-password"
                />
                <span class="error">{{ form.errors.current_password }}</span>
            </div>

            <div class="form-group">
                <label for="password" class="label">{{ props.traductions.new_password }}</label>
                <input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="input"
                    autocomplete="new-password"
                />
                <span class="error">{{ form.errors.password }}</span>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="label">{{ props.traductions.confirm_password }}</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="input"
                    autocomplete="new-password"
                />
                <span class="error">{{ form.errors.password_confirmation }}</span>
            </div>

            <div class="button-group">
                <!-- <button :disabled="form.processing" class="button">{{ props.traductions.save }}</button> -->
                <Button :disabled="form.processing" class="button" :text="props.traductions.save" />
                <p v-if="form.recentlySuccessful" class="success-message">Guardado.</p>
            </div>
        </form>
    </section>
</template>

<style scoped>


.profile-header {
  margin-bottom: 1rem;
}

.profile-title {
  font-size: 1.25rem;
  font-weight: bold;
  color: #333;
}

.profile-description {
  font-size: 0.875rem;
  color: #666;
}

.password-form {
  margin-top: 1rem;
}

.form-group {
  margin-bottom: 1rem;
}

.label {
  display: block;
  font-weight: bold;
}

.input {
  display: block;
  width: 100%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.error {
  color: red;
}

.button-group {
  display: flex;
  align-items: center;
  justify-content: flex-end;

}

.button {
  width: 100px;
}

.success-message {
  font-size: 0.875rem;
  color: #4caf50;
}

@media screen and (max-width: 600px) {

.button-group{
  justify-content: center;
}


}
</style>
