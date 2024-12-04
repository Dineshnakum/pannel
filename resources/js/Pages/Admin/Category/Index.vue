<template>
  <div>

    <Head title="Category" />
    <h1 class="mb-8 text-3xl font-bold">Categories</h1>
    <div class="flex items-center justify-between mb-6">
      <button class="btn-indigo" @click="open = true">
      <span>Create</span>
      <span class="hidden md:inline">&nbsp;Category</span>
      </button>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Image</th>
            <th class="pb-4 pt-6 px-6">Name</th>
            <th class="pb-4 pt-6 px-6">Slug</th>
            <th class="pb-4 pt-6 px-6">Status</th>
            <th class="pb-4 pt-6 px-6">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories.data" :key="category.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t px-6 py-4">
              <img v-if="category.image" :src="category.image" :alt="category.name">
            </td>
            <td class="border-t px-6 py-4">
              {{ category.name }}
            </td>
            <td class="border-t px-6 py-4">
              {{ category.slug }}
            </td>
            <td class="border-t px-6 py-4">
              {{ category.status }}
            </td>
            <td class="border-t px-6 py-4">
              <button type="button">
                <icon name="edit" class="mr-2 w-7 h-7" />
              </button>
              <button type="button">
                <icon name="trash" class="mr-2 w-7 h-7 fill-red-500" />
              </button>
            </td>
          </tr>
          <tr v-if="categories.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="5">No Categories found.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="categories.links" />
    <Create v-if="open"  @close="open = false"/>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import Layout from '@/Shared/Layout.vue'
import Pagination from '@/Shared/Pagination.vue'
import Create from './Create.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    Create,
  },
  layout: Layout,
  props: {
    categories: Object,
  },
  data() {
    return {
      open: false,
    }
  },
}
</script>
