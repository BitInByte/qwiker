<template>
    <Card>
        <!-- <h1 class="text-3xl text-center">Log In!</h1> -->
        <h1 class="text-3xl text-center">Register</h1>
        <!-- <form @submit.prevent="submit"> -->
        <form>
            <!-- <div> -->
            <!--     <InputLabel for="email" value="Email" /> -->
            <!---->
            <!--     <TextInput -->
            <!--         id="email" -->
            <!--         type="email" -->
            <!--         class="mt-1 block w-full" -->
            <!--         required -->
            <!--         autofocus -->
            <!--         autocomplete="username" -->
            <!--     /> -->
            <!---->
            <!--     <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            <!-- </div> -->
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
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>

            <div class="mt-2">
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
                        class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 bg-zinc-700 text-white"
                    />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4 flex-col lg:flex-row">
                <Button isWidthFull>Register</Button>
                <Button isWidthFull>Login</Button>
            </div>

            <!-- <div class="mt-4"> -->
            <!--     <InputLabel for="password" value="Password" /> -->
            <!---->
            <!--     <TextInput -->
            <!--         id="password" -->
            <!--         type="password" -->
            <!--         class="mt-1 block w-full" -->
            <!--         required -->
            <!--         autocomplete="current-password" -->
            <!--     /> -->
            <!---->
            <!--     <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            <!-- </div> -->

            <!-- <div class="block mt-4"> -->
            <!--     <label class="flex items-center"> -->
            <!--         <Checkbox name="remember" v-model:checked="form.remember" /> -->
            <!--         <span class="ms-2 text-sm text-gray-600">Remember me</span> -->
            <!--     </label> -->
            <!-- </div> -->

            <div class="flex items-center justify-end mt-4">
                <!-- <Link -->
                <!--     v-if="canResetPassword" -->
                <!--     :href="route('password.request')" -->
                <!--     class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" -->
                <!-- > -->
                <!--     Forgot your password? -->
                <!-- </Link> -->

                <!-- <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> -->
                <!--     Log in -->
                <!-- </PrimaryButton> -->
            </div>
        </form>
    </Card>
</template>

<script setup lang="ts"></script>
