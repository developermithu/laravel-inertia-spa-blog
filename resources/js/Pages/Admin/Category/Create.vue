<template>
  <app-layout>
    <div class="text-center mt-16 mb-3">
      <ul class="py-6 mx-2 w-96 mx-auto bg-red-200">
        <li v-if="errors.name" class="text-green-900">{{ errors.name }}</li>
        <li class="text-green-900">{{ errors.slug }}</li>
      </ul>
    </div>

    <div
      v-if="success"
      class="bg-green-500 border border-green-400 text-white px-4 py-3 rounded relative w-1/2 m-auto mb-4"
      role="alert"
    >
      <strong class="font-bold">{{ success }}</strong>
    </div>

    <form @submit.prevent="submit">
      <div class="flex justify-center mt-20 items-center">
        <div
          class="flex w-11/12 md:w-1/2 h-56 justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5"
        >
          <h3 class="text-2xl font-bold mb-4 mt-5">Add New Category</h3>

          <div class="relative h-10 input-component mb-5">
            <input
              id="name"
              type="text"
              v-model="data.name"
              class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"
            />
            <label
              for="name"
              class="absolute left-2 transition-all bg-white px-1"
            >
              Name
            </label>
          </div>

          <div class="relative h-10 input-component empty">
            <input
              id="slug"
              type="text"
              v-model="data.slug"
              class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm"
            />
            <label
              for="slug"
              class="absolute left-2 transition-all bg-white px-1"
            >
              Slug
            </label>
          </div>

          <div class="my-5">
            <button
              type="submit"
              class="text-center w-full px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            >
              Save
            </button>
          </div>
        </div>
      </div>
    </form>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  props: {
    errors: Object,
    success: Object,
  },

  data() {
    return {
      data: {
        name: "",
        slug: "",
      },
    };
  },

  methods: {
    submit() {
      this.$inertia.post("/admin/categories/store", this.data);
    },
  },

  components: {
    AppLayout,
  },
};
</script>




<style>
label {
  top: 0%;
  transform: translateY(-50%);
  font-size: 11px;
  color: rgba(37, 99, 235, 1);
}
.empty input:not(:focus) + label {
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
}
input:not(:focus) + label {
  color: rgba(70, 70, 70, 1);
}
input {
  border-width: 1px;
}
input:focus {
  outline: none;
  border-color: rgba(37, 99, 235, 1);
}
</style>