<script setup>
import { ref,defineProps } from 'vue';

const props = defineProps(['surgeries']);

const surgeries = props.surgeries
const collapsed = ref({
  cardiaca: false,
  'urològica': false 
});

const toggleCollapse = (key) => {
  collapsed.value[key] = !collapsed.value[key];
};
</script>


<template>
    <aside class="menu">
      <ul class="menu-list">
        <li v-for="surgery in surgeries" :key="surgery.surgery_name">
          <div class="title">
            <a class="name" @click="toggleCollapse(surgery.surgery_name)">{{ surgery.surgery_name }}</a>
            <img
              src="../../assets/svg/arrow.svg"
              alt="arrow"
              class="arrow"
              @click="toggleCollapse(surgery.surgery_name)"
              :class="{ 'arrow-rotated': collapsed[surgery.surgery_name] }"
            />
          </div>
          <ul class="name-list" v-if="collapsed[surgery.surgery_name]">
            <li v-for="operation in surgery.operations" :key="operation">
              <a>{{ operation }}</a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>
  </template>

<style scoped>
.menu {
  grid-area: aside;
  background-color: #ffffff;
  padding: 15px;
  height: 100%;
  overflow-y: auto; /* Agrega un scrollbar vertical cuando el contenido excede la altura máxima */
  padding-right: 10px; /* Agrega un espacio para el scrollbar para evitar que se superponga al contenido */
}

.name {
  color: #434343;
  font-size: 16px;
}

.title {
  display: flex;
  align-items: center;
  margin: 0 !important;
}

.arrow {
  width: 20px;
  height: 20px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.arrow-rotated {
  transform: rotate(180deg);
}
</style>
