<template>
  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500/30 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <form @submit.prevent="profileUpdate">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-3 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                  <h3 class="text-xl font-bold text-gray-900" id="modal-title">Create Category</h3>
                  <div class="mt-2">
                    <div class="flex flex-wrap -mb-8 p-6">
                      <TextInput v-model="profileForm.name" :error="profileForm.errors.name" class="pb-8 w-full" label="Name" />
                      <TextareaInput v-model="profileForm.description" :error="profileForm.errors.description" class="pb-8 w-full" label="Description" />
                      <InputImage v-model="profileForm.image" :error="profileForm.errors.image" :imageUrl="profileForm.image" class="pb-8 w-full" type="file" label="Image" />
                      <div class="flex items-center">
                        <label for="link-checkbox">Is Active?</label>
                        <input id="link-checkbox" type="checkbox" :true-value="1" :false-value="0" v-model="profileForm.status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 ml-3">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button type="button"
                class="inline-flex w-full justify-center rounded-md btn-indigo px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Deactivate</button>
              <button @click="$emit('close')"
                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TextareaInput from '@/Shared/TextareaInput.vue'
import InputImage from '@/Shared/InputImage.vue';
import { useForm } from '@inertiajs/vue3';

export default {
  props: {
    open: Boolean,
  },
  components: {
    TextInput,
    LoadingButton,
    TextareaInput,
    useForm,
    InputImage,
  },
  data() {
    return {
      profileForm: useForm({
        name: '',
        description: '',
        image: '',
        status: 1,
      }),
    }
  },
}
</script>
