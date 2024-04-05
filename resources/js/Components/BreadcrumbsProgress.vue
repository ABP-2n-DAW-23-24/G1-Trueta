<script setup>
import { defineProps } from 'vue';
import { ref, computed } from 'vue';

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
    },
    setResumes: {
        type: Function,
        required: true
    },
    resumes: {
        type: Array,
        required: true
    }
});

const goBack = () => {
    if (props.crumb === 0) return;
    props.setCrumb(props.crumb - 1);
};

const handleCrumbClick = (index) => {
    console.log(props.resumes);
    props.setResumes([]);
    console.log(props.resumes);
    if (index <= props.crumb) {
        props.setCrumb(index);

    }
};
</script>

<template>
    <div class="breadcrumbs-progress-container">
        <div class="breadcrumb-container">
            <img src="../../assets/svg/left-arrow.svg" alt="Back" @click="goBack()" class="back-button">
        </div>
        <div v-for="(breadcrumb, index) in breadcrumbs" :key="index">
            <span @click="() => { handleCrumbClick(index) }" class="breadcrumb" :class="{
                'active': index === crumb,
                'inactive': index > crumb
            }">{{ breadcrumb }}</span>
            <span v-if="index < breadcrumbs.length - 1" class="breadcrumb-separator">/</span>
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

.back-button {
    color: #0239EB;
    cursor: pointer;
    width: 100%;
}

.breadcrumb-container {
    width: 20px;
}

@media screen and (max-width: 1000px) {
    .breadcrumb:not(.active) {
        display: none;
    }

    .breadcrumb-separator {
        display: none;
    }

    .back-button {
        display: inline-block;
    }

    .breadcrumbs-progress-container {
        gap: 10px;
    }
}

@media screen and (min-width: 1000px) {
    .breadcrumb-container {
        display: none;
    }
}
</style>