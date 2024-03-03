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
const items = ref(props.qwikers.data);

// watch(() => props.qwikers, (qwikers) => {
//     items.value = [...items.value, ...qwikers.data]
// });

const initialUrl = usePage().url;
const loadMoreItems = () => {
    if (!props.qwikers.next_page_url) {
        return;
    }
    router.get(
        props.qwikers.next_page_url,
        {},
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                window.history.replaceState({}, "", initialUrl);
                items.value = [...items.value, ...props.qwikers.data];
            },
        },
    );
};

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                loadMoreItems();
            }
        });
    },
    {
        rootMargin: "0px 0px 150px 0px",
    },
);

const landmark = ref(null);
onMounted(() => {
    if (landmark.value) {
        observer.observe(landmark.value);
    }
});
</script>
