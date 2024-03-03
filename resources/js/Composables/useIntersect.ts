import { Ref, onMounted, onUnmounted } from "vue";

export function useIntersect(ref: Ref, callback: () => void, options: IntersectionObserverInit = {}) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    callback();
                }
            });
        }, options
    );

    onMounted(() => {
        if (ref.value) {
            observer.observe(ref.value);
        }
    });

    onUnmounted(() => observer.disconnect());
}
