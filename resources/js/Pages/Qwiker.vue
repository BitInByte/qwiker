<template>
    <RowElementsSectionLayout>
        <Card>
            <Accordion />
        </Card>
        <Card v-for="item in items">
            <QwikeCard
                :message="item.message"
                :author="item.author.name"
                :username="item.author.username"
                :time="item.created_at"
            />
        </Card>
        <!-- <Link @click="loadMoreItems">Load more</Link> -->
        <div ref="landmark"></div>
        <p v-if="!canLoadMoreItems" class="text-sm text-white text-center">
            You're all catch up with all of the new content
        </p>
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import Accordion from "@/Components/Accordion.vue";
import RowElementsSectionLayout from "@/Layouts/RowElementsSectionLayout.vue";
import QwikeCard from "@/Components/QwikeCard.vue";
import { ref } from "vue";
import { watch } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll";
import { useIntersect } from "@/Composables/useIntersect";

const props = defineProps<{
    qwikers: {
        data: {
            message: string;
            created_at: string;
            author: {
                username: string;
                name: string;
            };
        }[];
        next_page_url: string;
    };
}>();
console.log(props.qwikers);
const landmark = ref(null);
const { items, loadMoreItems, canLoadMoreItems } = useInfiniteScroll(
    "qwikers",
    landmark,
);
</script>
