<template>
    <RowElementsSectionLayout>
        <Card>
            <h1 class="text-2xl text-center text-white underline decoration-purple-300">{{ hashtagName }}</h1>
        </Card>
        <Card v-for="item in hashtagQwikers">
            <QwikerCard
                :message="item.message"
                :author="item.author.username"
                :time="item.created_at"
                :username="item.author.username"
            />
        </Card>
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import RowElementsSectionLayout from "../Layouts/RowElementsSectionLayout.vue";
import QwikerCard from "../Components/QwikeCard.vue";
const props = defineProps<{
    hashtagQwikers: {
        message: string;
        created_at: string;
        author: {
            username: string;
            id: string;
        };
    }[];
    hashtagName: string;
}>();
</script>
