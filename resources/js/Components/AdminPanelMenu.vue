<script setup>
    import { ref, defineProps, watch,defineEmits } from 'vue';
    import Users from "@/Components/Users.vue";
  import ModalUsers from './ModalUsers.vue';

  const emit = defineEmits(['searchedUser'])

  const isModalOpen = ref(false);
  let props = defineProps({
    users:Object,
    traduccion:Object,
    user_:Object
  })
  const handleClose = () => {
    isModalOpen.value = false;
  };
  let users_=ref(props.users)
  function getUsers(){
      axios.post("getUsers")
      .then(response=>{
          users_.value=response.data.user
      })
  }
  const name = ref(''); 
  const doSomething = (value) => { // Agrega 'emit' como un parámetro
  axios.post("searchUser", {
    name: name.value,
  })
  .then(response => {

    emit('searchedUser',response.data); // Emitir el evento 'searchedUser' con los datos de la respuesta
  })
  .catch(error => {
    console.error(error);
  });
};

watch(name, (newValue) => {
  doSomething(newValue);
});

</script>

<template>
    <div class="breadcrumbs-progress-container">
            <div class="search">
      <button title="Search" type="submit">
          <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search" title="Search">
              <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
      </button>
      <input class="input" placeholder="Buscar usuaris..." required="" type="text" v-model="name" title="Search">
   
    </div>
        </div> 
</template>

<style scoped>
.separated_menu_admin p{
    padding-left: 5px;
    padding-right: 5px;

}
    .breadcrumbs-progress-container {
        background: #ffffff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.1); */
        border: 1px solid #d4d4d4;
    }

    .breadcrumb.active {
        color: #F55000;
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

    
.search button {
  border: none;
  background: none;
  color: #2c2c2c;
}
.search {
  --timing: 0.3s;
  --width-of-input: 100%;
  --height-of-input: 35px;
  --border-height: 2px;
  --input-bg: #ffffff;
  --border-color: #8b8ba7;
  --border-radius: 10px;
  --after-border-radius: 1px;
  position: relative;
  width: 98%;
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#D9D9D9);
  color: black !important;
  box-shadow: none;

}

.input {
  font-size: 0.9rem;
  background-color: transparent;
  border-radius: 10px;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
  box-shadow: none;
}

.input::placeholder {
  color: #2c2c2c;
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
  margin: 0 !important;
}
</style>