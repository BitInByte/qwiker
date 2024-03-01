<template>
    <button
        class="py-2 px-4 transition duration-300 border border-purple-300 hover:bg-purple-300 text-white rounded-full font-bold"
        :class="[isWidthFull ? 'w-full flex-1' : '']"
    >
        <slot />
    </button>
</template>

<script setup lang="ts">
withDefaults(
    defineProps<{
        isWidthFull?: boolean;
    }>(),
    {
        isWidthFull: false,
    },
);
</script>
