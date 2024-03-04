<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  type: {
    type: Boolean,
    required: true
  }
});

function stringToColor(string = '') {
  let hash = 0;
  for (let i = 0; i < string.length; i++) {
    hash = string.charCodeAt(i) + ((hash << 12) - hash);
  }

  // Adjust these values to control brightness and saturation
  const brightness = 35;
  const saturation = 100;

  let color = 'hsl(';
  color += hash % 360 + ','; // Use hash value to determine hue (0 to 359)
  color += saturation + '%,'; // Set a constant saturation
  color += brightness + '%)'; // Set a constant brightness

  return color;
}


</script>

<template>
  <div
  :style="{ backgroundColor: stringToColor(name) }"
  class="square" :class="{
    'surgery': type === 'surgery',
    'operation': type === 'operation'
  }">
    {{ name }}
  </div>
</template>

<style>

.square {
  padding: 15px;
  aspect-ratio: 1;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 15px;
  text-transform: uppercase;
  text-align: center;
  color: white;
  font-size: 1.75em;
  word-break: break-word;
  user-select: none;
  opacity: 0.8;
  transition: 0.3s;

}

.square:hover {
  cursor: pointer;
  transform: scale(1.05);
  transition: 0.3s;
  opacity: 1;
  overflow: none;
  height: auto;
  z-index: 2;

  /* radial gradient background */
  background: radial-gradient(circle, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%);

}

.surgery {
  background: #1131d4;
}
</style>