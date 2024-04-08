<script setup>
import axios from "axios";
import { ref, defineEmits } from 'vue';
import Button from '@/Components/Button.vue';
import Boto from '@/Components/Button.vue';
import ModalOnSteroids from "@/Components/ModalOnSteroids.vue";


let props = defineProps({
  show: Boolean,
  traduccion: Object
});

const name = ref("");
const surnames = ref("");
const email = ref("");
const pass = ref("");
const isAdmin = ref("0");
const isManager = ref("0");
const message = ref();
const emit = defineEmits(['EndAdd']);
const isModalAddUserOpen = ref(false);

function setIsModalAddUserOpen(value) {
  isModalAddUserOpen.value = value;
  document.body.parentElement.style.overflow = value ? 'hidden' : 'auto';
}

function btn_add_user() {

  axios.post("adduser", {
    name: name.value,
    surnames: surnames.value,
    pass: pass.value,
    email: email.value,
    isAdmin: isAdmin.value,
    isManager: isManager.value
  }
  )
    .then(response => {
      setIsModalAddUserOpen(false);
      emit('getUser');
      name = ref("");
      surnames = ref("");
      email = ref("");
      pass = ref("");
      isAdmin = ref("0");
      isManager = ref("0");

    }).catch(error => {
      console.log(error);
    });
}

</script>

<template>
  <div class="bg-users-add-btn">
    <Button text="+ Afegir Usuaris" @click="setIsModalAddUserOpen(true)" class="add-btn-users" />
  </div>

  <ModalOnSteroids :show="isModalAddUserOpen" :set="setIsModalAddUserOpen" :title="`Afegir nou usuari`">
    <template v-slot:body>
      <div class="container-modal-edit">
        <div class="center_flex_modal">
          <input type="text" class="input-model" :placeholder="props.traduccion['name']" :value="name" v-model="name">
          <div v-if="message">
            <p v-if="message.name" class="text_error" v-for=" (item) in message.name">
              {{ item }}
            </p>
          </div>

          <input type="text" class="input-model" :placeholder="props.traduccion['surnames']" :value="surnames"
            v-model="surnames">
        </div>
        <div class="correo_back center_flex">
          <input type="email" style="width: 100%;" :placeholder="props.traduccion['email']" :value="email"
            v-model="email">
          <div v-if="message">
            <p v-if="message.email" class="text_error" v-for=" (item, index) in message.email">
              {{ item }}
            </p>
          </div>
        </div>
        <div class="correo_back center_flex">
          <input type="password" style="width: 100%;" :placeholder="props.traduccion['pass']" v-model="pass">
          <div v-if="message">
            <p v-if="message.pass" class="text_error" v-for=" (item) in message.pass">
              {{ item }}
            </p>
          </div>
        </div>
        <div class="rols">
          <div class="checkbox-wrapper-46">
            <input type="checkbox" id="cbx-46-admin" class="inp-cbx" v-model="isAdmin">
            <label for="cbx-46-admin" class="cbx">
              <span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
              </span>
              <span>{{ props.traduccion['Admin'] }}</span>
            </label>
          </div>
          <div class="checkbox-wrapper-46">
            <input type="checkbox" id="cbx-46-manager" class="inp-cbx" v-model="isManager">
            <label for="cbx-46-manager" class="cbx">
              <span>
                <svg viewBox="0 0 12 10" height="10px" width="12px">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
              </span>
              <span>{{ props.traduccion['Manager'] }}</span>
            </label>
          </div>
        </div>

        <div class="center_flex button-edit-user">
          <Boto :text="props.traduccion['add']" @click="btn_add_user" class="button-editar-user" />
        </div>
      </div>
    </template>
  </ModalOnSteroids>
</template>

<style>
.rols {
  margin-top: 20px;
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.correo_back {
  display: flex;
  flex-direction: column;
  align-content: center;
  align-items: center;
  width: 100%;
  margin-top: 20px;
}

.correo_back input {
  border-radius: 10px;
  width: 100%;
}

.center_flex_modal {
  width: 100%;
  display: grid;
  gap: 15px;
}

.center_flex {
  display: flex;
  flex-direction: row;
  justify-content: center;
}

.btn_add {
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
  border: none;
  background-color: transparent;
  cursor: pointer;
  padding: 5px 10px;
  outline: none;
  border-radius: 10px !important;
  background-color: black;
  color: white;
  height: 50px;
  width: 175px;
}

.btn_add svg {
  fill: currentColor;
  width: 16px;
  height: auto;
  margin-right: 8px;
}

.header-model-users {
  font-weight: 600;
}

.box-modal-inputs {
  padding: 30px;

}

.input-model {
  border-radius: 10px;
  width: 100%;
}

.checkbox-wrapper-46 input[type="checkbox"] {
  display: none;
  visibility: hidden;
}

.checkbox-wrapper-46 .cbx {
  margin: auto;
  -webkit-user-select: none;
  user-select: none;
  cursor: pointer;
}

.checkbox-wrapper-46 .cbx span {
  display: inline-block;
  vertical-align: middle;
  transform: translate3d(0, 0, 0);
}

.checkbox-wrapper-46 .cbx span:first-child {
  position: relative;
  width: 18px;
  height: 18px;
  border-radius: 3px;
  transform: scale(1);
  vertical-align: middle;
  border: 1px solid #9098a9;
  transition: all 0.2s ease;
}

.checkbox-wrapper-46 .cbx span:first-child svg {
  position: absolute;
  top: 3px;
  left: 2px;
  fill: none;
  stroke: #ffffff;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 16px;
  stroke-dashoffset: 16px;
  transition: all 0.3s ease;
  transition-delay: 0.1s;
  transform: translate3d(0, 0, 0);
}

.checkbox-wrapper-46 .cbx span:first-child:before {
  content: "";
  width: 100%;
  height: 100%;
  background: #506eec;
  display: block;
  transform: scale(0);
  opacity: 1;
  border-radius: 50%;
}

.checkbox-wrapper-46 .cbx span:last-child {
  padding-left: 8px;
}

.checkbox-wrapper-46 .cbx:hover span:first-child {
  border-color: #506eec;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child {
  background: #506eec;
  border-color: #506eec;
  animation: wave-46 0.4s ease;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child svg {
  stroke-dashoffset: 0;
}

.checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child:before {
  transform: scale(3.5);
  opacity: 0;
  transition: all 0.6s ease;
}

@keyframes wave-46 {
  50% {
    transform: scale(0.9);
  }
}

.btn_add_user {
  background: #506eec;
  border-radius: 10px;
  color: white;
  margin-bottom: 10px;
}

.add-btn-users {
  height: 50px !important;
  width: 175px !important;
}

.bg-users-add-btn {
  display: flex;
  width: 175px;
  height: 50px;
}
</style>