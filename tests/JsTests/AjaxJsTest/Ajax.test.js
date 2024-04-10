import { beforeAll,expectTypeOf,test,describe, it, expect, vi } from 'vitest';
import axios from 'axios';
import { shallowMount } from '@vue/test-utils';

const BEFORE_ALL_TIMEOUT=30000; 

describe('fetchUsers', () => {
  let response,body;
  beforeAll(async()=>{
    response=await axios.get(
      "/tests"
    );
    body=response
  },BEFORE_ALL_TIMEOUT)
  test('test de ajax',()=>{
    expect(response.status).toBe(200)
  })
 



});
