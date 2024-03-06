<script setup>
    import { defineProps } from 'vue';
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
        <div class="is-flex separated_menu_admin" >
            <a>USUARIOS</a>
            <p> | </p>
            <a>MEDICAMENTS</a>
        </div> 
    </div>
</template>

<style scoped>
.separated_menu_admin p{
    padding-left: 5px;
    padding-right: 5px;

}
    .breadcrumbs-progress-container {
        background: #D9D9D9;
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 0 20px;
    }

    .breadcrumb.active {
        color: #F55000;
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