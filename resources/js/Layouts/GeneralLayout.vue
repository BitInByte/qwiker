<template>
    <header class="w-full py-5 px-6 bg-blue-800 text-white rounded-b-2xl flex items-center justify-between">
        <!-- <h3 :style="{fontFamily: '\'Kanit\', sans-serif'}" class="text-2xl">Qwiker</h3> -->
        <Link href="/"><h3 style="font-family: 'Kanit', sans-serif" class="text-2xl">Qwiker</h3></Link>
        <nav class="flex gap-3">
            <Link href="/auth" class="hover:text-purple-300 hover:underline transition duration-300">Auth</Link>
            <!-- <Link href="/auth" as="AppLink">Auth</Link> -->
            <Link href="/author" class="hover:text-purple-300 hover:underline transition duration-300">My Qwirks</Link>
            <!-- <Link href="/author" as="AppLink">My Qwirks</Link> -->
            <Link class="hover:text-purple-300 hover:underline transition duration-300">Logout</Link>
        </nav>
    </header>
    <main class="w-full py-6 lg:px-0 lg:max-w-3xl mx-auto pt-4">
        <!-- <section class="mt-4"> -->
            <slot></slot>
        <!-- </section> -->
    </main>
    <footer></footer>
</template>

<script setup lang="ts">
    import AppLink from '@/Components/AppLink.vue';
</script>

