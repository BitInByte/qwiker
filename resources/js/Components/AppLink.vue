<template>
    <a
        class="underline decoration-purple-300 transition duration-300 hover:decoration-wavy hover:underline-offset-1 cursor-pointer"
        :href="href"
    >
        <slot />
    </a>
</template>

<script setup lang="ts">
defineProps<{
    href: string;
}>();
</script>
