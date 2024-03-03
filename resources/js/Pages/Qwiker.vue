<template>
    <RowElementsSectionLayout>
        <Card>
            <Accordion />
        </Card>
        <QwikeContent :qwikers="qwikers" />
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import Accordion from "@/Components/Accordion.vue";
import RowElementsSectionLayout from "@/Layouts/RowElementsSectionLayout.vue";
import QwikeContent from "@/Components/QwikeContent.vue";
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
</script>
