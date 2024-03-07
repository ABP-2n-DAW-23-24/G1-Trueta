<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    required: true
  },
  color: {
    type: String,
    required: true
  },
  textColor: {
    type: String,
    required: true
  }
});
</script>

<template>
  <div class="square-container">
    <div
      :style="{ backgroundColor: color, color: textColor }"
      class="square"
      :class="{
        'surgery': type === 'surgery',
        'operation': type === 'operation'
      }"
    >
      {{ name }}
    </div>
  </div>
</template>

<style>
.square {
  align-items: center;
  padding: 15px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 15px;
  text-transform: uppercase;
  text-align: center;
  font-size: 1.75em;
  word-break: break-word;
  user-select: none;
  opacity: 0.8;
  transition: 0.3s;
  min-height: 250px;
  height: 100%;
}

.square:hover {
  cursor: pointer;
  transform: scale(1.05);
  transition: 0.3s;
  opacity: 1;
  overflow: none;
  z-index: 2;
  background: radial-gradient(circle, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
}
</style>