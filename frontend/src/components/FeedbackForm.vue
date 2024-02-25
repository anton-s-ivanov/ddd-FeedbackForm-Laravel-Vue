<script setup>
import { computed, ref } from 'vue';
import HttpRequest from '@/components/support/HttpRequest.vue'
import Errors from '@/components/Errors.vue'

  const nameInput = ref('')
  const phoneInput = ref('')
  const messageInput = ref('')
  const errors = ref([])
  const form = ref()

  const formButtonEnabled = computed(() => { 
    return Boolean(
      nameInput.value.length > 2
      && String(phoneInput.value).length >= 5
      && String(phoneInput.value).length <= 11
      && messageInput.value.length > 2
    )
  })

  const submit = async () => {
    const formData = {
      'name': nameInput.value,
      'phone': phoneInput.value,
      'message': messageInput.value
    }

    const httpRequest = new HttpRequest()
    const response = await httpRequest.httpPost('/feedback', formData)
    
    if(response.errors) {
      errors.value = response.errors
    } else {
      if(response.message == 'ok') {
        resetForm()
      }
    }
  }

  const resetForm = () => {
    nameInput.value = ''
    phoneInput.value = ''
    messageInput.value = ''
  }


</script>

<template>
  <div class="container">

    <form ref = "form" @submit.prevent="submit">
      <input 
        v-model="nameInput"
        type="text" 
        name="name" 
        maxlength="255" 
        class="form-element" 
        placeholder="Имя"
      >
      <input 
        v-model="phoneInput"
        type="number" 
        name="phone" 
        maxlength="11" 
        class="form-element" 
        placeholder="Телефон"
      >
      <textarea 
        v-model="messageInput"
        name="message" 
        rows="5" 
        class="form-element" 
        placeholder="Сообщение"
      ></textarea>

      <input 
        type="submit" 
        value="Отправить" 
        class="form-element" 
        :disabled="!formButtonEnabled"
      >
    </form>

    <div class="errors-feedback-wrapper">
      <Errors v-if="errors.length" :errors="errors"/>
    </div>
    
  </div>
</template>

<style scoped>
  .container {
    display: flex;
  }

  form {
    display: flex;
    flex-direction: column;
    width: 300px;
    padding: 20px;
  }

  .form-element {
    margin-bottom: 10px;
    padding: 5px 2px;
  }

  .errors-feedback-wrapper {
    padding: 20px;
  }

</style>