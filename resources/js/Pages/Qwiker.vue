<template>
    <RowElementsSectionLayout>
        <Card>
            <Accordion />
        </Card>
        <Card v-for="item in qwikers">
            <QwikeCard
                :message="item.message"
                :author="item.author.username"
                :time="item.created_at"
            />
        </Card>
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import Accordion from "@/Components/Accordion.vue";
import RowElementsSectionLayout from "@/Layouts/RowElementsSectionLayout.vue";
import QwikeCard from "@/Components/QwikeCard.vue";

const props = defineProps<{
    qwikers: {
        message: string;
        created_at: string;
        author: {
            username: string;
        };
    }[];
}>();
// console.log(props.qwikers);

// const DATA = [
//     {
//         message:
//             "First message with an #hashtaghere too good and now #anotherhashhere",
//         author: "John Cena",
//         time: "Today",
//     },
//     {
//         message: "Second message",
//         author: "Undertaker",
//         time: "Today",
//     },
//     {
//         message: "Third message",
//         author: "LA Knight",
//         time: "Today",
//     },
// ];
</script>
