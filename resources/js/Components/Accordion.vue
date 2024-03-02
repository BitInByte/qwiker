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
                <form @submit.prevent="submit">
                    <textarea
                        name="qwiker-message"
                        id="qwiker-message"
                        class="w-full resize-none rounded-lg bg-zinc-700 text-white h-20"
                        :class="{
                            'border-red-500': form.qwikerMessage.length >= 250,
                        }"
                        maxlength="250"
                        v-model="form.qwikerMessage"
                    >
                    </textarea>
                    <p
                        class="text-white text-right"
                        :class="{ 'text-red-500': form.qwikerMessage.length >= 250 }"
                    >
                        {{ form.qwikerMessage.length }}/250
                    </p>
                    <div class="w-full flex justify-end pt-2">
                        <Button>Submit</Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useForm } from '@inertiajs/vue3';
import { faChevronUp, faChevronDown } from "@fortawesome/free-solid-svg-icons";
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

const form = useForm({
    qwikerMessage: '',
});

const submit = () => {
    form.post(route('qwiker.store'), {
        onFinish: () => {
            form.reset('qwiker-message')
        }
    })
}
</script>
