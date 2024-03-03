<template>
    <RowElementsSectionLayout>
        <Card>
            <h1
                class="text-2xl text-center text-white underline decoration-purple-300"
            >
                {{ hashtagName }}
            </h1>
        </Card>
        <QwikeContent :qwikers="qwikers" />
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
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
    hashtagName: string;
}>();
</script>
