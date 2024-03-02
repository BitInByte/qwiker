<template>
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
            required
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
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    qwikerMessage: "",
});

const submit = () => {
    form.submit("post", route("qwiker.store"), {
        onFinish: () => {
            form.reset("qwiker-message");
        },
        preserveState: false,
    });
};
</script>
