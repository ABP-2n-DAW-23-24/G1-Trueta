  <script setup>
  import Users from "@/Components/Users.vue";
  import ModalUsers from '../ModalUsers.vue';

  import { ref,defineProps,watch  } from 'vue';

  const isModalOpen = ref(false);
  let props = defineProps({
    users:Object,
    traduccion:Object
  })
  const handleClose = () => {
    isModalOpen.value = false;
  };
  let users_=ref(props.users)
  function getUsers(){
      axios.post("getUsers")
      .then(response=>{
          users_.value=response.data.user
          console.log(response)
      })
  }
  const name = ref(''); 
const doSomething = (value) => {
  axios.post("searchUser",{
    name:name.value,
  })
      .then(response=>{
        users_.value=response.data
       
        console.log(response)
      }) 
};

watch(name, (newValue) => {
  doSomething(newValue);
});

  </script>
  <template>
  <div class="bg-users">

    <!-- El componente Modal -->
  <UserDropdown :show="isModalOpen"></UserDropdown>
      <div style="
      margin-bottom: 25px;    display: flex;
      flex-direction: row;
      justify-content: space-between;">
      <h2 class="title-admin" style="font-size: 30px;">Llistat d’usuaris</h2>

      <search class="search">
      <button title="Search" type="submit">
          <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search" title="Search">
              <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
      </button>
      <input class="input" placeholder="Buscar usuaris..." required="" type="text" v-model="name" title="Search">
      <button class="reset" type="reset" title="Reset">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
      </button>
        </search>


    <ModalUsers class="modal-users-button" @getUser="getUsers" :traduccion="traduccion"></ModalUsers>
      </div>    
      <Users @getUser="getUsers" :users="users_" :traduccion="traduccion"></Users>
      <p v-if="users_.length==0">Usuari no trobat</p>

  </div>

  </template>

  <style>
  .btn_add_user{
      padding: 10px 20px 10px 20px;
  }
  .bg-users{
      background-color: #e8e8e8ad;
      width: 100%;
      padding: 30px;
      border-radius: 10px;
  }
  .correo_back{
      margin-top  : 20px;
  }
  .center_flex_modal{
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
  }
  .center_flex{
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
    padding: 8px 12px;
    outline: none; 
  border-radius: 5px;
    background-color: #296fa8;
    color: white;
  }

  .btn_add:hover {
    background-color: #1e4f7f;
  }

  .btn_add svg {
    fill: currentColor; 
    width: 12px;
    height: auto;
    margin-right: 8px;
  }

.search button {
  border: none;
  background: none;
  color: #8b8ba7;
}
.search {
  --timing: 0.3s;
  --width-of-input: 200px;
  --height-of-input: 40px;
  --border-height: 2px;
  --input-bg: #fff;
  --border-color: #2f2ee9;
  --border-radius: 30px;
  --after-border-radius: 1px;
  position: relative;
  width: 500px;
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#fff);
}

.input {
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
}

.search:before {
  content: "";
  position: absolute;
  background: var(--border-color);
  transform: scaleX(0);
  transform-origin: center;
  width: 100%;
  height: var(--border-height);
  left: 0;
  bottom: 0;
  border-radius: 1px;
  transition: transform var(--timing) ease;
}

.search:focus-within {
  border-radius: var(--after-border-radius);
}

input:focus {
  outline: none;
}

.search:focus-within:before {
  transform: scale(1);
}

.reset {
  border: none;
  background: none;
  opacity: 0;
  visibility: hidden;
}

input:not(:placeholder-shown) ~ .reset {
  opacity: 1;
  visibility: visible;
}

.search svg {
  width: 17px;
  margin-top: 3px;
}

.title-admin{
  font-size: 30px;
  font-weight: bold;
}
  </style>