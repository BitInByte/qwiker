<template>
    <div>
        <button
            class="flex justify-between w-full my-2"
            @click="toggleAccordionHandler"
        >
            <h3 class="font-bold">Create new qwike</h3>
            <span>
                <FontAwesomeIcon
                    :icon="accordionOpen ? faChevronUp : faChevronDown"
                />
            </span>
        </button>
        <div
            class="overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm"
            ref="accordionAnswerRef"
            :style="{
                height:
                    accordionOpen && accordionAnswerRef
                        ? `${accordionAnswerRef.scrollHeight}px`
                        : 0,
            }"
        >
            <div class="overflow-hidden py-2">
                <QwikeForm />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { faChevronUp, faChevronDown } from "@fortawesome/free-solid-svg-icons";
import QwikeForm from '@/Components/QwikeForm.vue';
const accordionOpen = ref(false);
const accordionAnswerRef = ref<HTMLDivElement | null>(null);
// const qwirkMessage = defineModel<string>({
//     default: "",
//     required: true,
// });
// const qwirkMessage = ref("");
function toggleAccordionHandler() {
    accordionOpen.value = !accordionOpen.value;
}
</script>
