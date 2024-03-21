<script setup>
import { ref } from 'vue';
import Logo from '@/Components/Logo.vue';
import WizardProfileHeader from '@/Components/WizardProfileHeader.vue';
import NavLink from '@/Components/NavLink.vue';

let props=defineProps({
    user: Object
});
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                                <div style="width: 15%;">
                                <Logo
                                />
                                </div>

                                <a href="index">Pagina d'inici</a>
                                <WizardProfileHeader 
                                :user="user"
                                />
                    </div>
                </div>
            </nav>
            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
