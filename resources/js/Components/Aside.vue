<script setup>
import { ref, defineProps } from 'vue';
import axios from 'axios';

const surgeries = ref(null);


const props = defineProps({
  setCrumb: {
    type: Function,
    required: true
  },
  setSelectedSurgery: {
    type: Function,
    required: true
  },
  selectedSurgery: {
    type: Number,
    required: true
  },
});


axios.get("/json/surgeriesWithOperations")
.then(response => {
  surgeries.value = response.data;
});

const collapsed = ref(null);



const toggleCollapse = (id) => {
  if (collapsed.value == id) {
    collapsed.value = null;
    props.setCrumb(0);
    return;
  }
  
  props.setSelectedSurgery(id - 1);
  collapsed.value = id;
  props.setCrumb(1);
};

</script>
<template>
  <ul class="menu-list" style="margin-bottom: 20px;">
    <li v-for="surgery in surgeries" :key="surgery.id">
      <div class="title" @click="toggleCollapse(surgery.id)">
        <a class="name">{{ surgery.name }}</a>
        <img
          src="../../assets/svg/arrow.svg"
          alt="arrow"
          class="arrow"
          :class="{ 'arrow-rotated': collapsed == surgery.id }"
        />
      </div>
      <ul class="name-list" v-if="collapsed == surgery.id" >
        <li v-for="operation in surgery.operations" :key="operation">
          <a>{{ operation.name }}</a>
        </li>
      </ul>
    </li>
  </ul>
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

.title a {
  width: 100%;
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
