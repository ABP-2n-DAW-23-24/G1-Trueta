<script setup>
import { usePage } from '@inertiajs/vue3';

let props=defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    traductions:Object
});

const user = usePage().props.auth.user;

</script>

<template>
    <section class="profile-section">
        <header class="profile-header">
            <h2 class="profile-title">{{ props.traductions.profile_information }}</h2>
            <p class="profile-description">
                {{ props.traductions.profile_update_information }}
            </p>
        </header>
        <div class="profile-info">
            <div>
                <p class="info-label">{{ props.traductions.name }}:</p>
                <p class="info-value">{{ user.name }}</p>
            </div>
            <div>
                <p class="info-label">{{ props.traductions.surname }}:</p>
                <p class="info-value">{{ user.surnames }}</p>
            </div>
            <div>
                <p class="info-label">{{ props.traductions.email }}:</p>
                <p class="info-value">{{ user.email }}</p>
            </div>
        </div>
    </section>
</template>
<style scoped>
.profile-section {
  padding: 1rem;
}

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

.profile-info {
  margin-top: 1rem;
}

.info-label {
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.info-value {
  margin-bottom: 1rem;
}
</style>
