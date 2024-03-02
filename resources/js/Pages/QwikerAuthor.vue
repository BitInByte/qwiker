<template>
    <RowElementsSectionLayout>
        <Card>
            <div class="w-full flex justify-center items-center gap-2">
                <h1 class="text-center text-2xl">LA Knight</h1>
                <button class="leading-none transition duration-300 hover:text-purple-300"><FontAwesomeIcon :icon="faCirclePlus" /></button>
            </div>
            <p class="text-xs text-right">
                100 qwiks · 30 followers · 50 following
            </p>
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
import RowElementsSectionLayout from "../Layouts/RowElementsSectionLayout.vue";
import QwirkCard from "../Components/QwirkCard.vue";
import { faCirclePlus } from "@fortawesome/free-solid-svg-icons";
const DATA = [
    {
        message: "First message",
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
