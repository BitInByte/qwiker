<template>
    <!-- <p>{{ message }}</p> -->
    <p v-html="hashtagsReplace" />
    <p class="text-xs text-right">
        <a
            class="underline decoration-purple-300 transition duration-300 hover:decoration-wavy hover:underline-offset-1 cursor-pointer"
            >{{ author }}</a
        >
        on {{ time }}
    </p>
</template>

<script setup lang="ts">
const props = defineProps<{
    message: string;
    author: string;
    time: string;
}>();

const hashtagsReplace = props.message.replace(
    /#(\S*)/g,
    '<a href="/" class="underline decoration-purple-300 transition duration-300 hover:decoration-wavy">#$1</a>',
);

console.log(hashtagsReplace);
</script>
