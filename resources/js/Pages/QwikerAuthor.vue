<template>
    <RowElementsSectionLayout>
        <Card>
            <div class="w-full flex justify-center items-center gap-2">
                <h1 class="text-center text-2xl">
                    {{ author_name || $page.props.auth.user.name }}
                </h1>
                <button
                    v-if="
                        (($page.props.auth.user as any).id as string) !==
                        author_id
                    "
                    class="leading-none transition duration-300 hover:text-purple-300"
                    @click="connectUser"
                >
                    <FontAwesomeIcon
                        :icon="isConnected ? faCircleCheck : faCirclePlus"
                    />
                </button>
            </div>
            <p class="text-xs text-right">
                {{ totalQwikes }} qwikes · {{ totalFollowers }} followers ·
                {{ totalFollowing }} following
            </p>
        </Card>
        <QwikeContent :qwikers="qwikers" />
        <!-- <Card v-for="item in qwikers"> -->
        <!--     <QwikerCard -->
        <!--         :message="item.message" -->
        <!--         :author="item.author.username" -->
        <!--         :time="item.created_at" -->
        <!--         :username="item.author.username" -->
        <!--     /> -->
        <!-- </Card> -->
    </RowElementsSectionLayout>
</template>

<script setup lang="ts">
import RowElementsSectionLayout from "../Layouts/RowElementsSectionLayout.vue";
// import QwikerCard from "../Components/QwikeCard.vue";
import QwikeContent from "@/Components/QwikeContent.vue";
import { faCirclePlus, faCircleCheck } from "@fortawesome/free-solid-svg-icons";
import { router } from "@inertiajs/vue3";
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
    author_id: string;
    totalQwikes: number;
    totalFollowers: number;
    totalFollowing: number;
    author_name?: string;
    isConnected?: boolean;
    author_username: string;
}>();
const connectUser = () => {
    router.post(`/author/${props.author_username}`);
};
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
