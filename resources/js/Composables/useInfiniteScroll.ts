import { router, usePage } from "@inertiajs/vue3";
import { Ref, computed, ref } from "vue";
import { useIntersect } from "./useIntersect";
import {toRaw} from 'vue';

export function useInfiniteScroll(
    propName: string,
    landmark: Ref | null = null,
) {
    const value = () => usePage().props[propName] as any;
    const items = ref(value().data);

    // watch(() => value()), (qwikers) => {
    //     items.value = [...items.value, ...qwikers.data]
    // });

    const initialUrl = usePage().url;

    const canLoadMoreItems = computed(() => value().next_page_url !== null);

    const loadMoreItems = () => {
        if (!canLoadMoreItems.value) {
            return;
        }
        router.get(
            value().next_page_url,
            {},
            {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    window.history.replaceState({}, "", initialUrl);
                    items.value = [...items.value, ...value().data];
                },
            },
        );
    };

    if (landmark !== null) {
        useIntersect(landmark, loadMoreItems, {
            // rootMargin: "0px 0px 150px 0px",
        });
    }
    return {
        items,
        loadMoreItems,
        reset: () => (items.value = value().data),
        canLoadMoreItems,
    };
}
