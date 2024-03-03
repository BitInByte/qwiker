<template>
    <!-- <p>{{ message }}</p> -->
    <!-- TODO: Extract this links styles -->
    <p v-html="hashtagsReplace" />
    <p class="text-xs text-right">
        <!-- class="underline decoration-purple-300 transition duration-300 hover:decoration-wavy hover:underline-offset-1 cursor-pointer" -->
        <AppLink
            :href="`/author/${username}`"
            >{{ author }}</AppLink
        >
        - {{ moment(time).fromNow() }}
    </p>
</template>

<script setup lang="ts">
import moment from 'moment';
const props = defineProps<{
    message: string;
    author: string;
    username: string;
    time: string;
}>();

// This should be done with Link to not force reload
const hashtagsReplace = props.message.replace(
    /#(\S*)/g,
    `<a href="/hashtag/$1" class="underline decoration-purple-300 transition duration-300 hover:decoration-wavy">#$1</a>`,
);

console.log(hashtagsReplace);
</script>
