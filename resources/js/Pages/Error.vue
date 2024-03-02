<script setup>
import { computed } from "vue";
import Card from "@/Components/Card.vue";

const props = defineProps({ status: Number });

const title = computed(() => {
    return {
        503: "503: Service Unavailable",
        500: "500: Server Error",
        404: "404: Page Not Found",
        403: "403: Forbidden",
    }[props.status];
});

const description = computed(() => {
    return {
        503: "Sorry, we are doing some maintenance. Please check back soon.",
        500: "Whoops, something went wrong on our servers.",
        404: "Sorry, the page you are looking for could not be found.",
        403: "Sorry, you are forbidden from accessing this page.",
    }[props.status];
});
</script>

<template>
    <Card>
        <div class="flex gap-2 text-center w-full justify-center my-5">
            <h1 class="text-2xl text-white">{{ title }} | {{ description }}</h1>
        </div>
    </Card>
</template>
