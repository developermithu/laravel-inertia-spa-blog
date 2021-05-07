<template>
  <div>
   
    <Header/>

    <section class="text-gray-600 body-font relative">
      <div class="container px-5 py-16 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
          <h1
            class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"
          >
            Contact Us
          </h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
            Feel free to message us.
          </p>
        </div>

        <div
          v-if="success"
          class="bg-green-500 border border-green-400 text-white px-4 py-3 rounded relative w-1/2 m-auto mb-4"
          role="alert"
        >
          <strong class="font-bold">{{ success }}</strong>
        </div>

        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <form @submit.prevent="submit">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600"
                    >Name</label
                  >
                  <input
                    type="text"
                    id="name"
                    v-model="data.name"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  />
                  <div v-if="errors.name" class="text-red-500">
                    {{ errors.name }}
                  </div>
                </div>
              </div>
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="email" class="leading-7 text-sm text-gray-600"
                    >Email</label
                  >
                  <input
                    type="email"
                    id="email"
                    v-model="data.email"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  />
                  <div v-if="errors.email" class="text-red-500">
                    {{ errors.email }}
                  </div>
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="message" class="leading-7 text-sm text-gray-600"
                    >Message</label
                  >
                  <textarea
                    id="message"
                    v-model="data.message"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                  ></textarea>
                  <div v-if="errors.message" class="text-red-500">
                    {{ errors.message }}
                  </div>
                </div>
              </div>
              <div class="p-2 w-full">
                <button
                  type="submit"
                  :disabled="loading"
                  class="flex mx-auto text-white bg-indigo-600 hover:bg-indigo-700 border-0 py-2 px-8 focus:outline-none  rounded text-lg"
                >
                 <span v-if="loading">Sending...</span>
                 <span v-else>Send Message</span>
                  <half-circle-spinner v-if="loading" class="ml-3 mt-1" :animation-duration="1000" :size="18" color="#fff"/>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <Footer></Footer>

  </div>
</template>

<style scoped>

</style>

<script>
import { HalfCircleSpinner } from "epic-spinners";
import Header from './Components/Header'
import Footer from './Components/Footer'
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    errors: Object,
    success: Object,
  },
  data() {
    return {
      loading: false,
      data: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    submit() {
      this.loading = true;
      this.$inertia.post("/contact-us", this.data).then(() => {
        this.loading = false;
      });
    },
  },
  components: {
    HalfCircleSpinner,
    Header,
    Footer,
  },
};
</script>
