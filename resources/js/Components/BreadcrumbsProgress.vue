<script setup>
    import { defineProps, ref } from 'vue';

    const props = defineProps({
        breadcrumbs: {
            type: Array,
            required: true
        },
        crumb: {
            type: Number,
            required: true
        },
        setCrumb: {
            type: Function,
            required: true
        }
    })
</script>

<template>
    <div class="breadcrumbs-progress-container">
        <div
            v-for="(breadcrumb, index) in breadcrumbs"
            :key="index">
            <span
                @click="() => { index <= crumb ? setCrumb(index) : null }"
                class="breadcrumb"
                :class="{
                    'active': index === crumb,
                    'inactive': index > crumb
                }"
            >{{ breadcrumb }}</span>
            <span
                class="breadcrumb-separator"
                v-if="index < breadcrumbs.length - 1"
            >/</span>
        </div> 
    </div>
</template>

<style scoped>
    .breadcrumbs-progress-container {
        background: #D9D9D9;
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 0 20px;
    }

    .breadcrumb.active {
        color: #c00000;
    }

    .breadcrumb:not(.active) {
        color: #0239EB;
    }

    .breadcrumb.inactive {
        opacity: 0.5;
    }

    .breadcrumb {
        height: 100%;
    }

    .breadcrumb:not(.inactive):hover {
        cursor: pointer;
        text-decoration: underline;
    }

    .breadcrumb-separator {
        margin: 0 5px;
    }
</style>