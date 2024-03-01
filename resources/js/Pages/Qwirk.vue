<template>
    <RowElementsSectionLayout>
        <Card>
            <Accordion />
        </Card>
        <Card v-for="item in DATA">
            <QwirkCard
                :message="item.message"
                :author="item.author"
                :time="item.time"
            />
        </Card>
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import Accordion from "@/Components/Accordion.vue";
import RowElementsSectionLayout from "@/Layouts/RowElementsSectionLayout.vue";
import QwirkCard from "@/Components/QwirkCard.vue";

const DATA = [
    {
        message: "First message with an #hashtaghere too good and now #anotherhashhere",
        author: "John Cena",
        time: "Today",
    },
    {
        message: "Second message",
        author: "Undertaker",
        time: "Today",
    },
    {
        message: "Third message",
        author: "LA Knight",
        time: "Today",
    },
];
</script>
