<script setup>
import { ref, defineProps } from 'vue';
import axios from 'axios';

const surgeries = ref(null);

axios.get("/json/surgeriesWithOperations")
.then(response => {
  surgeries.value = response.data;
});

const collapsed = ref({});

const toggleCollapse = (key) => {
  collapsed.value[key] = !collapsed.value[key];
};
</script>

<template>
  <aside class="menu">
    <ul class="menu-list" style="margin-bottom: 20px;">
      <li v-for="surgery in surgeries" :key="surgery.id">
        <div class="title">
          <a class="name" @click="toggleCollapse(surgery.id)">{{ surgery.name }}</a>
          <img
              src="../../assets/svg/arrow.svg"
              alt="arrow"
              class="arrow"
              @click="toggleCollapse(surgery.id)"
              :class="{ 'arrow-rotated': collapsed[surgery.id] }"
          />
        </div>
        <ul class="name-list" v-if="collapsed[surgery.id]" >
          <li v-for="operation in surgery.operations" :key="operation">
            <a>{{ operation.name }}</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</template>
<style scoped>
.menu {
  background-color: #ffffff;
  height: 100%;
  overflow-y: auto;
}

.name {
  color: #434343;
  font-size: 16px;
  width: fit-content;
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
