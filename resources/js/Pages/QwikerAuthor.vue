<template>
    <RowElementsSectionLayout>
        <Card>
            <div class="w-full flex justify-center items-center gap-2">
                <h1 class="text-center text-2xl">
                    {{ $page.props.auth.user.name }}
                </h1>
                <button
                    v-if="
                        (($page.props.auth.user as any).id as string) !==
                        author_id
                    "
                    class="leading-none transition duration-300 hover:text-purple-300"
                >
                    <FontAwesomeIcon :icon="faCirclePlus" />
                </button>
            </div>
            <p class="text-xs text-right">
                {{ totalQwikes }} qwiks · 30 followers · 50 following
            </p>
        </Card>
        <Card v-for="item in qwikers">
            <QwikerCard
                :message="item.message"
                :author="item.author.username"
                :time="item.created_at"
            />
        </Card>
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import RowElementsSectionLayout from "../Layouts/RowElementsSectionLayout.vue";
import QwikerCard from "../Components/QwikeCard.vue";
import { faCirclePlus } from "@fortawesome/free-solid-svg-icons";
const props = defineProps<{
    qwikers: {
        message: string;
        created_at: string;
        author: {
            username: string;
            id: string;
        };
    }[];
    author_id: string;
    totalQwikes: number;
}>();
// console.log(props.user_id)
// const DATA = [
//     {
//         message: "First message",
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
