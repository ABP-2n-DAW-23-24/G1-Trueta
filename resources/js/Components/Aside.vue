<script setup>
import { ref, defineProps } from 'vue';
import axios from 'axios';



const props = defineProps({
  selectedSurgery: {
    type: Number,
    required: true
  },
  setHoveredSurgery: {
    type: Function,
    required: true
  },
  setHoveredOperation: {
    type: Function,
    required: true
  },
  collapsed: {
    type: Number,
    required: true
  },
  toggleCollapse: {
    type: Function,
    required: true
  },
  setCrumb: {
    type: Function,
    required: true
  },
  setSelectedOperation: {
    type: Function,
    required: true
  },
  selectedOperation: {
    type: Number,
    required: true
  },
  hoveredSurgery: {
    type: Number,
    required: true
  },
  hoveredOperation: {
    type: Number,
    required: true
  },
  surgeries: Array,
});


axios.get("/json/surgeriesWithOperations")
.then(response => {
  surgeries.value = response.data;
});


function handleOperationClick(operationId) {
  props.setCrumb(2);
  props.setSelectedOperation(operationId);
}



</script>
<template>
  <ul class="menu-list" style="margin-bottom: 20px;">
    <li
      v-for="surgery in props.surgeries"
      @mouseover="props.setHoveredSurgery(surgery.id)"
      @mouseleave="props.setHoveredSurgery(-1)"
      v-show="surgery.operations.length > 0"
      :class="{
        'hovered': surgery.id == props.hoveredSurgery && props.collapsed != surgery.id,
      }"
      :key="surgery.id">
      <div class="title" @click="props.toggleCollapse(surgery.id)">
        <a class="name">{{ surgery.name }}</a>
        <img
          src="../../assets/svg/arrow.svg"
          alt="arrow"
          class="arrow"
          :class="{ 'arrow-rotated': props.collapsed == surgery.id }"
        />
      </div>
      <ul v-if="props.collapsed == surgery.id" >
        <li
          v-for="operation in surgery.operations"
          :class="{
            'active': operation.id == props.selectedOperation,
            'hovered': operation.id == props.hoveredOperation
          }"
          @mouseover="props.setHoveredOperation(operation.id)"
          @mouseleave="props.setHoveredOperation(-1)"
          @click="handleOperationClick(operation.id)"
          :key="operation">
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
  text-transform: uppercase;
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


li.active a {
  background-color: #00599c;
  color: white !important;
  border-radius: 7.5px;
}


li.hovered:not(.active) a {
  background-color: #f0f0f0;
  color: #363636;
  border-radius: 7.5px;
}

/* responsive */
@media (max-width: 768px) {
  .menu-list {
    display: none;
  }
}

</style>
