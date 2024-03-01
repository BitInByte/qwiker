import "./bootstrap";
import "../css/app.css";

import { createApp, h, DefineComponent } from "vue";
import { Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import GeneralLayout from "./Layouts/GeneralLayout.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import Card from "./Components/Card.vue";
import Button from "./Components/Button.vue";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue"),
        );
        page.then(module => {
            // const page = module[`./Pages/${name}.vue`];
            // page.default.layout = name.startsWith('Public/') ? undefined
            // if(page.default.layout === undefined) {
            //
            // }
            // module.layout = GeneralLayout;
            module.default.layout = GeneralLayout;
        });
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Link", Link)
            .component("Card", Card)
            .component("Button", Button)
            .component("FontAwesomeIcon", FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
