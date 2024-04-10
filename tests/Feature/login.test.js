import { beforeAll,expectTypeOf,test,describe, it, expect, vi } from 'vitest';
import { shallowMount } from '@vue/test-utils';
import Login from '@/Pages/Auth/Login.vue';


describe('fetchUsers2', () => {


// test de texto

it('El componente contiene un título', async () => {

  const wrapper = shallowMount(Login);
  await wrapper.vm.$nextTick();
  const componentText = wrapper.text();
  expect(componentText).toContain('Correu electrònic');
});


});
