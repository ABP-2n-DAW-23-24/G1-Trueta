<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        placheholder: {
            type: String,
            required: false,
        },
    });
</script>

<template>
    <div contenteditable="true" :placeholder="props.placeholder">
        <slot />
    </div>
</template>


<style scoped>
[contenteditable] {
    padding: 0.5rem 0.75rem;
    background: #fff;
    border-radius: 5px;
    min-height: 100px;
    max-height: 200px;
    overflow-y: auto;
}

[contenteditable]:empty::before {
    content: attr(placeholder);
    color: #6b7280;
    pointer-events: none;
}

[contenteditable]:focus {
  border-color: inherit;
  box-shadow: none;
}

</style>