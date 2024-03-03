<template>
    <Card>
        <h1 class="text-3xl text-center">
            {{ isLogin ? "Log In" : "Register" }}
        </h1>
        <form @submit.prevent="submit">
            <div class="mt-2" v-if="!isLogin">
                <label
                    for="name"
                    class="block text-sm font-medium leading-6 text-white"
                    >Name</label
                >
                <div>
                    <!-- type="email" -->
                    <input
                        id="name"
                        name="name"
                        type="text"
                        autocomplete="name"
                        required
                        v-model="form.name"
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>
            <div class="mt-2">
                <label
                    for="username"
                    class="block text-sm font-medium leading-6 text-white"
                    >Username</label
                >
                <div>
                    <!-- type="email" -->
                    <input
                        id="username"
                        name="username"
                        type="text"
                        autocomplete="username"
                        required
                        v-model="form.username"
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>

            <div class="mt-2">
                <label
                    for="password"
                    class="block text-sm font-medium leading-6 text-white"
                    >Password</label
                >
                <div>
                    <!-- type="email" -->
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="new-password"
                        required
                        v-model="form.password"
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>

            <div class="mt-2" v-if="!isLogin">
                <label
                    for="verify-password"
                    class="block text-sm font-medium leading-6 text-white"
                    >Verify Password</label
                >
                <div>
                    <!-- type="email" -->
                    <input
                        id="verify-password"
                        name="verify-password"
                        type="password"
                        autocomplete="current-password"
                        required
                        v-model="form.password_confirmation"
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>

            <ul v-if="Object.keys(props.errors).length">
                <li
                    v-for="error in Object.values(props.errors)"
                    class="text-sm text-red-500 mt-4"
                >
                    {{ error }}
                </li>
            </ul>
            <!-- <p>{{ props.errors }}</p> -->
            <div class="flex justify-end gap-2 mt-4 mb-2 flex-col lg:flex-row">
                <Button isWidthFull type="submit">{{
                    isLogin ? "Login" : "Register"
                }}</Button>
            </div>
        </form>
        <div class="mb-4">
            <Button
                isWidthFull
                @click="toggleAuthHandler"
                type="button"
                >{{ isLogin ? "Register" : "Login" }}</Button
            >
        </div>
    </Card>
</template>

<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
const props = defineProps<{
    errors: any;
}>();
const isLogin = ref(false);

let registerFields: {
    name: string;
    password_confirmation: string;
    username?: string;
    password?: string;
} = {
    name: "",
    password_confirmation: "",
};
if (!isLogin.value) {
    registerFields = {
        ...registerFields,
        username: "",
        password: "",
    };
}
const form = useForm(registerFields);

const submit = () => {
    const url = isLogin.value ? "login" : "register";
    form.post(route(url), {
        onFinish: () => {
            isLogin.value
                ? form.reset("password")
                : form.reset("password", "password_confirmation");
        },
    });
};

const toggleAuthHandler = () => {
    isLogin.value = !isLogin.value;
    form.clearErrors();
};
</script>
